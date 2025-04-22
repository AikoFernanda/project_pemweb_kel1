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
        if (isset($_POST['submit'])) {
            $email = htmlspecialchars($_POST['email']);
            $username_akun = htmlspecialchars($_POST['username_akun']);
            $password_akun = password_hash($_POST['password_akun'], PASSWORD_DEFAULT);
            $no_hp = htmlspecialchars($_POST['no_hp']);

            $insertAkunSukses = $this->Database_model->insertDataAkun($email, $username_akun, $password_akun);
            if ($insertAkunSukses) {
                // Ambil ID akun terakhir
                $id_akun = $this->Database_model->getLastId();
                $this->Database_model->insertDataUser($id_akun, $no_hp);
            }
            header("Location: " . base_url('index.php/Home/index'));
            return;
        } else {
            $this->load->view('form_signup');
            return; // lebih baik pakai return daripada exit; di dalam controller CodeIgniter (terutama CI3). 
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
                $this->session->set_userdata('username_akun', $username_akun);
                $this->session->set_userdata('role', 'admin');
                $this->session->set_userdata('logged_id', true); // Menyimpan data session dengan key 'logged_in' dan value true. Selama session masih aktif (belum logout atau expired), user akan dianggap sudah login.
                header("Location: " . base_url('index.php/Home/admin')); // Titik (.) di PHP adalah operator penggabung string (concatenation). Jika admin akan request ke controller untuk load halaman admin_page.php.
                return; // Cara ambil set_userdata di view: if ($this->session->userdata('logged_in')). Bertahan selama session aktif, untuk tandai user sudah login.

                // dummy user login
            } else if ($_POST['username_akun'] === "user" && $_POST['password_akun'] === "user123") {
                $this->session->set_userdata('username_akun', $username_akun);
                $this->session->set_userdata('role', 'user');
                $this->session->set_userdata('logged_in', true);
                header("Location: " . base_url('index.php/Home/index'));
                return;

                // login user terdaftar di database
            } else if ($akun = $this->Database_model->getAkunByUsername($username_akun)) {
                // jika $akun bernilai true atau mengembalikan nilai jalankan statement dibawah ini.
                if (password_verify($password_akun, $akun['password_akun'])) {
                    // Gunakan password_verify() saat login	Untuk membandingkan password user dengan hash di database. Jika password cocok, maka jalankan di bawah ini

                    // set_userdata adalah fungsi untuk menyimpan data ke dalam session di CodeIgniter.
                    // Set session
                    $this->session->set_userdata('id_akun', $akun['id_akun']);
                    $this->session->set_userdata('username_akun', $username_akun);
                    $this->session->set_userdata('role', $akun['role']);
                    $this->session->set_userdata('logged_in', true);

                    header("Location: " . base_url('index.php/Home/index')); // arahkan ke beranda
                    return;
                } else {
                    // flashdata untuk notif error
                    $this->session->set_flashdata('login_error', 'Username atau password salah!'); // Menyimpan data flashdata dengan key 'login_error' dan value 'Username atau password salah!'.
                    redirect('Home/index'); // tetap di halaman beranda
                    return;

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
        $this->session->sess_destroy();
        header("Location: " . base_url('index.php/Home/index'));
        return;
    }
}

// best practice-nya PHP (terutama CodeIgniter dan Laravel), file class PHP sebaiknya tidak ditutup dengan tag penutup php untuk menghindari White space tidak sengaja setelah tag penutup php yang bisa bikin error 
// di CodeIgniter Model: Wajib OOP-style
// CodeIgniter sudah menyediakan cara terstruktur dan aman untuk query database. Contoh gaya yang benar: