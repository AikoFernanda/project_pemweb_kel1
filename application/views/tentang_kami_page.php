<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tentang Kami - CV. MULIA LANGGENG MUFAKAT</title>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!--Link CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_tentang_kami_page.css?v=' . time()); ?>">
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
                <a href="#">Layanan</a>
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

    <section class="container" style="margin-top: 60px;">
        <h1 style="font-size: 50px; margin-bottom: 20px; text-align: center;">Tentang Kami</h1>
        <p style="font-size: 18px; color: #555; line-height: 1.8;">

            CV. Multi Langgeng Mufakat adalah perusahaan yang berdiri secara resmi pada tanggal 14 September 2022 dan berkedudukan di Kota Metro, Provinsi Lampung, tepatnya di Jalan Poskeskel, Kelurahan Mulyojati, Kecamatan Metro Barat. Kami merupakan perusahaan berbadan hukum perseroan komanditer (CV) yang didirikan oleh lima orang pendiri dengan semangat kolaborasi dan profesionalisme.

            Perusahaan ini bergerak di berbagai bidang usaha yang luas dan strategis, antara lain:

            Konstruksi (termasuk pembangunan gedung, infrastruktur jalan, jembatan, instalasi listrik dan telekomunikasi)

            Perdagangan besar dan eceran, serta reparasi kendaraan bermotor

            Informasi dan komunikasi, termasuk layanan telekomunikasi dan jasa multimedia

            Penyewaan dan jasa penunjang usaha, termasuk keamanan, administrasi kantor, dan ketenagakerjaan

            Pendidikan, khususnya pelatihan teknologi informasi

            Industri pengolahan, seperti produksi furnitur dari berbagai bahan

            CV. Multi Langgeng Mufakat dipimpin oleh:

            Direktur: Indra Kiswanto

            Wakil Direktur: Syah Bhagavad Gitajatin

            Komisaris I: Agung Yulianto

            Komisaris II: Alif Thyo Irshannandya

            Komisaris III: Fajar Andhika Yugowiyanto

            Kami menjunjung tinggi nilai transparansi, kerjasama yang solid, serta pelayanan profesional demi mendukung pembangunan dan penyediaan solusi di berbagai sektor.
        </p>
        <h1 style="font-size: 50px; margin-bottom: 20px; margin-top:70px; text-align: center;">Visi & Misi</h1>
        <section class="values-section">
            <div class="value-box">
                <img src="imgx.jpg" alt="Focus on Consumer">
                <h3>Focus on Consumer</h3>
                <p>Pengguna kami adalah prioritas utama dan kami selalu berinovasi untuk memenuhi kebutuhan mereka</p>
            </div>
            <div class="value-box">
                <img src="imgx.jpg" alt="Growth Mindset">
                <h3>Growth Mindset</h3>
                <p>Berani menerima tantangan dan melihat masalah sebagai peluang untuk memulai hal-hal baru</p>
            </div>
            <div class="value-box">
                <img src="imgx.jpg" alt="Make it Happen">
                <h3>Make it Happen, Make it Better</h3>
                <p>Membangun dan meningkatkan kinerja secara terus menerus.</p>
            </div>
        </section>
        <section>


            <div class="map-wrapper">
                <h2 style="margin-top: 40px; font-size: 50px;">Alamat Kami</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d63582.35596447843!2d105.26255183014196!3d-5.120256942499336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s%20Jl.%20Poskeskel%2C%20Desa%20Mulyojati%20Kec.%20Metro%20Barat%20Kota%20Metro!5e0!3m2!1sen!2sid!4v1746100400276!5m2!1sen!2sid"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
        </div>
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
    <script src="<?= base_url('assets/js/login.js?v=' . time()); ?>"></script>
</body>

</html>