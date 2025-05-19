$(document).ready(function () {
    $('#form-add').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        $.ajax({
            url: form.attr('action'),
            method: "POST",
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.pesan,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = last_admin_page;
                    });
                } else if (response.status === 'found') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: response.pesan,
                        confirmButtonText: 'Tutup'
                    });
                } else if (response.status === 'notFound') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: response.pesan,
                        confirmButtonText: 'Tutup'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: response.pesan,
                        confirmButtonText: 'Tutup'
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Terjadi kesalahan saat mengirim data.',
                    confirmButtonText: 'Tutup'
                });
                console.log(form.serialize());
            }

        });
    });

    // ajax untuk menangani input file pada tambah produk
    $('#form-add-product').on('submit', function (e) {
        e.preventDefault();

        const form = $('#form-add-product')[0]; // ambil elemen DOM, bukan jQuery object
        const formData = new FormData(form); // gunakan FormData untuk handle file

        $.ajax({
            url: form.action, //gunakan form.action akses langsung ke atribut action DOM
            method: "POST",
            data: formData, // untuk form dengan file upload.
            processData: false, // penting! jangan proses data
            contentType: false, // penting! biarkan browser set content type sendiri
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.pesan,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = last_admin_page;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: response.pesan,
                        confirmButtonText: 'Tutup'
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Terjadi kesalahan saat mengirim data.',
                    confirmButtonText: 'Tutup'
                });
                console.log('Error:', error);
            }
        });
    });
});