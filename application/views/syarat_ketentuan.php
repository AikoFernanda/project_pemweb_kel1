<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Syarat & Ketentuan</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_syarat_ketentuan.css?v=' . time()); ?>">

    
</head>
<body>

<header>
        <div class="container main-header">
            <div class="logo-header">
                <img src="<?= base_url('assets/img/logo_company.jpeg'); ?>" alt="Logo">
                <h1>CV. MULIA LANGGENG MUFAKAT</h1>
            </div>
            <div class="navigasi-header">
                <a href="<?= base_url('index.php/Home/index') ?>">Home</a>
                <a href="<?= base_url('index.php/Home/produk'); ?>">Produk</a>
                <a href="<?= base_url('index.php/Home/layanan'); ?>">Layanan</a>
                <a href="<?= base_url('index.php/Home/tentangKami'); ?>">Tentang Kami</a>
            </div>
            <?php if ($this->session->userdata('logged_in')) : ?>
                <div class="login-register">
                    <a class="ikon-keranjang" href="<?= base_url('index.php/Katalog_produk/keranjang'); ?>">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <a class="ikon-profil" href="<?= base_url('index.php/Home/profil'); ?>">
                        <i class="fas fa-user"></i>
                    </a> <!-- Ikon user -->
                </div>
            <?php else : ?>
                <div id="btn-login-register" class="login-register">
                    <button type="button" class="btn-login" onclick="toggleLoginModal()">Login</button> <!--onclick, ini adalah event handler. Saat pengguna mengklik elemen ini, maka akan memanggil fungsi JavaScript bernama closeLoginModal() yang berfungsi untuk membuka modal login yang berdisplay none(disembunyikan) ke block-->
                    <button type="button" class="btn-signup" onclick="window.location.href='<?= base_url('index.php/Signup_login_control/signup'); ?>'">Sign Up</button>
                </div>
            <?php endif; ?>

        </div>
    </header>

    
    
<style>
    .section {
  margin-bottom: 4rem;
  text-align: center;
}

.section h2 {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 1.5rem;
}

.terms,
.fa-ul {
  list-style: none;
  padding: 0;
  margin: 0 auto;
  text-align: left;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  max-width: 800px; /* Batas tengah yang rapi */
}

.terms li,
.fa-ul li {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  margin-bottom: 12px;
  font-size: 1.1rem;
}

.terms li::before,
.fa-ul li::before {
  content: "✔";
  color: #2ecc71;
  font-weight: bold;
  flex-shrink: 0;
}

</style>

<img src="<?= base_url('assets/img/syarat_ketentuan.png'); ?>" alt="syarat & ketentuan" class="faq-image"/>
<h1 style="text-align:center; margin-bottom: 50px; font-size: 47px;">Syarat dan Ketentuan</h1>
<div class="section"> 
    <h2>1. Pilihan Produk dan Harga</h2>
    <ul class="fa-ul">
        <li><span class="fa-li"></span>Semua produk yang tersedia di toko akan ditampilkan secara jelas dengan detail spesifikasi, harga, dan gambar yang akurat.</li>
        <li><span class="fa-li"></span>Harga produk dapat berubah sewaktu-waktu tanpa pemberitahuan sebelumnya.</li>
        <li><span class="fa-li"></span>Harga yang tertera belum termasuk biaya pengiriman dan pajak (jika ada).</li>
    </ul>
</div>

<div class="section">
    <h2>2. Pemesanan dan Pembayaran</h2>
    <ul class="fa-ul">
        <li><span class="fa-li"></span>Pemesanan dapat dilakukan melalui website/aplikasi toko atau melalui saluran komunikasi lain yang disediakan.</li>
        <li><span class="fa-li"></span>Pembayaran dapat dilakukan melalui berbagai metode yang disediakan, seperti transfer bank, kartu kredit, atau pembayaran tunai (jika ada).</li>
        <li><span class="fa-li"></span>Pembayaran harus diselesaikan dalam waktu yang ditentukan (biasanya 1-2 hari) setelah pemesanan dilakukan.</li>
    </ul>
