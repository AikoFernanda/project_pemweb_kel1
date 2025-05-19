<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kebijakan Privasi</title>
       <!-- Google Font -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

<!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <link rel="stylesheet" href="<?= base_url('assets/css/style_kebijakan_privasi.css?v=' . time()); ?>">

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
                <a href="layanan">Layanan</a>
                <a href="#footer">Tentang Kami</a>
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

    <section class="container" style="margin-top: 50px;">
        <img src="<?= base_url('assets/img/kebijakan_privasi.png'); ?>" alt="kebijakan privasi" class="faq-image"/>
        <h1 style="font-size: 47px; margin-bottom: 35px; text-align: center;">Kebijakan Privasi</h1>
        <p>
        
        <p >
            <b>
CV Multi Langgeng Mufakat</b>
("kami", "perusahaan", "kami dan afiliasi") berkomitmen untuk melindungi dan menghormati privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menyimpan, menggunakan, dan melindungi informasi pribadi yang Anda berikan kepada kami saat menggunakan layanan, situs web, aplikasi, atau berinteraksi dengan kami secara langsung.</p>

<h3 style="margin-top: 40px; ">1. Informasi yang Kami Kumpulkan sebagai berikut:</h3>
<p>
Data Identitas: nama, tanggal lahir, alamat

Data Kontak: email, nomor telepon

Data Transaksi: catatan pembelian, layanan yang digunakan

Data Teknis: alamat IP, cookies, jenis perangkat dan browser</p>

<h3  style="margin-top: 30px;">2. Bagaimana Kami Menggunakan Informasi Anda
Informasi Anda digunakan untuk:</h3>
<p >

Menyediakan dan mengelola layanan yang Anda minta

Menginformasikan promosi, penawaran, atau pembaruan produk

Menyesuaikan pengalaman pengguna di situs/aplikasi kami

Menganalisis perilaku pengguna untuk peningkatan layanan

Catatan: Kami tidak akan menjual, menyewakan, atau mendistribusikan data pribadi Anda kepada pihak ketiga kecuali diwajibkan oleh hukum atau Anda memberikan persetujuan tertulis.

<h3  style="margin-top: 30px;">3. Perlindungan Data
Kami menerapkan langkah-langkah keamanan teknis dan administratif untuk melindungi data Anda, termasuk:</h3>
<p>
Enkripsi komunikasi

Penggunaan firewall dan kontrol akses

Pembatasan akses hanya kepada staf yang berwenang


<h3  style="margin-top: 30px;">4. Hak Anda sebagai Pengguna
Anda berhak untuk:</h3>
<p>
Mengakses data Anda

Memperbaiki kesalahan data

Menghapus data pribadi dari sistem kami (hak untuk dilupakan)

Menarik kembali persetujuan penggunaan data




        </p>
     
   
</p>
</p>
        </p>

    </section>

    

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
