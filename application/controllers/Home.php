<?php

/**
 * @property Database_model $Database_model
 * @property CI_Session $session
 */
// masih butuh PHPDoc @property kalau mau warning hilang dari VS Code. Autoloading tidak otomatis dikenali oleh Intelephense.
// jika tidak pakai PHPDoc maka akan error:
// Undefined property '$Database_model' dan '$session'
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
        // untuk meload view profil_page.php
        $this->load->view('profil_page');
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