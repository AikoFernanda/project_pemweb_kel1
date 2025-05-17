<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Produk - CV. MULIA LANGGENG MUFAKAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font
    memuat font "Poppins" dari Google Fonts dengan berbagai ketebalan (300, 400, 500, dan 600). Font ini akan tersedia untuk digunakan dalam styling CSS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

    <!-- Font Awesome for icons
     memuat perpustakaan Font Awesome, yang menyediakan banyak ikon yang dapat digunakan di situs web-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!--CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_produk.css?v=' . time()); ?>">
</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="container main-header">
            <div class="logo-header">
                <img src="<?= base_url('assets/img/logo_company.jpeg'); ?>" alt="Logo">
                <h1>CV. MULIA LANGGENG MUFAKAT</h1>
            </div>
            <div class="navigasi-header">
                <a href="<?= base_url('index.php/Home/index'); ?>">Home</a>
                <a href="#katalog-produk">Produk</a>
                <a href="#">Layanan</a>
                <a href="#footer">Tentang Kami</a>
            </div>
            <?php if ($this->session->userdata('logged_in')) : ?>
                <div class="profil">
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
                <?php endif; ?>

                </div>
    </header>

    <!--MAIN CONTENT-->
    <main>
        <!-- Image Slider -->
        <div class="container">
            <div class="slider-container">
                <div class="slider">
                    <div class="slide slide-1">
                        <div class="slide-content">
                            <h2>Produk Elektronik Terbaik</h2>
                            <p>Dapatkan produk elektronik berkualitas dengan harga terjangkau</p>
                            <a href="#katalog-produk" class="slider-btn">Disini</a>
                        </div>
                    </div>
                    <div class="slide slide-2">
                        <div class="slide-content">
                            <h2>Promo Spesial Bulan Ini</h2>
                            <p>Diskon hingga 10% untuk pembelian barang elektronik</p>
                            <a href="#promo-section" class="slider-btn">Disini</a>
                        </div>
                    </div>
                    <div class="slide slide-3">
                        <div class="slide-content">
                            <h2>Kebutuhan Anda Ada Disini!</h2>
                            <p>Produk elektronik berkualitas dengan layanan purna jual terbaik</p>
                            <a href="#katalog-produk" class="slider-btn">Disini</a>
                        </div>
                    </div>
                </div>

                <div class="slider-controls">
                    <span class="slider-dot active" data-index="0"></span>
                    <span class="slider-dot" data-index="1"></span>
                    <span class="slider-dot" data-index="2"></span>
                </div>
            </div>

            <!-- Promo Section -->
            <div class="container" id="promo-section">
                <div class="section-title">
                    <h2>Promo Terkini</h2>
                </div>
                <div class="promo-container">
                    <div class="promo-card">
                        <div class="promo-img">
                            <img src="<?= base_url('assets/img/produk/ASUS B1402 CBA.jpg'); ?>" alt="Promo 1">
                        </div>
                        <div class="promo-content">
                            <span class="promo-badge">Diskon 10%</span>
                            <h3>Promo Laptop Asus</h3>
                            <p>Dapatkan diskon spesial untuk pembelian laptop Asus seri terbaru. Berlaku hingga akhir bulan.</p>
                        </div>
                    </div>
                    <div class="promo-card">
                        <div class="promo-img">
                            <img src="<?= base_url('assets/img/kerja6.jpeg'); ?>" alt="Promo 2">
                        </div>
                        <div class="promo-content">
                            <span class="promo-badge">Cashback</span>
                            <h3>Promo Layanan Weekend!</h3>
                            <p>Dapatkan promo layanan antar barang elektronik ke rumah anda.</p>
                        </div>
                    </div>
                    <div class="promo-card">
                        <div class="promo-img">
                            <img src="<?= base_url('assets/img/kerja5.jpeg'); ?>" alt="Promo 3">
                        </div>
                        <div class="promo-content">
                            <span class="promo-badge">Gratis Pemasangan</span>
                            <h3>Weekend Makin Asyik!</h3>
                            <p>Beli barang elektronik dan dapatkan gratis biaya pemasangan dan service pertama. Promo terbatas!</p>
                        </div>
                    </div>
                    <div class="promo-card">
                        <div class="promo-img">
                            <img src="<?= base_url('assets/img/upload_foto_profil/default.png'); ?>" alt="Promo 3">
                        </div>
                        <div class="promo-content">
                            <span class="promo-badge">Coming Soon</span>
                            <h3>Coming Soon</h3>
                            <p>-</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Section -->
            <section class="container product-section" id="katalog-produk">
                <div class="section-title">
                    <h2>Katalog Produk</h2>
                </div>

                <div class="category-filter">
                    <button class="category-btn active" data-kategori="semua">Semua</button>
                    <button class="category-btn" data-kategori="Notebook/Laptop">Notebook/Laptop</button>
                    <button class="category-btn" data-kategori="Printer/Scanner">Printer/Scanner</button>
                    <button class="category-btn" data-kategori="AC">AC</button>
                    <button class="category-btn" data-kategori="Lainnya">Lainnya</button>
                </div>

                <div class="product-grid">
                    <?php foreach ($produk as $p) : ?>
                        <?php $diskon = ($p['harga'] * $p['persentase_diskon']) / 100 ?>
                        <?php $harga_diskon = $p['harga'] - $diskon; ?>
                        <a class="product-detail" href="<?= base_url('index.php/Katalog_produk/detail_produk?id_produk=' . $p['id_produk']) ?>">
                            <div class="product-card">
                                <div class="product-img">
                                    <img src="<?= base_url('assets/img/produk/' . $p['gambar']); ?>" alt="<?= $p['nama_produk']; ?>">
                                    <?php if ($p['persentase_diskon'] != 0) : ?>
                                        <span class="discount-badge">-<?= $p['persentase_diskon']; ?>%</span>
                                    <?php endif; ?>
                                </div>
                                <div class="product-info">
                                    <h3><?= $p['nama_produk']; ?></h3>
                                    <div class="product-price">
                                        <span class="current-price">Rp <?= number_format($p['persentase_diskon'] != 0 ? $harga_diskon : $p['harga'], 0, ',', '.'); ?></span> <!-- $angka->harga	Angka yang mau diformat, 0->0 desimal Tidak pakai angka di belakang koma(contoh: .00), ','->Koma Dipakai sebagai pemisah desimal, '.'->Titik Dipakai sebagai pemisah ribuan. Format Indonesia pakai format lokal (titik = ribuan, koma = desimal)-->
                                        <?php if ($p['persentase_diskon'] != 0) : ?>
                                            <span class="old-price">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-actions">
                                        <p class="cart-status" data-stock="<?= $p['stok']; ?>">Tersedia</p>
                                        <button class="view-details" type="button">Detail</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!--ModalLogin-->
            </section>
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
    </main>

    <!-- FOOTER -->
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
                            <li><a href="<?= base_url('index.php/Home/tentangKami'); ?>">Tentang Kami</a></li>
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
        </section>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <script src="<?= base_url('assets/js/kategori_produk.js?v=' . time()) ?>"></script> <!--base_url udah didefinisikan sebelum file JS kategori_produk.js dimuat, agar tinggal pakai di file JS seperti ini: url: base_url + "Katalog_produk/filter_produk"-->
    <script src="<?= base_url('assets/js/card_status.js?v=' . time()) ?>"></script>
    <script src="<?= base_url('assets/js/login.js?v=' . time()); ?>"></script>
    <script src="<?= base_url('assets/js/slide.js?v=' . time()); ?>"></script>
</body>

</html>