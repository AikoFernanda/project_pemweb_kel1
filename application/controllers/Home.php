<?php

/**
 * @property Database_model $Database_model
 */
//masih butuh PHPDoc @property kalau mau warning hilang dari VS Code. Autoloading tidak otomatis dikenali oleh Intelephense.
// jika tidak pakai PHPDoc maka akan error:
// Undefined property '$Database_model'
// Ini artinya VS Code (khususnya extension Intelephense) belum bisa mendeteksi kalau $this->Database_model itu valid, meskipun di CodeIgniter aslinya itu sah dan jalan 100%.

class Home extends CI_Controller
{
    // nama classnya Welcome, 'W' wajib huruf besar karena class harus didahului huruf besar dan nama class sesuai dengan nama file controller. Semua Hal ini agar sesuai standart PSR
    public function index()
    { //// nama method dari class Hello adalah index
        $this->load->view('homepage');
    }

    # Jangan akses file langsung di dalam application/views/ menggunakan base_url() atau URL langsung. Alih-alih mengarahkan ke file PHP di dalam folder views, kamu harus menggunakan Controller untuk memuat view tersebut. 

    public function admin()
    {
        // Ini memanggil model bernama Database_model.php dari folder application/models.
        $this->load->model('Database_model');
        // Menjalankan method getDataAkun() yang ada di dalam class Database_model.
        $data['akun'] = $this->Database_model->getDataAkun();
        // Memanggil view bernama akun_view.php dan mengirim data ke dalamnya.
        $this->load->view('admin_page', $data);

        // $this adalah referensi untuk objek controller yang sedang berjalan.
        // Setelah model dipanggil, model bisa diakses pakai $this->Database_model.
        // Setelah function getDataAkun() dijalankan, Hasilnya (list akun dari database) disimpan ke array $data['akun']. $data adalah array associative yang menyimpan data yang nanti akan dikirim ke view. 'akun' adalah key atau nama variabel yang digunakan untuk menampung hasil dari query.
        // Setelah panggil view dan kirm datanya, Di file view nanti bisa pakai foreach, misal foreach ($akun as $a) untuk menampilkan datanya.
    }

    public function profil() {
        $this->load->view('profil_page');
    }
}
