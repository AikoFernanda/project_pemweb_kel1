<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - CV. MULIA LANGGENG MUFAKAT</title>

    <!--Link CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_detail_produk.css?v=' . time()) ?>">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Link untuk Load Font Awesome, yaitu ikon-ikon siap pakai. Tambahin link CDN di <head> HTML:-->
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
                <a href="#katalog-produk">Produk</a>
                <a href="#">Layanan</a>
                <a href="#">Tentang Kami</a>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <a href="<?= base_url('index.php/Home/produk') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Produk <!--Untuk ikon panah ke kiri-->
            </a>

            <div class="product-detail">
                <div class="product-img">
                    <img class="product-image" src="<?= base_url('assets/img/produk/' . $produk['gambar']); ?>" alt="<?= $produk['gambar']; ?>">
                </div>

                <div class="product-info">
                    <h1 class="product-name"><?= $produk['nama_produk']; ?></h1>

                    <div class="product-meta">
                        <p class="product-kategori"><i class="fas fa-tag"></i> <?= $produk['kategori']; ?></p>
                        <p class="product-stock"><i class="fas fa-boxes"></i> Stok: <?= $produk['stok']; ?></p>
                    </div>

                    <p class="product-description"><?= nl2br($produk['deskripsi']); ?></p>

                    <div class="product-price">
                        <?php $diskon = ($produk['harga'] * $produk['persentase_diskon']) / 100; ?>
                        <?php $harga_diskon = $produk['harga'] - $diskon; ?>
                        <?php if ($produk['persentase_diskon'] != 0) : ?>
                            <span class="harga-diskon">
                                Rp <?= number_format($harga_diskon, 0, ',', '.'); ?>
                            </span>
                            <del class="harga-asli">
                                Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
                            </del>
                        <?php else : ?>
                            <span class="harga-normal">
                                Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
                            </span>
                        <?php endif; ?>
                        <form action="<?= base_url('index.php/Home/keranjang'); ?>" method="POST">
                            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

                            <div class="quantity-container">
                                <button id="decreaseBtn" type="button" class="quantity-btn" onclick="return decreaseQuantity()">-</button>
                                <input
                                    id="quantity"
                                    type="number"
                                    name="jumlah"
                                    min=1
                                    value=1
                                    data-stok="<?= $produk['stok']; ?>"
                                    data-harga="<?= $produk['persentase_diskon'] != 0 ? $harga_diskon : $produk['harga']; ?>" readonly> <!--Di HTML, kalau kita mau nambahin data tambahan ke elemen, kita pakai atribut khusus yang diawali (data-). readonly di input jumlah supaya user ga bisa ketik sembarangan.-->
                                <button id="increaseBtn" type="button" class="quantity-btn" onclick="return increaseQuantity()">+</button>
                            </div>
                            <div id="total-price" class="total-price">
                                Rp <?= number_format(($produk['persentase_diskon'] != 0 ? $harga_diskon : $produk['harga']), 0, ',', '.'); ?>
                            </div>
                            <button type="submit" class="buy-button">Tambah ke Keranjang</button>
                        </form>
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
                        <p><i class="fas fa-map-marker-alt"></i> -</p>
                        <p><i class="fas fa-phone"></i> +62 823-7459-1985</p>
                        <p><i class="fas fa-envelope"></i> mulamufakat@gmail.com</p>
                    </div>
                </div>
                <div class="copyright">
                    &copy; 2025 CV. Mulia Langgeng Mufakat — All rights reserved.
                </div>
            </div>
    </footer>
    <script src="<?= base_url('assets/js/cart_quantity_product.js?v=' . time()); ?>"></script>
</body>

</html>