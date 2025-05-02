<?php

/**
 * @property Database_model $Database_model
 * @property CI_Session $session
 * @property CI_Input $input
 */

class Admin_control extends CI_Controller
{
    public function detail_admin_page()
    {
        if ($this->session->userdata('role') === 'admin') {
            $location = htmlspecialchars($_GET['admin_page_location']);
            switch ($location) {
                case 'akun':
                    $data['akun'] = $this->Database_model->getDataAkun(); // mengembalikan array of object
                    $this->session->set_userdata('admin_page_location', $location);
                    break;
                case 'produk':
                    $data['produk'] = $this->Database_model->getAllProduk(); // mengembalikan array of array(assosiatif)
                    $this->session->set_userdata('admin_page_location', $location);
                    break;
                case 'user':
                    $data['user'] = $this->Database_model->getAllUser(); // mengembalikan array of array(assosiatif)
                    $this->session->set_userdata('admin_page_location', $location);
                    break;
                case 'keranjang':
                    $data['keranjang'] = $this->Database_model->getAllCarts(); // mengembalikan array of array(assosiatif)
                    $this->session->set_userdata('admin_page_location', $location);
                    break;
                case 'transaksi':
                    $data['transaksi'] = $this->Database_model->getAllTransactions(); // mengembalikan array of array(assosiatif)
                    $this->session->set_userdata('admin_page_location', $location);
                    break;
                case 'detail_transaksi':
                    $data['detail_transaksi'] = $this->Database_model->getAllCartDetails(); // mengembalikan array of array(assosiatif)
                    $this->session->set_userdata('admin_page_location', $location);
                    break;
                // case 'pengiriman':
                //     $data['pengiriman'] = $this->Database_model->getAllDeliveries();
                //     $this->session->set_userdata('admin_page_locatino', $location);
                //     break;
                default:
                    redirect('Home/admin');
                    return;
            }
            $this->load->view('detail_admin_page', $data);
        } else {
            redirect('Home/admin');
        }
    }

    public function dataDelete()
    {
        $location = $this->session->userdata('admin_page_location');
        switch ($location) {
            case 'akun':
                $id_akun = $this->input->post('id_akun', TRUE); // post yang dikirim lewat ajax dari js pada view detail_admin_page.php. TRUE untuk XSS filtering(seperti di php native htmlspecialchars), menghindari sql injecction
                $result = $this->Database_model->deleteAkunById($id_akun);
                break;
            case 'produk':
                $id_produk = $this->input->post('id_produk', TRUE);
                $result = $this->Database_model->deleteProdukById($id_produk);
                break;
            case 'user':
                $id_user = $this->input->post('id_user', TRUE);
                $result = $this->Database_model->deleteUserById($id_user);
                break;
            case 'keranjang':
                $id_keranjang = $this->input->post('id_keranjang', TRUE);
                $result = $this->Database_model->deleteCartById($id_keranjang);
                break;
            case 'transaksi':
                $id_transaksi = $this->input->post('id_transaksi', TRUE);
                $result = $this->Database_model->deleteTransactionById($id_transaksi);
                break;
            case 'detail_transaksi':
                $id_detail_transaksi = $this->input->post('id_detail_transaksi', TRUE);
                $result = $this->Database_model->deleteTransactionDetailById($id_detail_transaksi);
                break;
            default:
                echo json_encode(['status' => 'error', 'pesan' => 'Lokasi tidak dikenali']);
                return;
        }
        if ($result) {
            echo json_encode([
                'status' => 'sukses',
                'pesan' => 'Data Berhasil Dihapus'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'pesan' => 'Data Gagal Dihapus'
            ]);
        }
    }
}
