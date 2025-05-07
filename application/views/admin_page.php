<?php
$sesi = $this->session->userdata('role');
if ($sesi !== "admin") {
    redirect('Home/admin');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - CV. MULIA LANGGENG MUFAKAT</title>
    <!--link css-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_admin_page.css?v=' . time()); ?>">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <header>
        <div class="container header-content">
            <h2>Admin Panel</h2>
            <button class="logout-btn" onclick="window.location.href='<?= base_url('index.php/Signup_login_control/logout'); ?>'">Logout</button>
        </div>
    </header>

    <main class="container">
        <section class="welcome">
            <h1>Selamat Datang, Admin!</h1>
            <p>Silahkan pilih salah satu menu berikut untuk mengelola data.</p>
        </section>

        <section class="grid-section">
            <h2 class="section-title">Manajemen Data</h2>
            <div class="grid-menu">
                <!-- Data Akun, Data Pengguna, Data Produk -->
                <div class="card" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=akun'); ?>'">
                    <h3>Data Akun Pengguna</h3>
                    <p>Kelola informasi akun pengguna.</p>
                </div>
                <div class="card" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=user'); ?>'">
                    <h3>Data Pengguna</h3>
                    <p>Kelola data pengguna terdaftar.</p>
                </div>
                <div class="card" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=produk'); ?>'">
                    <h3>Data Produk</h3>
                    <p>Lihat dan ubah data produk.</p>
                </div>
                <div class="card" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=keranjang'); ?>'">
                    <h3>Data Keranjang</h3>
                    <p>Lihat isi keranjang pengguna.</p>
                </div>
            </div>
        </section>

        <section class="grid-section">
            <h2 class="section-title">Transaksi</h2>
            <div class="grid-menu">
                <!-- Data Transaksi, Detail Transaksi -->
                <div class="card" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=transaksi'); ?>'">
                    <h3>Transaksi</h3>
                    <p>Riwayat transaksi pengguna.</p>
                </div>
                <div class="card" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=detail_transaksi'); ?>'">
                    <h3>Detail Transaksi</h3>
                    <p>Detail dari setiap transaksi</p>
                </div>
            </div>
        </section>

        <section class="grid-section">
            <h2 class="section-title">Logistik</h2>
            <div class="grid-menu">
                <!-- Jadwal Pengiriman -->
                <div class="card" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=jadwal_pengiriman'); ?>'">
                    <h3>Jadwal Pengiriman Pesanan</h3>
                    <p>Kelola jadwal pengiriman pesanan</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
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