</div>

<div class="section">
    <h2>3. Pengiriman</h2>
    <ul class="fa-ul">
        <li><span class="fa-li"></span>Pengiriman produk akan dilakukan melalui jasa pengiriman yang ditunjuk oleh toko.</li>
        <li><span class="fa-li"></span>Biaya pengiriman akan dibebankan kepada pembeli.</li>
        <li><span class="fa-li"></span>Toko tidak bertanggung jawab atas kerusakan atau kehilangan barang selama pengiriman, kecuali jika ada kesalahan dari pihak kurir.</li>
        <li><span class="fa-li"></span>Waktu pengiriman bervariasi tergantung lokasi pembeli dan jasa pengiriman yang digunakan.</li>
    </ul>
</div>

<div class="section">
    <h2>4. Retur dan Refund</h2>
    <ul class="fa-ul">
        <li><span class="fa-li"></span>Produk yang telah dibeli dapat dikembalikan atau di-refund (dengan beberapa pengecualian) jika ada cacat produksi atau kesalahan pengiriman.</li>
        <li><span class="fa-li"></span>Permintaan retur atau refund harus diajukan dalam jangka waktu tertentu (biasanya 3-7 hari) setelah produk diterima.</li>
        <li><span class="fa-li"></span>Pembeli harus melampirkan bukti pembelian dan foto/video yang menunjukkan kerusakan atau kesalahan produk.</li>
        <li><span class="fa-li"></span>Biaya pengembalian barang ditanggung oleh pembeli, sedangkan biaya pengiriman barang pengganti (jika ada) ditanggung oleh toko.</li>
    </ul>
</div>

<div class="section">
    <h2>5. Garansi</h2>
    <ul class="fa-ul">
        <li><span class="fa-li"></span>Produk akan mendapatkan garansi dari toko atau garansi resmi, yang biasanya mencakup kerusakan atau cacat produksi.</li>
        <li><span class="fa-li"></span>Garansi berlaku selama masa tertentu yang tertera pada produk atau garansi.</li>
        <li><span class="fa-li"></span>Pembeli harus melampirkan bukti pembelian dan produk yang akan digaransi.</li>
    </ul>
</div>

<div class="section">
    <h2>6. Hak dan Kewajiban</h2>
    <ul class="fa-ul">
        <li><span class="fa-li"></span>Pembeli memiliki hak untuk menerima produk yang sesuai dengan pesanan dan dalam kondisi baik.</li>
        <li><span class="fa-li"></span>Pembeli memiliki kewajiban untuk membayar pesanan sesuai dengan ketentuan.</li>
        <li><span class="fa-li"></span>Toko memiliki hak untuk menolak pesanan jika ada alasan yang wajar.</li>
        <li><span class="fa-li"></span>Toko memiliki kewajiban untuk memberikan layanan yang memuaskan dan memenuhi standar.</li>
    </ul>
</div>

<div class="section">
    <h2>7. Ketentuan Lain</h2>
    <ul class="fa-ul">
        <li><span class="fa-li"></span>Syarat dan ketentuan ini berlaku sejak saat pengguna mengakses atau menggunakan toko.</li>
        <li><span class="fa-li"></span>Toko berhak untuk mengubah syarat dan ketentuan ini sewaktu-waktu tanpa pemberitahuan sebelumnya.</li>
        <li><span class="fa-li"></span>Syarat dan ketentuan ini tunduk pada hukum yang berlaku di wilayah Indonesia.</li>
        <li><span class="fa-li"></span>Setiap sengketa yang timbul akan diselesaikan melalui negosiasi atau peradilan yang sesuai.</li>
    </ul>
</div>

<footer>
        <section id="footer">
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
                            <li><a href="tentangKami">Tentang Kami</a></li>
                            <li><a href="caraPembelian">Cara Pembelian</a></li>
                            <li><a href="kebijakanPrivasi">Kebijakan Privasi</a></li>
                            <li><a href="syaratKetentuan">Syarat & Ketentuan</a></li>
                            <li><a href="faq">FAQ</a></li>
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

</body>
</html>
