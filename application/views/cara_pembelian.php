<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cara Pembelian</title>
       <!-- Google Font -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

<!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_cara_pembelian.css?v=' . time()); ?>">
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
                <a href="<?= base_url('index.php/Home/tenangKami'); ?>">Tentang Kami</a>
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

    <section class="container" style="margin-top: 60px;">
        <img src="<?= base_url('assets/img/pembelian.png'); ?>" alt="cara pembelian" class="faq-image"/>
        <h1 style="font-size: 36px; margin-bottom: 40px; text-align: center;">Bagaimana cara pembeliann di Mulamu?</h1>
        <section>
        <style>
    e-height: 1.6;

    
    
    .step-number {
      font-weight: bold;
      color: #555;
    }
    .product-image {
      width: 250px;
      margin-top: 40px;
      margin-bottom: 70px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    h2 {
      color: #333;
    }
    .highlight {
      font-weight: bold;
    }
  </style>
  <!-- No 1-->
  <p><span class="step-number">1.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img1.jpg" alt="Tampilan produk Tokopedia" class="product-image">

   <!-- No 2-->
  <p><span class="step-number">2.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img2.jpg" alt="Tampilan produk Tokopedia" class="product-image">

   <!-- No 3-->
  <p><span class="step-number">3.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img3.jpg" alt="Tampilan produk Tokopedia" class="product-image">

 <!-- No 4-->
  <p><span class="step-number">4.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img4.jpg" alt="Tampilan produk Tokopedia" class="product-image">

   <!-- No 5-->
  <p><span class="step-number">5.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img5.jpg" alt="Tampilan produk Tokopedia" class="product-image">

    <!-- No 6-->
    <p><span class="step-number">6.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img5.jpg" alt="Tampilan produk Tokopedia" class="product-image">

    <!-- No 7-->
    <p><span class="step-number">7.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img5.jpg" alt="Tampilan produk Tokopedia" class="product-image">

    <!-- No 8-->
    <p><span class="step-number">8.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img5.jpg" alt="Tampilan produk Tokopedia" class="product-image">

    <!-- No 9-->
    <p><span class="step-number">9.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img5.jpg" alt="Tampilan produk Tokopedia" class="product-image">

    <!-- No 10-->
    <p><span class="step-number">10.</span> Tentukan produk yang ingin kamu beli, selanjutnya klik <span class="highlight">+ Keranjang</span> atau <span class="highlight">Beli Langsung</span>.</p>
  
  <img src="img5.jpg" alt="Tampilan produk Tokopedia" class="product-image">

        </section>

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
