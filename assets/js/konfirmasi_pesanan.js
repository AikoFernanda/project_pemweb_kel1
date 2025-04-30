$(document).ready(function () {
    $('#form-checkout').submit(function (e) {
        e.preventDefault(); // mencegah form reload halaman

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json', // menggunakan json, controller mengembalikan echo json_encode
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Coba Lagi Nanti',
                    confirmButtonText: 'Ok'
                });
            },
            success: function (res) {
                console.log(res);
                if (res.status_transaksi === 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: res.pesan,
                        confirmButtonText: 'Ok'
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: res.pesan,
                        confirmButtonText: 'Ok'
                    }).then(() => {
                        // arahkan ke halaman keranjang ketika success setelah muncul popup berhasil/success
                        window.location.href = baseUrl + "index.php/Katalog_produk/keranjang"
                    });
                }
            }
        });
    });
});