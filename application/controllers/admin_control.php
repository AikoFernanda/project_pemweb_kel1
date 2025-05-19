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
                case 'jadwal_pengiriman':
                    $data['jadwal_pengiriman'] = $this->Database_model->getAllDeliveries();
                    $this->session->set_userdata('admin_page_location', $location);
                    break;
                default:
                    redirect('Home/admin');
                    return;
            }
            $this->load->view('detail_admin_page', $data);
        } else {
            redirect('Home/admin');
        }
    }

    public function detail_transaction()
    {
        $id_transaksi = $this->input->get('id');
        $data['detail_transaksi'] = $this->Database_model->getTransactionDetailByIdTransaction($id_transaksi);
        $this->load->view('detail_transaksi_admin_page', $data);
    }

    public function dataDelete()
    {
        $location = $this->session->userdata('admin_page_location');
        switch ($location) {
            case 'akun':
                $id_akun = $this->input->post('id_akun', TRUE); // post yang dikirim lewat ajax dari js pada view detail_admin_page.php. TRUE untuk XSS filtering(seperti di php native htmlspecialchars), menghindari sql injecction.
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
            case 'jadwal_pengiriman':
                $id_jadwal = $this->input->post('id_jadwal', TRUE);
                $result = $this->Database_model->deleteDeliverById($id_jadwal);
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

    public function loadEditAdminPage()
    {
        $location = $this->session->userdata('admin_page_location');
        switch ($location) {
            case 'akun':
                $id_akun = $this->input->post('id_akun');
                $akun['akun'] = $this->Database_model->getAccountById($id_akun);
                $this->load->view('edit_admin_page.php', $akun);
                break;
            case 'produk':
                $id_produk = $this->input->post('id_produk');
                $produk['produk'] = $this->Database_model->getProductById($id_produk);
                $this->load->view('edit_admin_page.php', $produk);
                break;
            case 'user':
                $id_user = $this->input->post('id_user');
                $user['user'] = $this->Database_model->getUserById($id_user);
                $this->load->view('edit_admin_page.php', $user);
                break;
            case 'keranjang':
                $id_keranjang = $this->input->post('id_keranjang');
                $keranjang['keranjang'] = $this->Database_model->getCartById($id_keranjang);
                $this->load->view('edit_admin_page.php', $keranjang);
                break;
            case 'transaksi':
                $id_transaksi = $this->input->post('id_transaksi');
                $transaksi['transaksi'] = $this->Database_model->getTransactionById($id_transaksi);
                $this->load->view('edit_admin_page.php', $transaksi);
                break;
            case 'detail_transaksi':
                $id_detail_transaksi = $this->input->post('id_detail_transaksi');
                $detail_transaksi['detail_transaksi'] = $this->Database_model->getTransactionDetailById($id_detail_transaksi);
                $this->load->view('edit_admin_page.php', $detail_transaksi);
                break;
            case 'jadwal_pengiriman':
                $id_jadwal = $this->input->post('id_jadwal');
                $jadwal_pengiriman['jadwal_pengiriman'] = $this->Database_model->getDeliveryById($id_jadwal);
                $jadwal_pengiriman['jadwal_pengiriman']['tanggal_pengiriman'] = date(
                    'Y-m-d\TH:i',
                    strtotime($jadwal_pengiriman['jadwal_pengiriman']['tanggal_pengiriman']) // merubah dari format db type datetime menjadi format input type datetime-local, misal 2025-05-05T14:30.
                );
                $this->load->view('edit_admin_page.php', $jadwal_pengiriman);
                break;
                // T adalah huruf literal untuk memisahkan tanggal dan jam pada input datetime-local di HTML. 
                // Karena dalam PHP date() fungsi T biasanya berarti timezone, kamu perlu escape dengan backslash (\) agar dianggap sebagai huruf biasa. misal 2025-05-05T14:30 (format yang dibutuhkan oleh <input type="datetime-local">)
                // $raw = "2025-05-05 14:30:00"; // dari database
                // $timestamp = strtotime($raw); // jadi angka: 1746455400 (contoh)
                // $formatted = date('Y-m-d\TH:i', $timestamp); // hasil: 2025-05-05T14:30
            default:
                echo 'error';
        }
    }

    public function dataUpdate()
    {
        $location = $this->session->userdata('admin_page_location');
        $postData = $this->input->post(); // Ambil semua input

        switch ($location) {
            case 'akun':
                $id = $postData['id_akun'];
                $result = $this->Database_model->updateAccountById($id, $postData);
                break;
            // Lakukan yang sama untuk case lainnya dan sesuaikan field
            case 'produk':
                $id = $postData['id_produk'];
                $result = $this->Database_model->updateProductById($id, $postData);
                break;
            case 'user':
                $id = $postData['id_user'];
                $result = $this->Database_model->updateUserById($id, $postData);
                break;
            case 'keranjang':
                $id = $postData['id_keranjang'];
                $result = $this->Database_model->updateCartById($id, $postData);
                break;
            case 'transaksi':
                $id = $postData['id_transaksi'];
                $result = $this->Database_model->updateTransactionById($id, $postData);
                break;
            case 'detail_transaksi':
                $id = $postData['id_detail_transaksi'];
                $result = $this->Database_model->updateTransactionDetailById($id, $postData);
                break;
            case 'jadwal_pengiriman':
                $id = $postData['id_jadwal'];
                // Ubah format tanggal dari datetime-local ke format datetime (MySQL)
                $postData['tanggal_pengiriman'] = date('Y-m-d H:i:s', strtotime($postData['tanggal_pengiriman']));
                $result = $this->Database_model->updateDeliverykById($id, $postData);
                break;
            //'H:i:s', Ini format waktu jam-menit-detik dalam 24 jam: 
            //H = jam (00–23)
            //i = menit (00–59)
            //s = detik (00–59)
            //Contoh hasil: date('Y-m-d H:i:s'); Output: 2025-05-05 14:30:00
            default:
                echo json_encode(['status' => 'error', 'pesan' => 'Lokasi tidak ditemukan']);
                return;
        }

        if ($result) {
            echo json_encode(['status' => 'success', 'pesan' => 'Data berhasil diperbarui']);
        } else {
            echo json_encode(['status' => 'error', 'pesan' => 'Gagal memperbarui data']);
        }
    }

    public function loadViewAddAdminPage()
    {
        $this->load->view('admin_add_page');
    }

    public function dataAdd()
    {
        $location = $this->session->userdata('admin_page_location');
        $data = $this->input->post();
        switch ($location) {
            case 'akun':
                // 'email' => $this->input->post('email'),
                // 'username_akun' => $this->input->post('username_akun'),
                // 'password_akun' => $this->input->post('password_akun'),
                // 'role' => $this->input->post('role'),
                // 'status_akun' => $this->input->post('status_akun')
                $result = $this->Database_model->insertAccount($data);
                if ($result === 'success') {
                    echo json_encode([
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan!'
                    ]);
                } elseif ($result === 'found') {
                    echo json_encode([
                        'status' => 'found',
                        'pesan' => 'Username atau email telah digunakan'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'Data Gagal Ditambahkan!'
                    ]);
                }
                break;
            case 'produk':
                $data = [
                    'nama_produk' => $this->input->post('nama_produk'),
                    'kategori' => $this->input->post('kategori'),
                    'stok' => $this->input->post('stok'),
                    'harga' => $this->input->post('harga'),
                    'presentase_diskon' => $this->input->post('presentase_diskon'),
                    'gambar' => $this->input->post('gambar'),
                    'deskripsi' => $this->input->post('deskripsi')
                ];
                $result = $this->Database_model->insertProduct($data);
                if ($result === 'success') {
                    echo json_encode([
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan!'
                    ]);
                } elseif ($result === 'found') {
                    echo json_encode([
                        'status' => 'found',
                        'pesan' => 'Produk telah Tersedia'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'Data Gagal Ditambahkan!'
                    ]);
                }
                break;
            case 'user':
                $data = [
                    'id_akun' => $this->input->post('id_akun'),
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'foto' => $this->input->post('foto'),
                    'no_hp' => $this->input->post('no_hp'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir')
                ];
                $result = $this->Database_model->insertUser($data);
                if ($result === 'success') {
                    echo json_encode([
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan!'
                    ]);
                } elseif ($result === 'notFound') {
                    echo json_encode([
                        'status' => 'notFound',
                        'pesan' => 'Id-akun Tidak Ditemukan!'
                    ]);
                } elseif ($result === 'found') {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'User Telah Tersedia!'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'Data Gagal Ditambahkan!'
                    ]);
                }
                break;
            case 'keranjang':
                $data = [
                    'id_user' => $this->input->post('id_user'),
                    'id_produk' => $this->input->post('id_produk'),
                    'jumlah' => $this->input->post('jumlah'),
                    'subtotal' => $this->input->post('subtotal')
                ];
                $result = $this->Database_model->insertCart($data);
                if ($result === 'success') {
                    echo json_encode([
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan!'
                    ]);
                } elseif ($result === 'notFound') {
                    echo json_encode([
                        'status' => 'notFound',
                        'pesan' => 'Id-user atau id-produk Tidak Ditemukan'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'Data Gagal Ditambahkan!'
                    ]);
                }
                break;
            case 'transaksi':
                $data = [
                    'kode_pemesanan' => $this->input->post('kode_pemesanan'),
                    'id_user' => $this->input->post('id_user'),
                    'total_transaksi' => $this->input->post('total_transaksi'),
                    'status_transaksi' => $this->input->post('status_transaksi')
                ];
                $result = $this->Database_model->insertTransaction($data);
                if ($result === 'success') {
                    echo json_encode([
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan!'
                    ]);
                } elseif ($result === 'notFound') {
                    echo json_encode([
                        'status' => 'notFound',
                        'pesan' => 'Id-user tidak ditemukan'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'Data Gagal Ditambahkan!'
                    ]);
                }
                break;
            case 'detail_transaksi':
                $data = [
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'id_produk' => $this->input->post('id_produk'),
                    'jumlah' => $this->input->post('jumlah'),
                    'subtotal' => $this->input->post('subtotal')
                ];
                $result = $this->Database_model->insertTransactionDetail($data);
                if ($result === 'success') {
                    echo json_encode([
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan!'
                    ]);
                } elseif ($result === 'notFound') {
                    echo json_encode([
                        'status' => 'notFound',
                        'pesan' => 'Id-transaksi atau id-produk tidak ditemukan'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'Data Gagal Ditambahkan'
                    ]);
                }
                break;
            case 'jadwal_pengiriman':
                $data = [
                    'id_transaksi' => $this->input->post('id_transaksi'),
                    'nama_pemesan' => $this->input->post('nama_pemesan'),
                    'alamat_tujuan' => $this->input->post('alamat_tujuan'),
                    'no_hp_pemesan' => $this->input->post('no_hp_pemesan'),
                    'status_pengiriman' => $this->input->post('status_pengiriman')
                ];
                $result = $this->Database_model->insertDelivery($data);
                if ($result === 'success') {
                    echo json_encode([
                        'status' => 'success',
                        'pesan' => 'Data Berhasil Ditambahkan!'
                    ]);
                } elseif ($result === 'notFound') {
                    echo json_encode([
                        'status' => 'notFound',
                        'pesan' => 'Id-transaki tidak ditemukan'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'pesan' => 'Data Gagal Ditambahkan'
                    ]);
                }
                break;
            default:
                echo json_encode([
                    'status' => 'error',
                    'pesan' => 'Lokasi Tidak Ditemukan!'
                ]);
        }
    }
}
