<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - CV. MULIA LANGGENG MUFAKAT</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

    <!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!--LINK CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style_keranjang.css?v=' . time()) ?>">
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
    <main class="container">
        <h1>Keranjang Anda</h1>
        <?= $this->session->userdata('location');?>
        <a href="<?= base_url($this->session->userdata('location')) ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali<!--Untuk ikon panah ke kiri-->
        </a>
        <table>
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $total_harga = 0; ?>
                <?php if ($produk) : ?>
                    <?php foreach ($produk as $p) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?= base_url('assets/img/produk/' . $p['gambar']); ?>" alt="<?= $p['nama_produk'] ?>" width="100"></td>
                            <td><?= $p['nama_produk'] ?></td>
                            <td><?= $p['kategori'] ?></td>
                            <td><?= $p['jumlah'] ?></td>
                            <td><?= 'Rp ' . number_format($p['subtotal'], 0, ',', '.') ?></td>
                            <td>
                                <form class="delete-keranjang" action="<?= base_url('index.php/Katalog_produk/deleteKeranjang') ?>" method="POST"> <!--form untuk post value dari key id_produk ke controller untuk dihapus datanya di database dengan model-->
                                    <input type="hidden" name="id_produk" value="<?= $p['id_produk']; ?>">
                                    <button type="submit" class="btn-hapus">Hapus</button>
                                </form> <!--jangan gunakan id pada form, karena form ini diloop oleh foreach. Jadi banyak form dengan id yang sama, sementara id harus unik tidak boleh sama. id="delete-keranjang" ganti jadi class="delete-keranjang"-->
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php $total_harga += $p['subtotal']; ?>
                    <?php endforeach; ?>
                <?php elseif ($message) : ?>
                    <tr>
                        <td colspan="7" class="no-items"><?= $message; ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="checkout">
            <div class="checkout-content">
                <h2>Total: Rp <?= number_format($total_harga, 0, ',', '.'); ?></h2>
                <button type="button" name="btn-checkout" class="btn-checkout">Checkout Sekarang</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- wajib ada jQuery untuk AJAX-->
    <script src="<?= base_url('assets/js/delete_cart.js?v=' . time());?>"></script>
</body>

</html>