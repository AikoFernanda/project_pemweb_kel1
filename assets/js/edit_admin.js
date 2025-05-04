$(document).ready(function () {
    $('#form-update').on('submit', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Yakin ingin menyimpan perubahan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: "success",
                                title: 'Berhasil!',
                                text: response.pesan,
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href=admin_page;
                            });
                        } else {
                            Swal.fire('Gagal!', response.pesan, 'error');
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan Server',
                            text: 'Terjadi kesalahan saat mengirim data.',
                            confirmButtonText: 'error'
                        });
                        console.error("AJAX Error:", xhr.responseText);
                    }
                });
            }
        });
    });
});
