<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    /** 
    * Solusi lengkap (supaya properti dikenali di editor dan runtime)
    * @property Database_model $Database_model
    * @property CI_Input $input
    */
    class Katalog_produk extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Database_model');
        }

        function filter_produk() {
            $kategori = $this->input->post('kategori');
            if($kategori && $kategori != 'semua') {
                $result = $this->Database_model->getProdukByKategori($kategori);
            } else {
                $result = $this->Database_model->getAllProduk();
            }
            $data['produk'] = $result;
            // Load partial view khusus product card
            $this->load->view('partials/product_cards', $data);
        }
    }
?>