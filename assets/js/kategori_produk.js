src="https://code.jquery.com/jquery-3.6.0.min.js"

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
                $('.product-grid').html(response);
            }
        });
    });
});