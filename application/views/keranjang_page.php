<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - CV. MULIA LANGGENG MUFAKAT</title>
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
    <main>
        <h1>Keranjang Anda</h1>
        <?php $i = 0;?>
        <br>
        <?php var_dump($produk);?>
        <table border="1px" cellpadding="20px" cellspacing="1px">
            <tr>
                <th>Nomor</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($produk as $p) : ?>
                <tr>
                    <td><?=$i?></td>
                    <td><?=$p['nama_produk']?></td>
                    <td><?=$p['kategori']?></td>
                    <td><?=$p['jumlah']?></td>
                    <td><?=$p['subtotal']?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <footer>

    </footer>
</body>

</html>