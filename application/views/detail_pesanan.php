<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - CV. MULIA LANGGENG MUFAKAT</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style_detail_pesanan_profil.css?v=' . time())?>">
</head>

<body>
    <div class="container">
        <div class="btn-back">
            <button type="button" onclick="window.location.href='<?= base_url('index.php/Home/profil'); ?>'">← Kembali</button>
        </div>
        <h2>Detail Pesanan</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($detail_transaksi as $d): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $d['nama_produk']; ?></td>
                    <td><?= $d['jumlah']; ?></td>
                    <td>Rp<?= number_format($d['harga'], 0, ',', '.'); ?></td>
                    <td>Rp<?= number_format($d['subtotal'], 0, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>