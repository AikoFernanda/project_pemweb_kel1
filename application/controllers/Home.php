<?php

/**
 * @property Database_model $Database_model
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Upload $upload // Memuat library upload CodeIgniter
 */
// masih butuh PHPDoc @property kalau mau warning hilang dari VS Code. Autoloading tidak otomatis dikenali oleh Intelephense.
// jika tidak pakai PHPDoc maka akan error:
// Undefined property '$Database_model' dan '$session' dan $input
// Ini artinya VS Code (khususnya extension Intelephense) belum bisa mendeteksi kalau $this->Database_model itu valid, meskipun di CodeIgniter aslinya itu sah dan jalan 100%.

class Home extends CI_Controller
{
    // Jangan akses file langsung di dalam application/views/ menggunakan base_url() atau URL langsung. Alih-alih mengarahkan ke file PHP di dalam folder views, kita harus menggunakan Controller untuk memuat view tersebut.
    // nama classnya Welcome, 'W' wajib huruf besar karena class harus didahului huruf besar dan nama class sesuai dengan nama file controller. Semua Hal ini agar sesuai standart PSR
    public function index()
    { // nama method dari class Hello adalah index
        $page = "index.php/Home/index";
        if($this->session->userdata('id_user')) {
            $this->session->set_userdata('location', $page);
        }
        $this->load->view('homepage');
    }

    public function admin()
    {
        // mengecek apakah session userdata key 'role'-nya bernilai admin
        if ($this->session->userdata('role') === "admin") {
            // Memanggil view bernama akun_view.php dan mengirim data ke dalamnya.
            $this->load->view('admin_page');
        } else {
            // Balikan ke Homepage dengan session flashdata key 'admin_error'
            $this->session->set_flashdata('admin_error', 'Anda bukan admin!');
            redirect('Home/index'); // gunakan helper redirect CI
            return;
        }

        // $this adalah referensi untuk objek controller yang sedang berjalan.
        // Setelah model dipanggil, model bisa diakses pakai $this->Database_model.
        // Setelah function getDataAkun() dijalankan, Hasilnya (list akun dari database) disimpan ke array $data['akun']. $data adalah array associative yang menyimpan data yang nanti akan dikirim ke view. 'akun' adalah key atau nama variabel yang digunakan untuk menampung hasil dari query.
        // Setelah panggil view dan kirm datanya, Di file view nanti bisa pakai foreach, misal foreach ($akun as $a) untuk menampilkan datanya.
    }

    public function profil()
    {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->Database_model->getUserById($id_user); // CodeIgniter otomatis mengekstrak semua key dari array asosiatif $data menjadi variabel terpisah di view, misal $nama, $jenis_kelamin, dll. jika dibungkus dengan key 'user' atau nested array, nanti di view diakses dengan $user['nama']. 
        if($data['user']) {
            // untuk meload view profil_page.php
            $this->load->view('profil_page', $data);
        } else {
            $this->load->view('homepage');
        }
        
    }

    public function updateProfil(){
        $id_user = $this->session->userdata('id_user');
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap', TRUE), // TRUE untuk XSS filtering(seperti di php native htmlspecialchars), menghindari sql injecction
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE)
        ];

        /* konfigurasi upload */
        $config['upload_path'] = './assets/img/upload_foto_profil/'; // menentukan path atau folder tujuan file foto disimpan
        $config['allowed_types'] = 'jpeg|jpg|png'; // file dengan ekstensi tersebut yang boleh diupload, jika upload seperti pdf akan ditolak
        $config['max_size'] = 2048; // maksimal ukuran 2mb
        $config['file_name'] = 'user_' . $id_user . '_' . time(); // Nama file akan diubah sesuai value yang dihasilkan program disamping. Tujuannya untuk menghindari nama file duplikat.
        $this->upload->initialize($config); // reset config baru lagi, initialize() digunakan untuk mengatur ulang konfigurasi upload baru sebelum upload file berikutnya.

        // Hanya proses foto jika user upload
        if(!empty($_FILES['foto']['name'])) { // Cek apakah user mengupload file dari input dengan type="file" bernama 'foto'
            // mengecek Proses upload file dengan nama input foto ke $config['upload_path']. jika berhasil akan true
            if($this->upload->do_upload('foto')) {
                $upload_data= $this->upload->data(); // Ambil informasi file hasil upload, termasuk namanya.
                $data['foto'] = $upload_data['file_name']; // simpan nama file ke variabel $data dengan key 'foto' untuk disimpan di db 
            } else {
                // beri feedback jika error dalam upload foto
                echo json_encode ([
                    'status' => 'error',
                    'pesan' => 'Upload Foto Gagal'
                ]);
                return; // berhenti jika upload gagal
            }
        }
        /* 
        perilaku umum di banyak database seperti MySQL. Kalau kita mengirim string kosong (''), maka: 
        Database akan menyimpan string kosong, bukan NULL, dan tidak akan menggunakan nilai DEFAULT. */

        $result = $this->Database_model->updateUserById($id_user, $data);
        if($result) {
            echo json_encode([
                'status' => 'success',
                'pesan' => 'Profil Berhasil Diperbarui'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'pesan' => 'Profil Gagal Diperbarui'
            ]);
        }
    }

    public function produk()
    {
        $page = "index.php/Home/produk";
        if($this->session->userdata('id_user')) {
            $this->session->set_userdata('location', $page);
        }
        $data['produk'] = $this->Database_model->getAllProduk();
        $this->load->view('produk_page', $data); // laod view produk dengan passing data dari $data ke view
    }
}