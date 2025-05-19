<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - CV. MULIA LANGGENG MUFAKAT</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style_detail_pesanan.css?v=' . time()) ?>">
</head>

<body>
    <div class="container">
        <div class="btn-back">
            <button type="button" onclick="window.location.href='<?= base_url('index.php/Admin_control/detail_admin_page?admin_page_location=' . $this->session->userdata('admin_page_location'));?>'">← Kembali</button>
        </div>
        <h2>Detail Pesanan</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Detail Transaksi</th>
                    <th>Id Transaksi</th>
                    <th>Id Produk</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php foreach($detail_transaksi as $d): ?>
                <tr>
                    <td><?= $i+1; ?></td>
                    <td><?= $d['id_detail_transaksi']; ?></td>
                    <td><?= $d['id_transaksi']; ?></td>
                    <td><?= $d['id_produk'];?></td>
                    <td><?= $d['jumlah'];?></td>
                    <td><?= number_format($d['subtotal'], 0, ',', '.');?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>