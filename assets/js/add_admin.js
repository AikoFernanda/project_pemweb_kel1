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
                } else if(response.status === 'notFound'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: response.pesan,
                        confirmButtonText: 'Tutup'
                    });
                }else {
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
});