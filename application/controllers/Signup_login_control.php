<?php

/**
 * @property Database_model $Database_model
 * @property CI_Session $session
 */
// Masih butuh PHPDoc @property kalau mau warning hilang dari VS Code. Autoloading tidak otomatis dikenali oleh Intelephense. Bukan error runtime, tapi warning dari Intelephense di VS Code. Artinya si extension belum tahu bahwa $this->$Database_model dan $this->session itu property yang valid di CodeIgniter. Tambahkan PHPDoc annotation supaya Intelephense bisa ngerti bahwa $this->session itu berasal dari library bawaan CodeIgniter.
// jika tidak pakai PHPDoc maka akan error:
// 1.Undefined property '$Database_model'
// 2.Undefined property '$session'
// Ini artinya VS Code (khususnya extension Intelephense) belum bisa mendeteksi kalau $this->Database_model dan $this->session itu valid, meskipun di CodeIgniter aslinya itu sah dan jalan 100%.

class Signup_login_control extends CI_Controller
{
    # Jangan akses file langsung di dalam application/views/ menggunakan base_url() atau URL langsung. Alih-alih mengarahkan ke file PHP di dalam folder views, kamu harus menggunakan Controller untuk memuat view tersebut. 
    public function signup()
    {
        // untuk mengecek apakah pengguna sudah submit atau mengirim key 'submit' dari button name='submit'
        if (isset($_POST['submit'])) {
            $email = htmlspecialchars($_POST['email']); // Fungsi htmlspecialchars() digunakan untuk mengamankan input dari user agar tidak disalahgunakan untuk menyerang sistem lewat HTML atau script jahat (XSS attack). input Hanya akan tampil sebagai teks biasa, tidak dijalankan sebagai script.
            $username_akun = htmlspecialchars($_POST['username_akun']);
            $password_akun = password_hash($_POST['password_akun'], PASSWORD_DEFAULT); // Fungsi password_hash() digunakan untuk mengacak (hash) password sebelum disimpan ke database.  $_POST['password_akun']: password asli dari user (input dari form). PASSWORD_DEFAULT: PHP akan otomatis memilih algoritma hash terbaru dan aman (saat ini biasanya bcrypt).
            $no_hp = htmlspecialchars($_POST['no_hp']);

            // Mengecek apakah input signup username dari user sudah digunakan
            if ($this->Database_model->isUsernameUsed($username_akun)) {
                $this->session->set_flashdata('username_used', 'Username telah digunakan.');
                redirect('Signup_login_control/signup'); // langsung di redirect ke halaman signup tanpa menjalankan program dibawah blok kode ini.
                return;
            }

            // Mengecek apakah email yang didaftarkan user sudah digunakan
            if ($this->Database_model->isEmailUsed($email)) {
                $this->session->set_flashdata('email_used', 'Email telah digunakan.');
                redirect('Signup_login_control/signup');
                return;
            }

            // insert ke database tabel akun
            $insertAkunSukses = $this->Database_model->insertDataAkun($email, $username_akun, $password_akun); //memasukkan data ke tabel akun

            // jika insertDataAkun berhasil akan mengembalikan nilai true dan disimpan $insertAkunSukses
            if ($insertAkunSukses) {
                // ambil id_akun dengan function getLastId() dari model Database_model.php. getLastId() berfungsi mengambil id(PK, auto_increment) terakhir dari insert sebelumnya(insertDataAkun)
                $id_akun = $this->Database_model->getLastId();
                // dan insert ke tabel User
                $this->Database_model->insertDataUser($id_akun, $no_hp);

                // ambil data akun dan user dari pendaftar/signup
                $akun = $this->Database_model->getAkunByUsername($username_akun);
                $user = $this->Database_model->getUserByIdAkun($akun['id_akun']);

                $this->session->set_userdata('id_akun', $id_akun);
                $this->session->set_userdata('id_user', $user['id_user']);
                $this->session->set_userdata('username_akun', $username_akun);
                $this->session->set_userdata('role', 'user');
                $this->session->set_userdata('logged_in', true);
                redirect('Home/index'); // setara dengan header("Location: " . base_url('index.php/Home/index'));return;
                return; // opsional, tapi best practice tambah return;
            } else if ($insertAkunSukses === 'duplicate') {
                $this->session->set_flashdata('signup_error', 'Username atau Email sudah digunakan.');
                redirect('Signup_login_control/signup');
                return;
            } else {
                $this->session->set_flashdata('signup_error', 'Terjadi kesalahan saat mendaftar. Coba beberapa saat lagi.');
                redirect('Signup_login_control/signup');
                return;
                // Kalau kamu pakai redirect(), CodeIgniter otomatis akan mengirim header Location dan memanggil exit setelahnya.
                // Sementara header("Location: ...") butuh kamu exit; sendiri secara manual untuk mencegah eksekusi lanjutan.
            }

            // Karena setiap request HTTP dari user akan memicu satu proses terpisah ke server, maka masing-masing request memiliki koneksi database-nya sendiri. 
            // Oleh karena itu, fungsi insert_id() akan mengembalikan id_akun terakhir khusus untuk koneksi yang sedang aktif dalam request tersebut, sehingga akurat dan tidak akan bentrok meskipun banyak user melakukan signup secara bersamaan.
        } else {
            $this->load->view('form_signup');
            return;
            // lebih baik pakai return daripada exit; di dalam controller CodeIgniter (terutama CI3). 
            // Ini alasan kenapa: Kenapa hindari exit;? exit; itu menghentikan eksekusi script PHP secara paksa. Kalau kamu taruh exit; setelah load->view(), semua proses berikutnya (seperti logging, session handling, atau hooks di CI) nggak akan dijalankan.
            // Ini bikin debugging lebih susah dan bisa jadi tiba-tiba redirect ke halaman kosong karena proses berhenti di tengah jalan.
        }
    }

