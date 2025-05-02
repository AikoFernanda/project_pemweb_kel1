<?php
$sesi = $this->session->userdata('role');
if ($sesi !== "admin") {
    redirect('Home/admin');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= 'Admin Detail - CV MULIA LANGGENG MUFAKAT'; ?></title>
    <!--link css-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_detail_admin_page.css?v=' . time()); ?>">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <header>
        <div class="container header-content">
            <h2>Admin Panel</h2>
            <button class="logout-btn" onclick="window.location.href='<?= base_url('index.php/Signup_login_control/logout'); ?>'">Logout</button>
        </div>
    </header>
    <main class="container">
        <h1></h1>
        <a href="<?= base_url('index.php/Home/admin') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali<!--Untuk ikon panah ke kiri-->
        </a>
        <div class="tabel-wrapper">
            <?php if (($this->session->userdata('admin_page_location')) === 'akun') : ?>
                <table border="1px" cellpadding="10px" cellspacing="0">
                    <thead>
                        <th>Nomor</th>
                        <th>Id Akun</th>
                        <th>Email</th>
                        <th>Username Akun</th>
                        <th>Password Akun</th>
                        <th>Role</th>
                        <th>Status Akun</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php if (!empty($akun)) : ?>
                            <?php foreach ($akun as $a) : ?> <!--$akun adalah nama variabel yang sudah ditentukan di controller untuk menyimpan data akun. $akun adalah nama variabel yang menyimpan hasil query yang diambil dari database ($data['akun']), yang sudah kita definisikan sebelumnya di controller.-->
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $a->id_akun ?></td>
                                    <td><?= $a->email ?></td>
                                    <td><?= $a->username_akun ?></td>
                                    <td><?= $a->password_akun ?></td>
                                    <td><?= $a->role ?></td>
                                    <td><?= $a->status_akun ?></td>
                                    <td><?= $a->tanggal_daftar ?></td>
                                    <td>
                                        <button class="btn-edit" name="edit">Edit</button>
                                        <button class="btn-hapus" name="hapus" data-id="<?= $a->id_akun ?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php $i += 1 ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php elseif ($this->session->userdata('admin_page_location') === 'produk'): ?>
                <?php $i = 1 ?>
                <table border="1px" cellpadding="10px" cellspacing="0">
                    <thead>
                        <th>Nomor</th>
                        <th>Id Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Persentase Diskon</th>
                        <th>Gambar</th>
                        <th>Deksripsi</th>
                        <th>Terakhir Diubah</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php if (!empty($produk)) : ?>
                            <?php foreach ($produk as $p) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $p['id_produk']; ?></td>
                                    <td><?= $p['nama_produk']; ?></td>
                                    <td><?= $p['kategori']; ?></td>
                                    <td><?= $p['stok']; ?></td>
                                    <td><?= $p['harga']; ?></td>
                                    <td><?= $p['persentase_diskon']; ?></td>
                                    <td><?= $p['gambar']; ?></td>
                                    <td><?= $p['deskripsi']; ?></td>
                                    <td><?= $p['terakhir_diubah']; ?></td>
                                    <td>
                                        <button class="btn-edit" name="edit">Edit</button>
                                        <button class="btn-hapus" name="hapus" data-id="<?= $p['id_produk']; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php $i += 1 ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php elseif ($this->session->userdata('admin_page_location') === 'user'): ?>
                <?php $i = 1 ?>
                <table border="1px" cellpadding="10px" cellspacing="0">
                    <thead>
                        <th>Nomor</th>
                        <th>Id User</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php if (!empty($user)) : ?>
                            <?php foreach ($user as $u) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $u['id_user']; ?></td>
                                    <td><?= $u['nama_lengkap']; ?></td>
                                    <td><?= $u['jenis_kelamin']; ?></td>
                                    <td><?= $u['alamat']; ?></td>
                                    <td><?= $u['no_hp']; ?></td>
                                    <td><?= $u['tanggal_lahir']; ?></td>
                                    <td>
                                        <button class="btn-edit" name="edit">Edit</button>
                                        <button class="btn-hapus" name="hapus" data-id="<?= $u['id_user']; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php $i += 1 ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php elseif ($this->session->userdata('admin_page_location') === 'keranjang'): ?>
                <?php $i = 1 ?>
                <table border="1px" cellpadding="10px" cellspacing="0">
                    <thead>
                        <th>Nomor</th>
                        <th>Id Keranjang</th>
                        <th>Id User</th>
                        <th>Id Produk</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Update At</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php if (!empty($keranjang)) : ?>
                            <?php foreach ($keranjang as $k) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $k['id_keranjang']; ?></td>
                                    <td><?= $k['id_user']; ?></td>
                                    <td><?= $k['id_produk']; ?></td>
                                    <td><?= $k['jumlah']; ?></td>
                                    <td><?= $k['subtotal']; ?></td>
                                    <td><?= $k['update_at']; ?></td>
                                    <td>
                                        <button class="btn-edit" name="edit">Edit</button>
                                        <button class="btn-hapus" name="hapus" data-id="<?= $k['id_keranjang']; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php $i += 1 ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php elseif ($this->session->userdata('admin_page_location') === 'transaksi'): ?>
                <?php $i = 1 ?>
                <table border="1px" cellpadding="10px" cellspacing="0">
                    <thead>
                        <th>Nomor</th>
                        <th>Id Transaksi</th>
                        <th>Kode Pemesanan</th>
                        <th>Id_User</th>
                        <th>Total Transaksi</th>
                        <th>Status Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi)) : ?>
                            <?php foreach ($transaksi as $t) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $t['id_transaksi']; ?></td>
                                    <td><?= $t['kode_pemesanan']; ?></td>
                                    <td><?= $t['id_user']; ?></td>
                                    <td><?= $t['total_transaksi']; ?></td>
                                    <td><?= $t['status_transaksi']; ?></td>
                                    <td><?= $t['tanggal_transaksi']; ?></td>
                                    <td>
                                        <button class="btn-edit" name="edit">Edit</button>
                                        <button class="btn-hapus" name="hapus" data-id="<?= $t['id_transaksi']; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php $i += 1 ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            <?php elseif ($this->session->userdata('admin_page_location') === 'detail_transaksi'): ?>
                <?php $i = 1 ?>
                <table border="1px" cellpadding="10px" cellspacing="0">
                    <thead>
                        <th>Nomor</th>
                        <th>Id Detail Transaksi</th>
                        <th>Id Transaksi</th>
                        <th>Id Produk</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php if (!empty($detail_transaksi)) : ?>
                            <?php foreach ($detail_transaksi as $d) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $d['id_detail_transaksi']; ?></td>
                                    <td><?= $d['id_transaksi']; ?></td>
                                    <td><?= $d['id_produk']; ?></td>
                                    <td><?= $d['jumlah']; ?></td>
                                    <td><?= $d['subtotal']; ?></td>
                                    <td>
                                        <button class="btn-edit" name="edit">Edit</button>
                                        <button class="btn-hapus" name="hapus" data-id="<?= $d['id_detail_transaksi']; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php $i += 1 ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Tentang Kami</h3>
                    <p>CV. Mulia Langgeng Mufakat</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Kategori Produk</h3>
                    <ul class="footer-links">
                        <li><a href="#">Laptop & Notebook</a></li>
                        <li><a href="#">Printer</a></li>
                        <li><a href="#">AC</a></li>
                        <li><a href="#">Aksesoris</a></li>
                        <li><a href="#">Lainnya</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Informasi</h3>
                    <ul class="footer-links">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Cara Pembelian</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kontak Kami</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Poskeskel, Desa Mulyojati Kec. Metro Barat Kota Metro</p>
                    <p><i class="fas fa-phone"></i> +62 823-7459-1985</p>
                    <p><i class="fas fa-envelope"></i> mulamufakat@gmail.com</p>
                </div>
            </div>
            <div class="copyright">
                &copy; 2025 CV. Mulia Langgeng Mufakat — All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- wajib ada jQuery untuk AJAX-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <script>
        const admin_page_location = "<?= $this->session->userdata('admin_page_location') ?>"; // kirim variabel admin_page_location ke js yang sudah dinisialisasi value session key 'admin_page_location'.
        const dataDelete = "<?= base_url('index.php/admin_control/dataDelete');?>";
        console.log("Lokasi sekarang:", admin_page_location);
    </script>
    <script src="<?= base_url('assets/js/admin.js?v=' . time()); ?>"></script> <!--link file js-->

</body>

</html>