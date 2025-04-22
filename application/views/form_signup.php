<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style_form_signup.css?v=' . time()); ?>">
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
                <a href="#katalog-produk">Produk</a>
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
                        <input id="email" type="text" name="email" required> <!--name lebih baik diisini sesuai field pada database agar mempermudah dalam CRUD-->

                        <label for="telepon">Nomor Telepon:</label> <br>
                        <input id="telepon" type="tel" name="no_hp" pattern="\d{9,11}" maxlength="11" required title="Masukkan nomor telepon dengan benar">

                        <label for="password">Password:</label> <br>
                        <input id="password" type="password" name="password_akun" required> <!--type = "password" agar ketika user menginput input-box password karakternya tampil bulet2 item, jadi tidak bisa dilihat  dan dibaca orang lain pada layar/UI-->

                        <button type="submit" name="submit">Kirim Data</button>
                        <br>

                    </form>
                </div>
            </div>
    </main>
    <footer>
        &copy; <?= date('Y'); ?> CV. Mulia Langgeng Mufakat — All rights reserved.
    </footer>
</body>

</html>