    public function login()
    {
        if (isset($_POST["submit"])) {
            $username_akun = htmlspecialchars($_POST['username_akun']);
            $password_akun = $_POST['password_akun'];
            // dummy admin login
            if ($_POST["username_akun"] === "admin" && $_POST["password_akun"] === "adminadmin") {
                $this->session->set_userdata('username_akun', $username_akun); //$this->session: objek session di CodeIgniter (biasanya CI3).
                $this->session->set_userdata('role', 'admin'); // set_userdata(): method untuk menyimpan data ke session sementara (selama browser aktif / sampai logout).
                $this->session->set_userdata('logged_id', true); // Menyimpan data session dengan key 'logged_in' dan value true. Selama session masih aktif (belum logout atau expired), user akan dianggap sudah login.
                header("Location: " . base_url('index.php/Home/admin')); // Titik (.) di PHP adalah operator penggabung string (concatenation). Jika admin akan request ke controller untuk load halaman admin_page.php.
                return; // Cara ambil set_userdata di view: if ($this->session->userdata('logged_in')). Bertahan selama session aktif, untuk tandai user sudah login.

                // Session itu disimpan di sisi server, dan terpisah dari database user kamu. Jadi boleh pakai key apa pun, misalnya 'logged_in', 'user_id', 'username', dll — asal konsisten pas ambilnya nanti. Ini tidak akan menambah kolom apa pun ke database, jadi aman.

                // dummy user login
            } else if ($_POST['username_akun'] === "user" && $_POST['password_akun'] === "user123") {
                $this->session->set_userdata('username_akun', $username_akun);
                $this->session->set_userdata('role', 'user');
                $this->session->set_userdata('logged_in', true);
                header("Location: " . base_url('index.php/Home/index'));
                return;

                // login user terdaftar di database
            } else if ($akun = $this->Database_model->getAkunByUsername($username_akun)) {
                if (password_verify($password_akun, $akun['password_akun'])) {
                    // Gunakan password_verify() saat login	Untuk membandingkan password user dengan hash di database. Jika password cocok, maka jalankan di bawah ini
                    $user = $this->Database_model->getUserByIdAkun($akun['id_akun']);
                    // set_userdata adalah fungsi untuk menyimpan data ke dalam session di CodeIgniter.
                    $this->session->set_userdata('id_akun', $akun['id_akun']);
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->set_userdata('username_akun', $username_akun);
                    $this->session->set_userdata('role', $akun['role']);
                    $this->session->set_userdata('logged_in', true);

                    header("Location: " . base_url('index.php/Home/index')); // arahkan ke beranda
                    return;
                } else {
                    // flashdata untuk notif error
                    $this->session->set_flashdata('login_error', 'Username atau password salah!'); // Menyimpan data flashdata dengan key 'login_error' dan value 'Username atau password salah!'.
                    redirect('Home/index'); // tetap di halaman beranda

                    // Flashdata adalah session sementara yang hanya bertahan untuk satu kali request berikutnya saja.
                    // Setelah ditampilkan satu kali, flashdata akan otomatis hilang. Cara ambil flashdata di view: <?php if ($this->session->flashdata('login_error')): 

                    // header() melakukan hard redirect, jadi tidak memuat ulang CodeIgniter lifecycle sepenuhnya seperti saat kamu pakai $this->load->view() atau $this->redirect() versi CI.
                    // flashdata butuh lifecycle CodeIgniter agar bisa terbaca di halaman berikutnya.
                    // Solusi Pasti Jalan: Gunakan helper redirect dari CodeIgniter, bukan header() PHP native.
                }
            } else {
                // Balikan ke Homepage
                $this->session->set_flashdata('login_error', 'Username atau password salah!');
                redirect('Home/index'); // gunakan helper redirect CI
                return;
            }
        }
    }

    public function logout()
    {
        // menghapus seluruh data session milik user saat ini(logout).
        $this->session->sess_destroy();
        header("Location: " . base_url('index.php/Home/index')); //redirect ke halaman homepage.
        return;

        // $this->session->sess_destroy(); Fungsi ini digunakan untuk menghapus seluruh data session milik user saat ini. Semua data yang sebelumnya dsimpan lewat set_userdata() (misal: logged_in, user_id, role, dll) akan hilang/dihapus. Biasanya ini dipakai saat logout, supaya user tidak lagi dianggap login.
    }
}

// best practice-nya PHP (terutama CodeIgniter dan Laravel), file class PHP sebaiknya tidak ditutup dengan tag penutup php untuk menghindari White space tidak sengaja setelah tag penutup php yang bisa bikin error 
// di CodeIgniter Model: Wajib OOP-style
// CodeIgniter sudah menyediakan cara terstruktur dan aman untuk query database.
