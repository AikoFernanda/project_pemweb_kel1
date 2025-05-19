<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah - CV. MULIA LANGGENG MUFAKAT</title>
    <!--link css-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_add_admin_page.css?v=' . time()); ?>">
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
        <form id="form-add" action="<?= base_url('index.php/Admin_control/dataAdd'); ?>" method="POST">
            <?php if ($this->session->userdata('admin_page_location') === 'akun') : ?>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" required>
                <label for="username_akun">Username</label>
                <input id="username_akun" type="text" name="username_akun" required>
                <label for="password_akun">Password</label>
                <input id="password_akun" type="text" name="password_akun" required>
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="status_akun">Status Akun</label>
                <select id="status_akun" name="status_akun" required>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
                <button type="submit" class="btn-submit">Simpan</button>
            <?php elseif ($this->session->userdata('admin_page_location') === 'user') : ?>
                <label for="id_akun">Id Akun</label>
                <input id="id_akun" type="number" name="id_akun" required>
                <label for="nama_lengkap">Nama Lengkap</label>
                <input id="nama_lengkap" name="nama_lengkap" type="text" required>
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <label for="alamat">Alamat</label>
                <input id="alamat" name="alamat" type="text" required>
                <label for="foto">Foto: (.jpeg/.jpg/.png)</label>
                <input id="foto" name="foto" type="text" required>
                <label for="no_hp">No. HP</label>
                <input id="no_hp" name="no_hp" type="tel" pattern="\d{9,12}" maxlength="12" title="Masukkan nomor telepon dengan benar" required>
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" name="tanggal_lahir" type="date" required>
                <button type="submit" class="btn-submit">Simpan</button>
            <?php elseif ($this->session->userdata('admin_page_location') === 'keranjang') : ?>
                <label for="id_user">Id User</label>
                <input id="id_user" name="id_user" type="text" required>
                <label for="id_produk">Id Produk</label>
                <input id="id_produk" name="id_produk" type="number" required>
                <label for="jumlah">Jumlah</label>
                <input id="jumlah" name="jumlah" type="number" required>
                <label for="subtotal">Subtotal</label>
                <input id="subtotal" name="subtotal" type="number" required>
                <button type="submit" class="btn-submit">Simpan</button>
            <?php elseif ($this->session->userdata('admin_page_location') === 'transaksi') : ?>
                <label for="kode_pemesanan">Kode Pemesanan</label>
                <input id="kode_pemesanan" name="kode_pemesanan" type="text" required>
                <label for="id_user">id_user</label>
                <input id="id_user" name="id_user" type="number" required>
                <label for="total_transaksi">Total Transaksi</label>
                <input id="total_transaksi" name="total_transaksi" type="number" required>
                <label for="status_transaksi">Status Transaksi</label>
                <select id="status_transaksi" name="status_transaksi" required>
                    <option value="Lunas">Lunas</option>
                    <option value="Pending">Pending</option>
                    <option value="Gagal">Gagal</option>
                </select>
                <button type="submit" class="btn-submit">Simpan</button>
            <?php elseif ($this->session->userdata('admin_page_location') === 'detail_transaksi') : ?>
                <label for="id_transaksi">Id Transaksi</label>
                <input id="id_transaksi" name="id_transaksi" type="number" required>
                <label for="id_produk">Id Produk</label>
                <input id="id_produk" name="id_produk" type="number" required>
                <label for="jumlah">Jumlah</label>
                <input id="jumlah" name="jumlah" type="number" required>
                <label for="subtotal">Subtotal</label>
                <input id="subtotal" name="subtotal" type="number" required>
                <button type="submit" class="btn-submit">Simpan</button>
            <?php elseif ($this->session->userdata('admin_page_location') === 'jadwal_pengiriman') : ?>
                <label for="id_transaksi">Id Transaksi</label>
                <input id="id_transaksi" type="number" name="id_transaksi" required>
                <label for="nama_pemesan">Nama Pemesan</label>
                <input id="nama_pemesan" type="text" name="nama_pemesan" required>
                <label for="alamat_tujuan">Alamat Tujuan</label>
                <input id="alamat_tujuan" type="text" name="alamat_tujuan" required>
                <label for="no_hp_pemesan">No. HP</label>
                <input id="no_hp_pemesan" type="tel" name="no_hp_pemesan" pattern="\d{9,12}" maxlength="12" title="Masukkan nomor telepon dengan benar" required>
                <label for="status_pengiriman">Status Pengiriman</label>
                <select id="status_pengiriman" name="status_pengiriman" required>
                    <option value="Belum Dikirim">Belum Dikirim</option>
                    <option value="Sudah Dikirim">Sudah Dikirim</option>
                </select>
                <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                <input id="tanggal_pengiriman" type="datetime-local" name="tanggal_pengiriman">
                <button type="submit" class="btn-submit">Simpan</button>
            <?php endif; ?>
        </form>
        <?php if ($this->session->userdata('admin_page_location') === 'produk') : ?>
            <form id="form-add-product" class="profile-form" action="<?= base_url('index.php/Admin_control/dataAdd'); ?>" method="POST" enctype="multipart/form-data">
                <label for="nama_produk">Nama Produk</label>
                <input id="nama_produk" type="text" name="nama_produk" required>
                <label for="kategori">Kategori</label>
                <input id="kategori" type="text" name="kategori" required>
                <label for="stok">Stok</label>
                <input id="stok" type="number" name="stok" required>
                <label for="harga">Harga</label>
                <input id="harga" type="number" name="harga" required>
                <label for="presentase_diskon">Presentase Diskon</label>
                <input id="presentase_diskon" type="number" name="presentase_diskon" required>
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" type="text" name="deskripsi" required>
                <label>Upload Foto: <small>max.2MB (jpeg/jpg/png)</small></label>
                <input type="file" name="foto" id="foto" accept=".jpg,.jpeg,.png" required>
                <button type="submit" class="btn-submit">Simpan</button>
            </form>
        <?php endif; ?>
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
        const last_admin_page = "<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=' . htmlspecialchars($this->session->userdata('admin_page_location'))); ?>";
        console.log("Lokasi sekarang:", admin_page_location);
    </script>
    <script src="<?= base_url('assets/js/add_admin.js?v=' . time()); ?>"></script> <!--link file js-->
</body>

</html>