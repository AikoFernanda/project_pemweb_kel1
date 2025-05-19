<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beranda - CV. MULIA LANGGENG MUFAKAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Link CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_homepage.css?v=' . time()); ?>"><!--opsi developer pakai . time() agar css di load tiap halaman reload-->
</head>

<body>
    <header>
        <div class="container main-header">
            <div class="logo-header">
                <img src="<?= base_url('assets/img/logo_company.jpeg'); ?>" alt="Logo">
                <h1>CV. MULIA LANGGENG MUFAKAT</h1>
            </div>
            <div class="navigasi-header">
                <a href="#">Home</a>
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

    <main>
    <!-- MODAL LOGIN -->
    <div id="login-modal" class="modal">
            <div class="login-content">
                <span class="close" onclick="toggleLoginModal()">&times;</span> <!--membuat elemen <span> dengan class 'close', <span> adalah elemen inline (biasanya untuk teks pendek). &timens ini adalah HTML entity(seperti &copy, dsb.) untuk simbol silang (×). Jadi di layar akan muncul tanda silang, sering digunakan sebagai tombol “close”.-->
                <h2>Login</h2>
                <form action="<?= base_url('index.php/Signup_login_control/login'); ?>" method="POST">
                    <label for="username">Username:</label>
                    <input id="username" type="text" name="username_akun" required>
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password_akun" required>
                    <button type="submit" name="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="hero-wrapper">
            <?php if ($this->session->flashdata('login_error')) : ?> <!--Mengecek apakah key 'login_error' true atau ada dari pada key flashdata-->
                <!-- <script>
                window.onload = function() { // // window.onload = dijalankan setelah seluruh halaman selesai dimuat.
                    toggleLoginModal(); // Buka modal login otomatis saat halaman dimuat, Modal otomatis muncul
                };
            </script> -->
                <div class="flash-error"><?= $this->session->flashdata('login_error'); ?></div>
            <?php elseif ($this->session->flashdata('admin_error')) : ?> <!--Dalam PHP else if dengan : (colon) seharusnya ditulis sebagai: elseif() bukan else if(). Blok if ini untuk mengecek apakah key 'admin_error' ada atau true pada key flashdata-->
                <div class="flash-error"><?= $this->session->flashdata('admin_error'); ?></div> <!--Menampilkan value key 'admin_error ke layar-->
            <?php elseif ($this->session->flashdata('login_success')) : ?>
                <div class="flash-success"><?= $this->session->flashdata('login_success'); ?></div>
            <?php endif; ?>
            <section id="hero-section">
                <div class="container hero-content">
                    <div class="hero-text">
                        <h1>Solusi Terbaik untuk Kebutuhan Elektronik Anda</h1>
                        <p>Kami menyediakan produk berkualitas dengan harga bersahabat dan pelayanan terpercaya.</p>
                        <button onclick="window.location.href='<?= base_url('index.php/Home/produk'); ?>'">Lihat Katalog</button>
                    </div>
                    <div class="hero-img">
                        <img src="<?= base_url('assets/img/branding/kerja1(2).jpeg'); ?>" alt="Gambar Hero">
                    </div>
                </div>
            </section>
        </div>
        <!-- BERITA TERKINI -->
        <section class="berita" id="berita">
            <h2>Berita Terbaru</h2>
            <div class="berita-grid">
                <div class="berita-item">
                    <img src="<?= base_url('assets/img/fotoBersama.jpeg'); ?>" alt="Berita 1" />
                    <h3>CV. MULAMU Berlibur</h3>
                    <p>Keluarga CV. MULAMU Liburan Bersama</p>
                    <a href="#">Baca Selengkapnya</a>
                </div>
                <div class="berita-item">
                    <img src="<?= base_url('assets/img/kerja4.jpeg'); ?>" alt="Berita 2" />
                    <h3>Antar dan Pasang Langsung</h3>
                    <p>Mengantar barang pesanan sampai lokasi dan merakit alat elektronik anda di rumah.</p>
                    <a href="#">Baca Selengkapnya</a>
                </div>
            </div>
        </section>

        <section id="kategori-unggulan">
            <div class="container">
                <div class="grid-produk-unggulan">
                    <h2>Kategori Unggulan</h2>
                    <div class="kategori-boxes">

                        <div class="kategori-box">
                            <i class="fa-solid fa-laptop"></i>
                            <p>Laptop & Notebook</p>
                        </div>
                        <div class="kategori-box">
                            <i class="fa-solid fa-print"></i>
                            <p>Printer</p>
                        </div>
                        <div class="kategori-box">
                            <i class="fa-solid fa-snowflake"></i>
                            <p>AC</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRODUK UNGGULAN -->
        <section class="produk-unggulan" id="produk">
            <h2>Produk Unggulan</h2>
            <div class="produk-grid">
                <?php foreach ($produk_unggulan as $produk) : ?>
                    <div class="produk-item">
                        <img src="<?= base_url('assets/img/produk/' . $produk['gambar']); ?>" alt="Produk" />
                        <h3><?= $produk['nama_produk']; ?></h3>
                        <p><?= $produk['deskripsi']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- TESTIMONI -->
        <section class="testimoni" id="testimoni">
            <h2>Apa Kata Mereka</h2>
            <div class="testimoni-grid">
                <div class="testimoni-item">
                    <img src="<?= base_url('assets/img/upload_foto_profil/user_3_1746364346.png');?>" alt="User 1" />
                    <p>"Pelayanannya cepat dan produk original. Sangat puas belanja di sini!"</p>
                    <h4>Rina A.</h4>
                </div>
                <div class="testimoni-item">
                    <img src="<?= base_url('assets/img/upload_foto_profil/user_4_1746366785.png');?>" alt="User 2" />
                    <p>"Pengiriman aman, laptop yang saya beli sangat berkualitas dan sesuai deskripsi."</p>
                    <h4>Bagus W.</h4>
                </div>
                <div class="testimoni-item">
                    <img src="<?= base_url('assets/img/default.png');?>" alt="User 3" />
                    <p>"Customer service sangat responsif. Akan belanja lagi!"</p>
                    <h4>Sarah M.</h4>
                </div>
            </div>
        </section>
        <!-- KEUNGGULAN -->
        <section id="keunggulan">
            <div class="container keunggulan-box">
                <h2>Mengapa Memilih Kami?</h2>
                <div class="grid-keunggulan">
                    <div class="card-keunggulan">
                        <i class="fa-solid fa-box-open"></i>
                        <h3>Produk Lengkap</h3>
                        <p>Kami menyediakan berbagai produk elektronik dan teknologi terbaru.</p>
                    </div>
                    <div class="card-keunggulan">
                        <i class="fa-solid fa-headset"></i>
                        <h3>Layanan Pelanggan</h3>
                        <p>Dukungan ramah & cepat untuk semua kebutuhan dan pertanyaan Anda.</p>
                    </div>
                    <div class="card-keunggulan">
                        <i class="fa-solid fa-shield-alt"></i>
                        <h3>Jaminan Aman</h3>
                        <p>Transaksi aman & terpercaya. Kami prioritaskan kepuasan Anda.</p>
                    </div>
                    <div class="card-keunggulan">
                        <i class="fa-solid fa-truck-fast"></i>
                        <h3>Pengiriman Cepat</h3>
                        <p>Pesanan Anda dikirim dengan cepat dan tepat waktu.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- PROFIL COMPANY -->
        <section id="profil" class="profil">
            <h2>Sekilas Tentang Kami</h2>
            <p>
                CV. Mulia Langgeng Mufakat adalah perusahaan yang bergerak di bidang pengadaan barang dan jasa, khususnya alat elektronik dan teknologi.
                Dengan komitmen terhadap kualitas dan kepercayaan, kami hadir sebagai mitra andal untuk memenuhi kebutuhan instansi dan industri di seluruh Indonesia.
            </p>
            <a href="<?= base_url('index.php/Home/tentangKami');?>" class="more-link">Baca Selengkapnya</a>
        </section>
        </section>
    </main>

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
                            <li><a href="<?= base_url('index.php/Home/tentangKami')?>">Tentang Kami</a></li>
                            <li><a href="<?= base_url('index.php/Home/caraPembelian')?>">Cara Pembelian</a></li>
                            <li><a href="<?= base_url('index.php/Home/kebijakanPrivasi')?>">Kebijakan Privasi</a></li>
                            <li><a href="<?= base_url('index.php/Home/syaratKetentuan')?>">Syarat & Ketentuan</a></li>
                            <li><a href="<?= base_url('index.php/Home/faq')?>">FAQ</a></li>
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

    <script src="<?= base_url('assets/js/login.js?v=' . time()); ?>"></script> <!--.time() berfungsi agar file JS-nya otomatis ke-refresh saat develop (seperti css),  untuk cache-busting CSS & JS biasanya digunakan umum dalam praktik di kalangan developer agar perubahan langsung kelihatan.
                                                                                         Dengan defer, browser akan load script setelah halaman selesai dimuat. -->
</body>

</html>