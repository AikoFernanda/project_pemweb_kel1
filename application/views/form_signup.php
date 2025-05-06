<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - CV. MULIA LANGGENG MUFAKAT</title>
    <!--link CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_form_signup.css?v=' . time()); ?>">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <header>
        <div class="container main-header">
            <div class="logo-header">
                <img src="<?= base_url('assets/img/logo_company.jpeg'); ?>" alt="Logo">
                <h1>CV. MULIA LANGGENG MUFAKAT</h1>
            </div>
            <div class="navigasi-header">
                <a href="<?= base_url('index.php/Home/index'); ?>">Home</a>
                <a href="<?= base_url('index.php/Home/produk'); ?>">Produk</a>
                <a href="#">Layanan</a>
                <a href="#">Tentang Kami</a>
            </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container-form">
                <div class="form-box">

                    <h1>Daftar</h1>
                    <?php if ($error = $this->session->flashdata('username_used')) : ?>
                        <div class="error-massage">
                            <h3><?= $error; ?></h3>
                        </div>
                    <?php endif; ?>

                    <?php if ($error = $this->session->flashdata('email_used')) : ?>
                        <div class="error-massage">
                            <h3><?= $error; ?></h3>
                        </div>
                    <?php endif; ?>
                    <form id="form-data" action="<?= base_url("index.php/Signup_login_control/signup"); ?>" method="POST">

                        <label for="username">Username:</label> <br> <!--for pada label berfungsi untuk menghubungkan atau mengikat antara label dan input, for='username' berarti label milik input dengan id='nama'.-->
                        <input id="username" type="text" name="username_akun" required> <!--wajib menggunakan properti id pada input, jika ingin menghubungkan input dengan label dengan properti for sama dengan id input. Jadi jika nama label pada UI web diklik, maka cursor user otomatis masuk input box-->

                        <label for="email">Email:</label> <br>
                        <input id="email" type="email" name="email" required> <!--name lebih baik diisini sesuai field pada database agar mempermudah dalam CRUD-->

                        <label for="telepon">Nomor Telepon:</label> <br>
                        <input id="telepon" type="tel" name="no_hp" pattern="\d{9,12}" maxlength="12" required title="Masukkan nomor telepon dengan benar" required>

                        <label for="password">Password:</label> <br>
                        <input id="password" type="password" name="password_akun" required> <!--type = "password" agar ketika user menginput input-box password karakternya tampil bulet2 item, jadi tidak bisa dilihat  dan dibaca orang lain pada layar/UI-->

                        <button type="submit" name="submit">Kirim Data</button>
                        <br>

                    </form>
                </div>
            </div>
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
</body>

</html>