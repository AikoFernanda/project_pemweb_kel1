// Pastikan jQuery udah di-load di halamanmu
$(document).ready(function () {
    $('#formTambahKeranjang').submit(function (e) {
        e.preventDefault(); // MENCEGAH form reload halaman

        $.ajax({
            url: $(this).attr('action'), // ambil action dari form
            type: 'POST',
            data: $(this).serialize(), // ambil semua input dalam form
            error: function () {
                // alert('Terjadi kesalahan. Coba lagi.'); // munculin respon dari server dengan alert
                Swal.fire({ // Ganti alert() dengan SweetAlert agar lebih bagus
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Coba lagi nanti.',
                    confirmButtonText: 'Ok'
                });
            },
            success: function (res) {
                // alert(res); // munculin respon dari server dengan alert
                if (res.includes('Session expired') || res.includes('Gagal')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: res,
                        confirmButtonText: 'Ok'
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: res,
                        confirmButtonText: 'Ok'
                    });
                }
            },

        });
    });
});

// e.preventDefault() ➔ supaya form tidak reload.
// $.ajax() ➔ kirim data ke server.
// echo di controller ➔ dikirim balik ke browser.
// tampil alert ➔ user tau berhasil/gagal, tanpa reload halaman.