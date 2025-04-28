<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** 
 * Solusi lengkap (supaya properti dikenali di editor dan runtime)
 * @property Database_model $Database_model
 * @property CI_Input $input
 * @property CI_Session $session
 */
class Katalog_produk extends CI_Controller
{

    public function keranjang()
    {
        $id_user = $this->session->userdata('id_user');
        $data['produk'] = $this->Database_model->getProdukForShowInKeranjang($id_user);
        // Cek apakah ada produk di keranjang
        if (empty($data['produk'])) {
            // Menambahkan pesan jika keranjang kosong
            $data['message'] = 'Keranjang Anda kosong.';
        }

        // Tampilkan halaman keranjang dengan data produk
        $this->load->view('keranjang_page', $data);
    }

    public function addKeranjang()
    {
        $id_user = $this->session->userdata('id_user');
        if (!$id_user) {
            echo "Session expired atau belum login!";
            return;
        }

        $id_user = $this->session->userdata('id_user');
        $id_produk = htmlspecialchars($_POST['id_produk']);
        $jumlah = htmlspecialchars($_POST['jumlah']);
        $harga = htmlspecialchars($_POST['harga_satuan']);
        $subtotal = $jumlah * $harga;

        $insert = $this->Database_model->addProdukInKeranjang($id_user, $id_produk, $jumlah, $subtotal);
        if ($insert) {
            echo "Produk Berhasil Ditambahkan";
        } else {
            echo "Produk Gagal Ditambahkan. Coba Lagi Nanti";
        }
    }

    function filter_produk()
    {
        $kategori = $this->input->post('kategori');
        if ($kategori != 'semua') {
            $result = $this->Database_model->getProdukByKategori($kategori);
        } else {
            $result = $this->Database_model->getAllProduk();
        }
        $data['produk'] = $result;
        // Load partial view khusus product card
        $this->load->view('partials/product_cards', $data);
    }

    public function detail_produk()
    {
        $page = "index.php/Katalog_produk/detail_produk";

        if (isset($_GET['id_produk'])) {
            $id_produk = htmlspecialchars($_GET['id_produk']); /*(buat keamanan dari input user, mencegah XSS) */
            $data['produk'] = $this->Database_model->getProdukById($id_produk); /* Ambil data produk berdasarkan id dan masukkan data array assosiatif sebagai value ke dalam variabel $data dengan key 'produk' */
            $this->session->set_userdata('location_detail_produk', $id_produk); // Simpan id produk ke session, Tenang session bisa "hangus" sendiri secara otomatis, tanpa tombol logout. Untuk waktu session aktif sebelum expiration sesuai config yang telah disetting.
            $this->session->set_userdata('location', $page); // Simpan page ke session
        } else {
            $id_produk = $this->session->userdata('location_detail_produk'); /* Tinggal ambil dari session. Jika tidak atau belum ada kiriman reques model get dengan key 'id_produk' */
        }

        if ($id_produk) {
            $data['produk'] = $this->Database_model->getProdukById($id_produk);
        } else {
            $data['produk'] = null; // Atau kamu bisa redirect kalau produk tidak ditemukan
        }
        $this->load->view('detail_produk_page', $data);
    }

    public function deleteKeranjang()
    {
        $id_user = htmlspecialchars($this->session->userdata('id_user')); // htmlspecialchars() mengubah karakter berbahaya (<, >, ", ', dll.) menjadi entitas HTML aman. Kalau mau lebih baik pakai $this->input->post('id_produk', TRUE), lebih praktis, framework-friendly, dan otomatis. otomatis membersihkan input dari karakter berbahaya, mencegah serangan seperti XSS (Cross Site Scripting).
        $id_produk = htmlspecialchars($_POST['id_produk']);
        $result = $this->Database_model->deleteProdukFromKeranjang($id_user, $id_produk);
        if ($result) {
            $pesan =  "Produk Berhasil Dihapus";
        } else {
            $pesan = "Produk Gagal Dihapus. Coba Lagi Nanti";
        }
        echo $pesan;
    }
}
