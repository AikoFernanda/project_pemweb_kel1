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
    <title>Edit - CV. MULIA LANGGENG MUFAKAT</title>
    <!--link css-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_edit_admin_page.css?v=' . time()); ?>">
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
    <main>
        <a href="<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=' . htmlspecialchars($this->session->admin_page_location)) ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali<!--Untuk ikon panah ke kiri-->
        </a>
        <form id="form-update" method="POST" action="<?= base_url('index.php/admin_control/dataUpdate'); ?>">
            <?php if ($this->session->userdata('admin_page_location') === 'akun') : ?>
                <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
                <!-- <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?= $akun['email']; ?>" required>
                <label for="username">Username Akun</label>
                <input id="username" name="username_akun" type="text" value="<?= $akun['username_akun']; ?>" required>
                <label for="password">Password Akun</label>
                <input id="password" name="password_akun" type="password" value="<?= $akun['password_akun']; ?>" required> -->
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option value="user" <?= ($akun['role'] == 'user') ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= ($akun['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                </select>
                <label for="status_akun">Status Akun</label>
                <select id="status_akun" name="status_akun" required>
                    <option value="1" <?= ($akun['status_akun'] == 1) ? 'selected' : '' ?>>1</option>
                    <option value="0" <?= ($akun['status_akun'] == 0) ? 'selected' : '' ?>>0</option>
                </select>
            <?php elseif ($this->session->userdata('admin_page_location') === 'produk') : ?>
                <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                <label for="nama_produk">Nama Produk</label>
                <input id="nama_produk" name="nama_produk" type="text" value="<?= $produk['nama_produk']; ?>" required>
                <label for="kategori">Kategori</label>
                <input id="kategori" name="kategori" type="text" value="<?= $produk['kategori']; ?>" required>
                <label for="stok">Stok</label>
                <input id="stok" name="stok" type="number" value="<?= $produk['stok']; ?>" required>
                <label for="harga">Harga</label>
                <input id="harga" name="harga" type="number" value="<?= $produk['harga']; ?>" required>
                <label for="persentase_diskon">Persentase Diskon</label>
                <input id="persentase_diskon" name="persentase_diskon" type="number" value="<?= $produk['persentase_diskon']; ?>" required>
                <label for="gambar">Gambar</label>
                <input id="gambar" name="gambar" type="text" value="<?= $produk['gambar']; ?>" required>
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" name="deskripsi" type="text" value="<?= $produk['deskripsi']; ?>" required>
            <?php elseif ($this->session->userdata('admin_page_location') === 'user') : ?>
                <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="L" <?= ($user['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= ($user['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <label for="alamat">Alamat</label>
                <input id="alamat" name="alamat" type="text" value="<?= $user['alamat']; ?>" required>
                <label for="foto">Foto: (.jpeg/.jpg/.png)</label>
                <input id="foto" name="foto" type="text" value="<?= $user['foto']; ?>">
                <label for="no_hp">No. HP</label>
                <input id="no_hp" name="no_hp" type="tel" value="<?= $user['no_hp']; ?>" pattern="\d{9,12}" maxlength="12" title="Masukkan nomor telepon dengan benar" required>
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" name="tanggal_lahir" type="date" value="<?= $user['tanggal_lahir']; ?>" max="<?= date('Y-m-d'); ?>" required>
            <?php elseif ($this->session->userdata('admin_page_location') === 'keranjang') : ?>
                <input type="hidden" name="id_keranjang" value="<?= $keranjang['id_keranjang']; ?>">
                <label for="id_user">Id User</label>
                <input id="id_user" name="id_user" type="text" value="<?= $keranjang['id_user']; ?>" required>
                <label for="id_produk">Id Produk</label>
                <input id="id_produk" name="id_produk" type="number" value="<?= $keranjang['id_produk']; ?>" required>
                <label for="jumlah">Jumlah</label>
                <input id="jumlah" name="jumlah" type="number" value="<?= $keranjang['jumlah']; ?>" required>
                <label for="subtotal">Subtotal</label>
                <input id="subtotal" name="subtotal" type="number" value="<?= $keranjang['subtotal']; ?>" required>
            <?php elseif ($this->session->userdata('admin_page_location') === 'transaksi') : ?>
                <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                <!-- <label for="kode_pemesanan">Kode Pemesanan</label>
                <input id="kode_pemesanan" name="kode_pemesanan" type="text" value="<?= $transaksi['kode_pemesanan']; ?>" required>
                <label for="id_user">id_user</label>
                <input id="id_user" name="id_user" type="number" value="<?= $transaksi['id_user']; ?>" required>
                <label for="total_transaksi">Total Transaksi</label>
                <input id="total_transaksi" name="total_transaksi" type="number" value="<?= $transaksi['total_transaksi']; ?>" required> -->
                <label for="status_transaksi">Status Transaksi</label>
                <select id="status_transaksi" name="status_transaksi">
                    <option value="Lunas" <?= ($transaksi['status_transaksi'] === "Lunas") ? 'selected' : '' ?>>Lunas</option>
                    <option value="Pending" <?= ($transaksi['status_transaksi'] === "Pending") ? 'selected' : '' ?>>Pending</option>
                    <option value="Gagal" <?= ($transaksi['status_transaksi'] === "Gagal") ? 'selected' : '' ?>>Gagal</option>
                </select>
            <?php elseif ($this->session->userdata('admin_page_location') === 'detail_transaksi') : ?>
                <!-- <input type="hidden" name="id_detail_transaksi" value="<?= $detail_transaksi['id_detail_transaksi']; ?>">
                <label for="id_transaksi">Id Transaksi</label>
                <input id="id_transaksi" name="id_transaksi" type="number" value="<?= $detail_transaksi['id_transaksi']; ?>" required>
                <label for="id_produk">Id Produk</label>
                <input id="id_produk" name="id_produk" type="number" value="<?= $detail_transaksi['id_produk']; ?>" required>
                <label for="jumlah">Jumlah</label>
                <input id="jumlah" name="jumlah" type="number" value="<?= $detail_transaksi['jumlah']; ?>" required>
                <label for="subtotal">Subtotal</label>
                <input id="subtotal" name="subtotal" type="number" value="<?= $detail_transaksi['subtotal']; ?>" required> -->
            <?php elseif ($this->session->userdata('admin_page_location') === 'jadwal_pengiriman') : ?>
                <input type="hidden" name="id_jadwal" value="<?= $jadwal_pengiriman['id_jadwal'] ?>">
                <!-- <label for="id_transaksi">Id Transaksi</label>
                <input id="id_transaksi" type="number" name="id_transaksi" value="<?= $jadwal_pengiriman['id_transaksi']; ?>" required> -->
                <label for="nama_pemesan">Nama Pemesan</label>
                <input id="nama_pemesan" type="text" name="nama_pemesan" value="<?= $jadwal_pengiriman['nama_pemesan']; ?>" required>
                <label for="alamat_tujuan">Alamat Tujuan</label>
                <input id="alamat_tujuan" type="text" name="alamat_tujuan" value="<?= $jadwal_pengiriman['alamat_tujuan']; ?>" required>
                <label for="no_hp_pemesan">No. HP</label>
                <input id="no_hp_pemesan" type="tel" name="no_hp_pemesan" value="<?= $jadwal_pengiriman['no_hp_pemesan']; ?>" pattern="\d{9,12}" maxlength="12" title="Masukkan nomor telepon dengan benar" required>
                <label for="status_pengiriman">Status Pengiriman</label>
                <select id="status_pengiriman" name="status_pengiriman">
                    <option value="Diproses" <?= ($jadwal_pengiriman['status_pengiriman'] === "Diproses") ? 'selected' : ''; ?>>Diproses</option>
                    <option value="Dikirim" <?= ($jadwal_pengiriman['status_pengiriman'] === "Dikirim") ? 'selected' : ''; ?>>Dikirim</option>
                    <option value="Diterima" <?= ($jadwal_pengiriman['status_pengiriman'] === "Diterima") ? 'selected' : ''; ?>>Diterima</option>
                </select>
                <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                <input id="tanggal_pengiriman" type="datetime-local" name="tanggal_pengiriman" value="<?= $jadwal_pengiriman['tanggal_pengiriman']; ?>">
            <?php endif; ?>
            <button type="submit" class="btn-submit">Ubah</button>
        </form>
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
        const admin_page = "<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=' . htmlspecialchars($this->session->userdata('admin_page_location'))); ?>";
        console.log("Lokasi sekarang:", admin_page_location);
    </script>
    <script src="<?= base_url('assets/js/edit_admin.js?v=' . time()); ?>"></script> <!--link file js-->
</body>

</html>