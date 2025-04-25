<!--
Dalam folder partials berisi sub-view. Karena isinya bukan halaman utuh File kayak produk_page.php.
cuma berisi potongan HTML, misalnya:
1. Loop produk
2. List item
3. Card produk
4. Satu bagian table
adi dia bukan view utama, tapi semacam sub-view.
-->

<?php foreach ($produk as $p) :
    $diskon = ($p['harga'] * $p['persentase_diskon']) / 100;
    $harga_diskon = $p['harga'] - $diskon; ?>
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
                <span class="current-price">Rp <?= number_format($p['persentase_diskon'] != 0 ? $harga_diskon : $p['harga'], 0, ',', '.'); ?></span>
                <?php if ($p['persentase_diskon'] != 0) : ?>
                    <span class="old-price">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></span>
                <?php endif; ?>
            </div>
            <div class="product-actions">
                <button class="add-cart" type="button">Keranjang</button>
                <button class="view-details" type="button">Detail</button>
            </div>
        </div>
    </div>
<?php endforeach; ?>