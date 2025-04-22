<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beranda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_beranda.css?v=' . time()); ?>"><!--opsi developer pakai . time() agar css di load tiap halaman reload-->
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
                <a href="#katalog-produk">Produk</a>
                <a href="#">Layanan</a>
                <a href="#">Tentang Kami</a>
            </div>
            <?php if ($this->session->userdata('logged_in')) : ?>
                <div class="login-register">
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
        <?php if ($this->session->flashdata('login_error')) : ?>
            <script>
                window.onload = function() { // // window.onload = dijalankan setelah seluruh halaman selesai dimuat.
                    toggleLoginModal(); // Buka modal login otomatis saat halaman dimuat, Modal otomatis muncul
                };
            </script>
            <div class="flash-error" style="color: red;"><?= $this->session->flashdata('login_error'); ?></div>
        <?php endif; ?>
        <section id="profil-company">
            <div class="container profil-company">
                <div class="row">
                    <div class="row-left">
                        <h1>Kebutuhan Anda Ada Disini! <br>Tunggu Apa Lagi?</h1>
                    </div>
                    <div class="row-right">
                        <h1>[Gambar-gambar company bisa dimasukkan di sini]</h1>
                    </div>
                </div>
            </div>
        </section>
        <section id="news">
            <div class="container news">
                <h1>Berita</h1>
                <p>Informasi terbaru dari perusahaan kami akan tampil di sini.</p>
                <?php for ($i = 0; $i < 3; $i++) : ?>
                    <div class="news-box">
                        <div class="news-img">
                            <img src="#" alt="Berita CV Mulamu">
                        </div>
                        <div class="news-description">
                            <h2>Berita 1</h2>
                            <p>Deskripsi Berita</p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </section>

        <section id="katalog-produk">
            <div class="container katalog-produk">
                <h1>Katalog Produk</h1>
                <p>List produk unggulan kami.</p>

                <?php for ($j = 0; $j < 8; $j++) : ?>
                    <div class="katalog-box">
                        <img src="#" alt="Img-produk">
                        <h2>Produk 1</h2>
                        <p>Deskripsi Produk</p>
                    </div>
                <?php endfor; ?>
            </div>
        </section>
        <div id="login-modal" class="modal">
            <div class="login-content">
                <span class="close" onclick="toggleLoginModal()">&times;</span> <!--membuat elemen <span> dengan class 'close', <span> adalah elemen inline (biasanya untuk teks pendek). &timens ini adalah HTML entity(seperti &copy, dsb.) untuk simbol silang (×). Jadi di layar akan muncul tanda silang, sering digunakan sebagai tombol “close”.-->
                <h2>Login</h2>
                <form action="<?= base_url('index.php/Signup_login_control/login'); ?>" method="POST">
                    <label for="username">Username:</label><br>
                    <input id="username" type="text" name="username_akun" required><br>
                    <label for="password">Password:</label><br>
                    <input id="password" type="password" name="password_akun" required><br><br>
                    <button type="submit" name="submit">Login</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        &copy; <?= date('Y'); ?> CV. Mulia Langgeng Mufakat — All rights reserved. <!---->
    </footer>

    <script src="<?= base_url('assets/js/login.js?v=' . time()); ?>" defer></script> <!--.time() berfungsi agar file JS-nya otomatis ke-refresh saat develop (seperti css),  untuk cache-busting CSS & JS biasanya digunakan umum dalam praktik di kalangan developer agar perubahan langsung kelihatan.
                                                                                         Dengan defer, browser akan load script setelah halaman selesai dimuat. -->
</body>

</html>