<?php
$sesi = $this->session->userdata('role');
if ($sesi !== "user") {
    redirect('Home/index');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Page</title>

    <!--Link css-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_profil_page.css?v=' . time()) ?>">
    <!-- ikon user, Font Awesome cdn (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- teknik optimalisasi loading font. Browser akan lebih cepat menyambung ke Google Fonts karena sudah dipersiapkan lebih dulu.-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"> <!--import font poppins dari google font, dengan ketebalan 400(normal) dan 600(semi-bold)-->
</head>

</head>

<body>
    <header>
        <div class="container header-wrapper">
            <div class="logo">
                <img src="<?= base_url('assets/img/logo_company.jpeg'); ?>" alt="Logo">
                <h1>CV. MULIA LANGGENG MUFAKAT</h1>
            </div>
            <nav>
                <a href="<?= base_url('index.php/Home/index')?>">Home</a>
                <a href="<?= base_url('index.php/Home/produk'); ?>">Produk</a>
                <a href="#">Layanan</a>
                <a href="#footer">Tentang Kami</a>
            </nav>
            <button class="logout" onclick="location.href='<?= base_url('index.php/Signup_login_control/logout'); ?>'">Logout</button>
        </div>
    </header>
    <main class="container main-grid">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="profile-box">
                <img src="<?= base_url('assets/img/upload_foto_profil/' . $user['foto'])?>" alt="Foto Profil">
                <div class="username"><?= $user['nama_lengkap'];?></div>
                <!-- <div class="email"><?= $user['email'];?></div> -->
            </div>
            <ul class="menu-links">
                <li><a href="#">Edit Profil</a></li>
                <li><a href="#">Pesanan</a></li>
                <li><a href="#">Pengaturan</a></li>
            </ul>
        </aside>

        <!-- Form Area -->
        <section class="profile-content">
            <h2>Profil Saya</h2>
            <p>Kelola informasi profil Anda untuk mengontrol dan mengamankan akun</p>
            <form id="formProfil" class="profile-form" action="<?= base_url('index.php/Home/updateProfil')?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input id="nama_lengkap" type="text" name="nama_lengkap" value="<?= $user['nama_lengkap']?>">
                </div>
                <div class="form-group">
                    <label for="no_hp">No. Telepon</label>
                    <input id="no_hp" type="tel" name="no_hp" value="<?= $user['no_hp'];?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="<?= $user['tanggal_lahir'];?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" name="alamat" value="<?= $user['alamat'];?>">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="L" <?= $user['jenis_kelamin'] === 'L' ? 'checked' : ''?>> Laki-laki</label> <!--Gunakan checked untuk radio button (bukan selected, itu buat <option>), dan jangan lupa echo-->
                        <label><input type="radio" name="jenis_kelamin" value="P" <?= $user['jenis_kelamin'] === 'P' ? 'checked' : ''?>> Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Upload Foto: (jpeg/jpg/png)</label>
                    <input type="file" name="foto">
                </div>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </form>
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
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- wajib ada jQuery karena pakai $(document).ready() dan $.ajax():-->
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--link js-->
    <script src="<?= base_url('assets/js/update_profil.js?v=' . time())?>"></script>
</body>

</html>