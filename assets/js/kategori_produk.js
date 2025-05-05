$(document).ready(function() {
    $('.category-btn').on('click', function() {
        $('.category-btn').removeClass('active');
        $(this).addClass('active');

        var kategori = $(this).data('kategori');

        $.ajax({
            url: base_url + "index.php/Katalog_produk/filter_produk", // AJAX arahin ke <?= base_url('Katalog/filter_produk') ?> karena controllernya di Katalog_produk.php.
            type: 'POST', // tipenya post
            data: { kategori: kategori },
            success: function(response) {
                $('.product-grid').html(response); // replace isi grid dengan partial
                updateCartStatus(); // <--- panggil ulang fungsi agar elemen baru diproses
            }
        });
    });
});
// Setelah partial view dimuat (via AJAX), panggil ulang fungsi
// card_status.js bisa tetap dipakai di partial view asalkan fungsi utamanya tidak hanya berjalan saat DOM pertama kali dimuat, tapi juga bisa dipanggil ulang setelah isi halaman diubah. Solusinya diubah menjadi function agar bisa dipanggil berulang kali.
