<?php

class Database_model extends CI_Model
{
    // CI_Controller → untuk controller (logika request & response)
    // CI_Model → untuk model (akses database), Artinya mewarisi semua fitur dari class model bawaan CodeIgniter.
    // Setelah diubah extends CI_Model, kita bisa akses di controller begini: $this->database_model->getData();

    /* contoh: 
        public function getAkun(){
            $conn = mysqli_connect("localhost", "root", "root", "cv_mulamu");    
            $getAkun = mysqli_query($conn, "SELECT * FROM akun");
         }
        
        --- ada sedikit perbedaan pada CI 3 dalam bekerja dengan database di model ---
        1. Tidak boleh ada kode PHP biasa ($conn = ...) di dalam class model CI. CI sudah punya cara sendiri untuk konek ke database lewat $this->db. 
           Kamu tidak perlu koneksi manual mysqli_connect() karena CodeIgniter sudah otomatis load dari konfigurasi application/config/database.php.
        2. Gunakan $this->db->get('nama_tabel') untuk ambil data. Setara dengan: SELECT * FROM akun.
        3. Gunakan result() untuk ambil semua data sebagai array objek, atau result_array() kalau mau array asosiatif.
        */

    public function getDataAkun()
    {
        // Mengambil semua data dari tabel 'akun'
        return $this->db->get('akun')->result(); // setara dengan: $result = mysqli_query($conn, "SELECT * FROM akun");, get('akun') = select * from akun.

        // Mengembalikan hasil query dalam bentuk array of object.
        // Gunakan result() untuk ambil semua data sebagai array objek, atau result_array() kalau mau array asosiatif.
        // result() -> array of objectAkses, akses datanya seperti ini: echo $data[0]->nama; // Output: Andi
        // result_array() -> array of associative, akses datanya seperti ini: echo $data[0]['nama']; // Output: Andi
    }

    public function insertDataAkun($email, $username_akun, $password_akun)
    {
        $dataAkun = [
            'id_akun' => '',
            'email' => $email,
            'username_akun' => $username_akun,
            'password_akun' => $password_akun,
            'role' => '',
            'status_akun' => '',
            'tanggal_daftar' => ''
        ];
        $insertAkunSukses = $this->db->insert('akun', $dataAkun);

        return $insertAkunSukses;
    }

    public function InsertDataUser($id_akun, $no_hp)
    {
        $dataUser = [
            'id_user' => '',
            'id_akun' => $id_akun,
            'nama_lengkap' => '',
            'jenis_kelamin' => '',
            'alamat' => '',
            'no_hp' => $no_hp,
            'tanggal_lahir' => ''
        ];
        $insertUserSukses = $this->db->insert('user', $dataUser);
        return $insertUserSukses;
        // return $insertUserSukses; Ini mengembalikan true kalau insert berhasil, atau false kalau gagal. Controller bisa pakai ini untuk memutuskan langkah selanjutnya.
    }

    public function getLastId()
    {
        // Ambil ID akun terakhir
        $id_akun = $this->db->insert_id();
        return $id_akun;

        //Fungsi insert_id() dari CodeIgniter akan mengembalikan id dari data terakhir yang berhasil dimasukkan (dalam hal ini, ID dari tabel akun setelah insert sukses).
        //dan mengembalikan value id tersebut sebagai value function getLastId
    }

    public function getAkunByUsername($username_akun) {
        $query = $this->db->get_where('akun',['username_akun' => $username_akun]);
        return $query->row_array();

        // row_array() Mengembalikan satu baris hasil query dalam bentuk array asosiatif. Kalau result() array of object
        // Cocok untuk query yang hanya mengembalikan 1 data, misalnya login, cari ID, dll.
    }

    public function isEmailExist($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('akun');
        return $query->num_row() > 0;
    }
}
// return pada model itu mengembalikan hasil dari operasi ke controller, jadi controller bisa tahu:
// 1.Apakah operasi berhasil/gagal (biasanya true/false),
// 2.Atau mengembalikan data penting (seperti insert_id() atau hasil query database).
?>