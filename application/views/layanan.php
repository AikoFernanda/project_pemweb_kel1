<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Syarat & Ketentuan</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_layanan.css?v=' . time()); ?>">

    
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
                <a href="tentangKami">Tentang Kami</a>
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


<div class="container">
    <img src="<?= base_url('assets/img/layanan.png'); ?>" alt="layanan" class="faq-image"/>
    <h1 style="margin-bottom:40px; font-size:45px;">Layanan Kami</h1>

    <div class="layanan">
      <h2>1. Konsultasi Produk</h2>
      <p>Kami menyediakan layanan konsultasi produk secara gratis untuk membantu pelanggan memilih produk yang sesuai dengan kebutuhan, fungsi, dan anggaran mereka. Tim kami siap memberikan panduan mulai dari spesifikasi teknis, keunggulan masing-masing produk, 
        hingga saran alternatif terbaik. Layanan ini sangat cocok untuk pelanggan individu, pelaku UMKM, maupun perusahaan besar yang memerlukan solusi teknologi.</p>
    </div>

    <div class="layanan">
      <h2>2. Pemesanan dan Pengiriman</h2>
      <p>Pelanggan dapat memesan produk kami secara online melalui website resmi atau langsung menghubungi tim kami melalui WhatsApp, email, atau media sosial. Kami menyediakan layanan pengiriman cepat dan aman ke seluruh wilayah Indonesia melalui mitra ekspedisi terpercaya.
         Setiap pesanan akan diproses dengan sistem pelacakan untuk memastikan transparansi dan ketepatan waktu pengiriman.</p>
    </div>

    <div class="layanan">
      <h2>3. Custom Order</h2>
      <p>CV. Mulia Langgeng Mufakat menerima pesanan produk custom untuk berbagai kebutuhan. Dalam kategori PC, pelanggan dapat memesan PC rakitan sesuai keinginan seperti pilihan SSD, RAM, VGA, casing, dan lainnya. Tidak hanya itu, kami juga menerima kustomisasi aksesori seperti keyboard,
         mouse, atau monitor sesuai preferensi ergonomi dan estetika pelanggan. Layanan ini memungkinkan pelanggan mendapatkan perangkat yang benar-benar sesuai gaya dan kebutuhan mereka.</p>
    </div>

    <div class="layanan">
      <h2>4. Layanan Purna Jual</h2>
      <p>Kami memberikan dukungan purna jual yang komprehensif untuk memastikan pelanggan merasa aman dan puas setelah melakukan pembelian. Layanan ini mencakup bantuan teknis yang tersedia melalui telepon maupun kunjungan langsung di wilayah tertentu.
         Selain itu, kami juga menyediakan garansi produk sesuai dengan ketentuan yang berlaku serta layanan perbaikan jika terdapat kerusakan dalam masa penggunaan. Bagi pelanggan yang membutuhkan pemasangan dan konfigurasi produk di tempat, kami juga melayani dengan penjadwalan khusus di daerah yang terjangkau. Semua ini kami hadirkan demi menciptakan pengalaman berbelanja yang menyeluruh dan bernilai jangka panjang.</p>
    </div>

    <div class="layanan">
      <h2>5. Kerja Sama Proyek & Grosir</h2>
      <p>Kami terbuka untuk kerja sama dalam skala besar, baik untuk proyek pemerintah, swasta, lembaga pendidikan, maupun pelaku bisnis yang membutuhkan pembelian dalam jumlah besar. Dalam layanan ini, kami menawarkan kemudahan berupa penawaran harga khusus untuk pengadaan massal, penjadwalan pengiriman yang fleksibel, serta penyusunan dokumen penunjang seperti penawaran harga, invoice, dan purchase order sesuai permintaan mitra.
         Kami juga menyediakan konsultasi teknis serta pendampingan selama masa proyek, dengan harapan dapat menjadi mitra profesional yang andal, efisien, dan berkomitmen dalam jangka panjang.</p>
    </div>

    <hr>

    
  </div>
<h3 style="text-align: center; margin-bottom: 20px;">Selain menjual barang barang elektronik pada website ini,kami juga memiliki jasa ataupun barang lainnya,seperti pada bawah ini.</h3>
   <div class="dropdown">

    <details>
      <summary>Konstruksi</summary>
      <ul>
        <li>Konstruksi Gedung Hunian</li>
        <li>Konstruksi Gedung Perkantoran</li>
        <li>Konstruksi Gedung Industri</li>
        <li>Konstruksi Gedung Belanja</li>
        <li>Konstruksi Gedung Kesehatan</li>
        <li>Konstruksi Gedung Pendidikan</li>
        <li>Konstruksi Gedung Penginapan</li>
        <li>Konstruksi Tempat Hiburan & Olahraga</li>
        <li>Konstruksi Sipil (Jalan, Jembatan, Flyover, dsb)</li>
        <li>Instalasi Listrik, Telekomunikasi, Elektronika</li>
      </ul>
    </details>


    <details>
      <summary>Perdagangan Eceran & Grosir</summary>
      <ul>
        <li>Makanan, Minuman, Tembakau Tradisional</li>
        <li>Hasil Peternakan, Perikanan, Pertanian</li>
        <li>Komputer, Software, Alat Telekomunikasi</li>
        <li>Furnitur, Audio-Video, Alat Rumah Tangga</li>
        <li>Alat Tulis, Hasil Penerbitan, Alat Optik</li>
        <li>Alat Pertanian, Pupuk, Bahan Kimia</li>
      </ul>
    </details>

    <details>
      <summary>Informasi & Komunikasi</summary>
      <ul>
        <li>Telekomunikasi Kabel & Nirkabel</li>
        <li>Telekomunikasi Satelit</li>
        <li>Internet Publik (ITKP), IPTV, NAP</li>
        <li>Jasa Multimedia & Telekomunikasi Lainnya</li>
      </ul>
    </details>

    <details>
      <summary>Jasa Sewa & Penunjang Usaha</summary>
      <ul>
        <li>Keamanan & Penyelidikan</li>
        <li>Administrasi & Agen Perjalanan</li>
      </ul>
    </details>

    <details>
      <summary>Pendidikan</summary>
      <ul>
        <li>Kursus Komputer & Teknologi Informasi</li>
      </ul>
    </details>

    <details>
      <summary>Aktivitas Jasa Lainnya</summary>
      <ul>
        <li>Reparasi Komputer</li>
        <li>Reparasi Peralatan Rumah Tangga</li>
      </ul>
    </details>

    

  </div>
  <hr>
  <p style="text-align:center;">Hubungi kami untuk informasi lebih lanjut atau konsultasi produk.</p>

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
