<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - CV. MULIA LANGGENG MUFAKAT</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!--LINK CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_checkout.css?v=' . time()) ?>">
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
        </div>
    </header>
    <main>
        <div class="checkout-container">
            <h2>Checkout</h2>
            <a href="<?= base_url('index.php/Home/produk') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali<!--Untuk ikon panah ke kiri-->
            </a>

            <div class="checkout-wrapper">
                <!-- Formulir Pengiriman -->
                <div class="checkout-form">
                    <form id="form-checkout" action="<?= base_url('index.php/Katalog_produk/transaksi'); ?>" method="POST">
                        <input type="hidden" name="total_transaksi" value="<?= $totalHarga ?>">

                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>

                        <label for="alamat">Alamat Pengiriman</label>
                        <textarea name="alamat" required><?= $user['alamat']; ?></textarea> <!--textarea tidak pakai value pada propertinya, value taruh dalam content langsung/diantara tag pembuka dan penutup.-->

                        <label for="no_hp">Nomor HP</label>
                        <input type="tel" name="no_hp" value="<?= $user['no_hp']; ?>" pattern="\d{9,12}" maxlength="12" title="Masukkan nomor telepon dengan benar" required>

                        <button type="submit" class="btn-submit" data-total-harga="<?= $totalHarga; ?>">Konfirmasi Pesanan</button>
                    </form>
                </div>

                <!-- Ringkasan Produk -->
                <div class="checkout-summary">
                    <h3>Ringkasan Produk</h3>
                    <?php foreach ($produk as $p) : ?>
                        <div class="product-summary">
                            <img src="<?= base_url('assets/img/produk/' . $p['gambar']); ?>" alt="<?= $p['nama_produk'] ?>">
                            <div class="info">
                                <p class="nama"><?= $p['nama_produk'] ?></p>
                                <p>Jumlah: <?= $p['jumlah'] ?></p>
                                <p>Harga: Rp <?= number_format($p['subtotal'], 0, ',', '.') ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="total-harga">
                        <strong>Total: Rp <?= number_format($totalHarga, 0, ',', '.') ?></strong>
                    </div>
                </div>
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
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- wajib ada jQuery karena pakai $(document).ready() dan $.ajax():-->
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Jika kode JS-nya di file eksternal (assets/js/konfirmasi_pesanan.js), jangan pakai '<\?==?> didalam file js. Sebagai gantinya, lempar base URL dari PHP ke JS seperti ini:-->
    <script>
        const baseUrl = "<?= base_url(); ?>"; // Lalu di konfirmasi_pesanan.js-nya tinggal pakai: window.location.href = baseUrl + "index.php/Katalog_produk/keranjang";
    </script>
    <!--js untuk menangani submit konfirmasi pesanan-->
    <script src="<?= base_url('assets/js/konfirmasi_pesanan.js?v=' . time()); ?>"></script>
</body>

</html>