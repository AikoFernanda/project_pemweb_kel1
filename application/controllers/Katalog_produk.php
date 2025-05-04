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
        $keranjang = $this->Database_model->getProdukForShowInKeranjang($id_user);
        $data = [
            'produk' => $keranjang['produk'],
            'totalHarga' => $keranjang['total_harga']
        ];
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
    
        $id_produk = htmlspecialchars($this->input->post('id_produk'));
        $jumlah = (int) $this->input->post('jumlah'); // pastikan integer
        $harga = (int) $this->input->post('harga_satuan');
        $subtotal = $jumlah * $harga;
    
        $produk = $this->Database_model->getProductById($id_produk);

        if (!$jumlah) {
            echo "Jumlah tidak diterima dari client.";
            return;
        }

        if ($produk['stok'] > 0 && $jumlah <= $produk['stok']) {
            $insert = $this->Database_model->addProdukInKeranjang($id_user, $id_produk, $jumlah, $harga, $subtotal);
            if ($insert) {
                echo "Produk Berhasil Ditambahkan";
            } else {
                echo "Produk Gagal Ditambahkan. Coba Lagi Nanti";
            }
        } else {
            echo "Stok Produk Tidak Tersedia.";
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
            $data['produk'] = $this->Database_model->getProductById($id_produk); /* Ambil data produk berdasarkan id dan masukkan data array assosiatif sebagai value ke dalam variabel $data dengan key 'produk' */
            $this->session->set_userdata('location_detail_produk', $id_produk); // Simpan id produk ke session, Tenang session bisa "hangus" sendiri secara otomatis, tanpa tombol logout. Untuk waktu session aktif sebelum expiration sesuai config yang telah disetting.
            $this->session->set_userdata('location', $page); // Simpan page ke session
        } else {
            $id_produk = $this->session->userdata('location_detail_produk'); /* Tinggal ambil dari session. Jika tidak atau belum ada kiriman reques model get dengan key 'id_produk' */
        }

        if ($id_produk) {
            $data['produk'] = $this->Database_model->getProductById($id_produk);
        } else {
            $data['produk'] = null; // Atau kamu bisa redirect kalau produk tidak ditemukan
        }
        $this->load->view('detail_produk_page', $data);
    }

    public function deleteKeranjang()
    {
        // Mendapatkan id_user dari session
        $id_user = htmlspecialchars($this->session->userdata('id_user')); // htmlspecialchars() mengubah karakter berbahaya (<, >, ", ', dll.) menjadi entitas HTML aman. Kalau mau lebih baik pakai $this->input->post('id_produk', TRUE), lebih praktis, framework-friendly, dan otomatis. otomatis membersihkan input dari karakter berbahaya, mencegah serangan seperti XSS (Cross Site Scripting).
        // mendapatkan id_produk dari request method post
        $id_produk = $this->input->post('id_produk', TRUE); // untuk mendapatkan input dengan sanitasi otomatis. Ini adalah cara yang lebih aman dibandingkan htmlspecialchars().
        // hapus produk dari keranjang dengan model 
        $result = $this->Database_model->deleteProdukFromKeranjang($id_user, $id_produk);

        // mendapatkan data keranjang terbaru(produk dan total harga) dengan model setelah dihapus
        $keranjang = $this->Database_model->getProdukForShowInKeranjang($id_user);
        $totalHarga = $keranjang['total_harga'];
        if ($result) {
            echo json_encode([
                'success' => true,
                'pesan' => 'Produk Berhasil Dihapus Dari Keranjang.',
                'totalHarga' => $totalHarga,
                'totalHargaFormat' => number_format($totalHarga, 0, ',', '.')
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'pesan' => "Produk Gagal Dihapus. Coba Lagi Nanti.",
                'totalHarga' => $totalHarga,
                'totalHargaFormat' => number_format($totalHarga, 0, ',', '.')
            ]);
        }
    }

    public function checkout()
    {
        $id_user = $this->session->userdata('id_user');
        $user = $this->Database_model->getUserById($id_user);
        $keranjang = $this->Database_model->getProdukForShowInKeranjang($id_user);
        $data = [
            'produk' => $keranjang['produk'],
            'totalHarga' => $keranjang['total_harga'],
            'user' => $user
        ];
        // Cek apakah ada produk di keranjang
        if (empty($data['produk'])) {
            // Menambahkan pesan jika keranjang kosong
            $data['message'] = 'Keranjang Anda kosong.';
        }
        $this->load->view('checkout_page', $data);
    }

    public function transaksi()
    {
        $id_user = $this->session->userdata('id_user');
        $keranjang = $this->Database_model->getProdukForShowInKeranjang($id_user);
        $nama_lengkap = $this->input->post('nama_lengkap');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $id_transaksi = str_pad($this->Database_model->getTransactionId(), 5, 0, STR_PAD_LEFT); // memberi format 3 digit input, menambah 0 di kiri input hingga input berjumlah 3 digit
        $kode_pemesanan = "INV" . "-" . date('Ymd') . "-" . $id_transaksi;
        $total_transaksi = $this->input->post('total_transaksi');
        $dataTransaksi = [
            "kode_pemesanan" => $kode_pemesanan,
            "id_user" => $id_user,
            "total_transaksi" => $total_transaksi,
            "status_transaksi" => "Lunas" // di set selalu Lunas, karena belum ada sistem transaksi real di web ini.
        ];
        $result = $this->Database_model->transaction($dataTransaksi['kode_pemesanan'], $dataTransaksi['id_user'], $dataTransaksi['total_transaksi'], $dataTransaksi['status_transaksi']);
        if ($result) {
            $id_transaksi = $this->Database_model->getLastId();
            $this->Database_model->addDetailTransaction($id_user, $id_transaksi);
            $this->Database_model->deleteAllCartList($id_user);
            echo json_encode(
                [
                    "status_transaksi" => "success",
                    "pesan" => "Pesanan Anda Berhasil Dibuat."
                ]
            );
        } else {
            echo json_encode(
                [
                    "status_transaksi" => "error",
                    "pesan" => "Pesanan Anda Gagal Dibuat."
                ]
            );
        }
    }
}
