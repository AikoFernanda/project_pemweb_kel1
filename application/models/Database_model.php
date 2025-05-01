<?php

use LDAP\Result;

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

    public function getUserByIdAkun($id_akun)
    {
        $this->db->where('id_akun', $id_akun);
        $result = $this->db->get('user');
        return $result->row_array();
    }

    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
        // result() → pakai ->nama_produk (mengembalikan dalam bentuk objek)
        // result_array() → pakai ['nama_produk'] (mengembalikan dalam bentuk array assosiatif)
    }

    public function getKeranjangByIdUser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $result = $this->db->get('keranjang');

        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return [];  // Jika tidak ada data, kembalikan array kosong
        }
    }

    public function deleteProdukFromKeranjang($id_user, $id_produk)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_produk', $id_produk);
        return $result = $this->db->delete('keranjang'); // return true jika berhasil delete di db, false jika gagal
    }

    public function getProdukByKategori($kategori)
    {
        $this->db->where('kategori', $kategori);
        $result = $this->db->get('produk');
        return $result->result_array(); // mengembalikan array of array, array pertama adalah banyak row(data/record produk) array kedua adalah kolom(atribut/field dari produk)
    }

    public function getProdukForShowInKeranjang($id_user)
    {
        // Ambil data keranjang berdasarkan user_id
        $tabelKeranjang = $this->getKeranjangByIdUser($id_user); /* jika memanggil dalam satu file yaitu Database_model, cukup $this->namafunction(). Salah jik memanggilnya $this->db->namafunction() yang seolah2 dipanggil dari kelas database CI_DB_mysqli_driver yang hanya berfungsi untuk query database.*/
        // Inisialisasi array untuk menyimpan produk yang akan ditampilkan. 
        $produkForShow = [];

        $totalHarga = 0;
        // loop untuk memasukkan tiap element produk yang sesuai dalam array $produkForShow
        foreach ($tabelKeranjang as $k) {
            // Ambil data produk berdasarkan id_produk
            $tabelProduk = $this->getProdukById($k['id_produk']);
            // Tambahkan data produk ke dalam array assosiatif $produkForShow. Untuk mengembalikan array of array kita perlu menggunakan [] untuk menambahkan data produk ke dalam array.
            $produkForShow[] = [
                "id_produk" => $tabelProduk['id_produk'],
                "gambar" => $tabelProduk['gambar'],
                "nama_produk" => $tabelProduk['nama_produk'],
                "kategori" => $tabelProduk['kategori'],
                "jumlah" => $k['jumlah'],
                "subtotal" => $k['subtotal']
            ];
            $totalHarga += $k['subtotal'];
        }
        // Kembalikan array produk yang akan ditampilkan di keranjang
        return [
            'produk' => $produkForShow,
            'total_harga' => $totalHarga
        ];
    }

    public function addProdukInKeranjang($id_user, $id_produk, $jumlah, $hargaSatuanProduk, $subtotal)
    {
        $dataProduk = [
            "id_user" => $id_user,
            "id_produk" => $id_produk,
            "jumlah" => $jumlah,
            "subtotal" => $subtotal
        ];
        /* Cari dulu apakah produk ini sudah ada di keranjang */
        $this->db->where('id_user', $id_user);
        $this->db->where('id_produk', $id_produk); /* Kalau mau tambah kondisi banyak, cukup panggil $this->db->where() lagi.*/
        $cekKeranjang = $this->db->get('keranjang')->result(); /*$cekKeranjang itu adalah object query builder, bukan langsung data hasilnya. Harus ambil datanya pakai result, num_rows() atau row(). row() itu ngembaliin object, bukan array.*/

        if ($cekKeranjang) {
            // Loop foreach memeriksa semua baris keranjang yang memiliki id_produk sama.
            foreach ($cekKeranjang as $c) {
                $HargaSatuanKeranjang = $c->subtotal / $c->jumlah; // $hargaSatuanKeranjang untuk mendapatkan harga satuan produk yang sudah ada dikeranjang, tujuannya untuk dibandingkan produk yang sama dengan di keranjang tetapi ditentukan oleh harga(normal atau diskon) produk baru yang akan diinsert ke keranjang apakah harganya sama atau beda(karena promo). Kalau produk sama beda harga(faktor ada promo) maka buat row baru, jika produk dan harga sama tinggal update jumlah

                /* jika data di keranjang ditemukan dan harga sama, update jumlah dan subtotal*/
                if ($hargaSatuanProduk == $HargaSatuanKeranjang) {
                    $jumlahSebelumnya = $c->jumlah;
                    $subtotalSebelumnya = $c->subtotal;
                    $jumlahSekarang = $jumlahSebelumnya + $jumlah;
                    $subtotalSekarang = $subtotalSebelumnya + $subtotal;
                    $this->db->where('id_keranjang', $c->id_keranjang); // ID unik tabel keranjang
                    $updateKeranjang = $this->db->update('keranjang', [
                        "jumlah" => $jumlahSekarang,
                        "subtotal" => $subtotalSekarang
                    ]);
                    return $updateKeranjang;
                }
            }
            // Jika tidak ada data yang cocok (produk sama tapi harga beda), insert baris baru 
            $insertKeranjang = $this->db->insert('keranjang', $dataProduk);
            return $insertKeranjang;
        } else {
            // Jika tidak ada data yang cocok (produk sama tapi harga beda), insert baris baru 
            $insertKeranjang = $this->db->insert('keranjang', $dataProduk);
            return $insertKeranjang;
        }
    }


    public function getProdukById($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $result = $this->db->get('produk');
        return $result->row_array(); // mengembalikan 1 baris array assosiatif atau istilahnya tidak mengembalikan array of array seperti result_array(), jadi dia hanya mengembalikan 1 baris array saja.
    }

    public function insertDataAkun($email, $username_akun, $password_akun)
    {
        $dataAkun = [
            'email' => $email,
            'username_akun' => $username_akun,
            'password_akun' => $password_akun,
        ];

        // Nonaktifkan sementara debug error
        $this->db->db_debug = false;

        $insert = $this->db->insert('akun', $dataAkun);
        $error = $this->db->error(); // ambil error MySQL kalau ada, biasanya mengembalikan angka. Misal error code = 1062, memiliki arti duplicate data pada colom unique

        // Aktifkan kembali debug
        $this->db->db_debug = true;

        // Tangkap error duplicate
        if (!$insert && $error['code'] == 1062) {
            return 'duplicate';
        } else {
            return $insert;
            // Di CodeIgniter 3, tidak perlu pakai prepared statement manual, karena: CI3 sudah otomatis melindungi dari SQL Injection. Tanpa harus nulis prepare() dan bind_param() manual seperti di PHP native.
            // Saat kamu secara eksplisit mengisi kolom default (misalnya role, status_akun, tanggal_daftar) dengan string kosong (''), MySQL tidak akan menjalankan default-nya. Yang terjadi:
            // 1. 'role' => '' → dianggap "masukkan string kosong", bukan NULL → default "user" tidak dijalankan
            // 2. 'status_akun' => '' → kalau tipenya INT, string kosong dikonversi ke 0
            // 3. 'tanggal_daftar' => '' → dianggap datetime kosong → jadi 0000-00-00 00:00:00 kalau ALLOW_INVALID_DATES aktif
            // cukup masukkan data yang dibutuhkan saja yang tidak boleh null dan tidak memiliki nilai default ketika insert data.
        }
    }

    public function InsertDataUser($id_akun, $no_hp)
    {
        $dataUser = [
            'id_akun' => $id_akun,
            'no_hp' => $no_hp,
        ];
        $insertUserSukses = $this->db->insert('user', $dataUser);
        return $insertUserSukses;
        // return $insertUserSukses; Ini mengembalikan true kalau insert berhasil, atau false kalau gagal. Controller bisa pakai ini untuk memutuskan langkah selanjutnya.
    }

    public function getLastId()
    {
        // Ambil ID dari insert sebelumnya/terakhir
        $id = $this->db->insert_id();
        return $id;

        //$this->db->insert_id() di CodeIgniter digunakan untuk mengambil ID terakhir yang di-insert ke database oleh perintah insert sebelumnya. Artinya, ID itu berasal dari tabel yang baru saja di masukkan data ke dalamnya (dan kolom ID-nya harus auto-increment), ID dari tabel akun setelah insert sukses.
        // berguna jika kalau id AUTO_INCREMENT.
        //dan mengembalikan value id tersebut sebagai value function getLastId
    }

    public function getAkunByUsername($username_akun)
    {
        $query = $this->db->get_where('akun', ['username_akun' => $username_akun]);
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

    public function isEmailUsed($email)
    {
        // Mengecek apakah email telah digunakan atau ada dalam database
        return $this->db->where('email', $email)->get('akun')->num_rows() > 0;
        // Mengecek apakah query menghasilkan baris data. Jika hasilnya lebih dari 0, maka berarti ada email atau username yang sudah terpakai. Jika ada tidak lebih dari 0, berarti username atau email belum digunakan
        // Karena where() tidak langsung menjalankan query,
        // Dia hanya menyimpan kondisi, dan nanti saat get('akun'), CodeIgniter akan menggabungkan semuanya dan membentuk SQL-nya dengan benar.
        // Urutan di CodeIgniter itu method chaining, bukan urutan SQL. where() dulu boleh dan benar, karena get() lah yang baru mengeksekusi query-nya dan menyatukan semua kondisi yang sebelumnya sudah ditentukan.
    }

    public function isUsernameUsed($username_akun)
    {
        // Mengecek apakah email telah digunakan atau ada dalam database
        return $this->db->where('username_akun', $username_akun)->get('akun')->num_rows() > 0;
        // Mengecek apakah query menghasilkan baris data. Jika hasilnya lebih dari 0, maka berarti ada email atau username yang sudah terpakai. Jika ada tidak lebih dari 0, berarti username atau email belum digunakan
        // Karena where() tidak langsung menjalankan query,
        // Dia hanya menyimpan kondisi, dan nanti saat get('akun'), CodeIgniter akan menggabungkan semuanya dan membentuk SQL-nya dengan benar.
        // Urutan di CodeIgniter itu method chaining, bukan urutan SQL. where() dulu boleh dan benar, karena get() lah yang baru mengeksekusi query-nya dan menyatukan semua kondisi yang sebelumnya sudah ditentukan.
    }

    public function getTransactionId()
    {
        $query = $this->db->query("SELECT MAX(id_transaksi) AS max_id FROM transaksi");
        $lastId = $query->row()->max_id; /* row mengembalikan objek, row_array() mengembalikan array asosiatif. Akses ke kolom/atribut max_id dari hasil objek */
        if ($lastId == NULL) {
            $lastId = 0;
        }
        $nextId = $lastId + 1;
        return $nextId;
    }

    public function transaction($kode_pemesanan, $id_user, $total_transaksi, $status_transaksi)
    {
        $dataTransaksi = [
            "kode_pemesanan" => $kode_pemesanan,
            "id_user" => $id_user,
            "total_transaksi" => $total_transaksi,
            "status_transaksi" => $status_transaksi
        ];
        $result = $this->db->insert('transaksi', $dataTransaksi);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAllCartList($id_user)
    {
        $this->db->where('id_user', $id_user);
        $result = $this->db->delete('keranjang');
        return $result;
    }

    public function addDetailTransaction($id_user, $id_transaksi)
    {
        $cartProduct = $this->getKeranjangByIdUser($id_user);
        if ($cartProduct) {
            foreach ($cartProduct as $c) {
                // insert ke tabel detail_transaksi
                $this->db->insert('detail_transaksi', [
                    'id_transaksi' => $id_transaksi,
                    'id_produk' => $c['id_produk'],
                    'jumlah' => $c['jumlah'],
                    'subtotal' => $c['subtotal']
                ]);
                // update stok
                $this->decrementStock($c['id_produk'], $c['jumlah']);
            }
        }
    }

    public function decrementStock($id_produk, $orderCount)
    {
        $produk = $this->getProdukById($id_produk);
        if ($produk) {
            $stokBaru = $produk['stok'] - $orderCount;
            $stokBaru = max(0, $stokBaru); // Jangan sampai negatif
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk', [
                "stok" => $stokBaru
            ]);
        }
    }
}
// return pada model itu mengembalikan hasil dari operasi ke controller, jadi controller bisa tahu:
// 1.Apakah operasi berhasil/gagal (biasanya true/false),
// 2.Atau mengembalikan data penting (seperti insert_id() atau hasil query database).