<h2>Pesanan Saya</h2>
<p class="subtitle">Daftar semua riwayat Pesanan anda</p>

<div class="log-transaction">
    <?php foreach ($pesanan as $p) : ?>
        <div class="summary-order">
            <div class="order-header">
                <i class="fa-solid fa-clock-rotate-left"></i>
            <span class="order-date"><?= date('d M Y', strtotime($p['tanggal_transaksi'])); ?></span>
            </div>
            <div class="order-info">
                <p><strong>Kode Pesanan</strong> <?= $p['kode_pemesanan'] ?></p>
                <p><strong>Total Pembayaran</strong> Rp <?= number_format($p['total_transaksi'], 0, ',', '.');?></p>
                <?php if($p['status_pengiriman'] === 'Diterima') :?>
                <p><strong>Status Pesanan</strong> <span style="color: green;">Diterima</span></p>
                <?php elseif($p['status_pengiriman'] === 'Dikirim') :?>
                <p><strong>Status Pesanan</strong> <span style="color: orange;">Dikirim</span></p>
                <?php else :?>
                <p><strong>Status Pesanan</strong> <span style="color: red;">Diproses</span></p>
                <?php endif;?>
                <a href="<?= base_url('index.php/Home/detailPesanan?id=' . $p['id_transaksi']);?>" class="detail-link">Lihat detail pesanan &rarr;</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>