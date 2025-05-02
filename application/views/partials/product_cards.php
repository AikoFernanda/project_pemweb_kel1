<!--
Dalam folder partials berisi sub-view. Karena isinya bukan halaman utuh File kayak produk_page.php.
cuma berisi potongan HTML, misalnya:
1. Loop produk
2. List item
3. Card produk
4. Satu bagian table
adi dia bukan view utama, tapi semacam sub-view.
-->
<?php if ($produk) : ?>
    <?php foreach ($produk as $p) : ?>
        <?php $diskon = ($p['harga'] * $p['persentase_diskon']) / 100 ?>
        <?php $harga_diskon = $p['harga'] - $diskon; ?>
        <a class="product-detail" href="<?= base_url('index.php/Katalog_produk/detail_produk?id_produk=' . $p['id_produk']) ?>">
            <div class="product-card">
                <div class="product-img">
                    <img src="<?= base_url('assets/img/produk/' . $p['gambar']); ?>" alt="<?= $p['nama_produk']; ?>">
                    <?php if ($p['persentase_diskon'] != 0) : ?>
                        <span class="discount-badge">-<?= $p['persentase_diskon']; ?>%</span>
                    <?php endif; ?>
                </div>
                <div class="product-info">
                    <h3><?= $p['nama_produk']; ?></h3>
                    <div class="product-price">
                        <span class="current-price">Rp <?= number_format($p['persentase_diskon'] != 0 ? $harga_diskon : $p['harga'], 0, ',', '.'); ?></span> <!-- $angka->harga	Angka yang mau diformat, 0->0 desimal Tidak pakai angka di belakang koma(contoh: .00), ','->Koma Dipakai sebagai pemisah desimal, '.'->Titik Dipakai sebagai pemisah ribuan. Format Indonesia pakai format lokal (titik = ribuan, koma = desimal)-->
                        <?php if ($p['persentase_diskon'] != 0) : ?>
                            <span class="old-price">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="product-actions">
                        <p class="cart-status" data-stock="<?= $p['stok']; ?>">Tersedia</p>
                        <button class="view-details" type="button">Detail</button>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
<?php else : ?>
    <span class="product-null">
        <h3>Produk Belum Tersedia.</h3><span>
        <?php endif; ?>
