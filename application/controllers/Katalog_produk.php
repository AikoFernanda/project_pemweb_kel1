<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    /** 
    * Solusi lengkap (supaya properti dikenali di editor dan runtime)
    * @property Database_model $Database_model
    * @property CI_Input $input
    * @property CI_Session $session
    */
    class Katalog_produk extends CI_Controller {

        public function keranjang()
        {
            $id_user = $this->session->userdata('id_user');
            $data['produk'] = $this->Database_model->getKeranjangByIdUser($id_user);
            $this->load->view('keranjang_page', $data);
        }

        function filter_produk() {
            $kategori = $this->input->post('kategori');
            if($kategori != 'semua') {
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
            $id_produk = htmlspecialchars($_GET['id_produk']); /*(buat keamanan dari input user, mencegah XSS) */
            $data['produk'] = $this->Database_model->getProdukById($id_produk); /* Ambil data produk berdasarkan id dan masukkan data array assosiatif sebagai value ke dalam variabel $data dengan key 'produk' */
            $this->load->view('detail_produk_page', $data);
        }
    }
?>