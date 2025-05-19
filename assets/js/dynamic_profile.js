$(document).ready(function () {
    // Set first tab as active by default
    $('.menu-links a:first').addClass('active');

    // Handle tab switching
    $('.tab-link').click(function (e) {
        e.preventDefault();
        const tab = $(this).data('tab');

        // Remove active class from all tabs
        $('.tab-link').removeClass('active');
        // Add active class to current tab
        $(this).addClass('active');

        $.ajax({
            url: $loadTab,
            method: "POST",
            data: { tab: tab },
            beforeSend: function () {
                // Optional: Add loading indicator
                $('#dynamic-content').html('<div class="loading-spinner"><i class="fas fa-spinner fa-spin"></i><p>Loading...</p></div>'); // indikator loading
            },
            success: function (response) {
                $('#dynamic-content').html(response);
            },
            error: function () {
                $('#dynamic-content').html('<p>Gagal memuat konten.</p>')
            }
        });
    });

    // Karena kontennya di-load secara AJAX (dalam #dynamic-content), maka ketika jQuery pertama kali jalan, elemen tersebut belum ada. gunakan '#dynamic-content').on('click', '.btn-action.btn-change-password', function () 
    // ubah password
    $('#dynamic-content').on('click', '.btn-action.btn-change-password', function () {
        Swal.fire({
            icon: "question",
            title: "Ubah Password",
            input: 'password',
            inputLabel: "Masukkan password baru",
            inputPlaceholder: 'Password baru...',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ubah"
        }).then((result) => {
            if (result.isConfirmed && result.value) {
                $.ajax({
                    url: $changePassword,
                    method: "POST",
                    data: { newPassword: result.value },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.pesan,
                                timer: 2000,
                                showButtonText: false
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
                    error: function (response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat mengubah password.',
                            confirmButtonText: "Tutup"
                        });
                    }
                });
            }
        });
    });

    $('#dynamic-content').on('click', '.btn-action.btn-delete', function () {
        Swal.fire({
            icon: "warning",
            title: "Yakin ingin menghapus akun secara permanen?",
            text: "Semua data Anda akan dihapus secara permanen.",
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $deleteAccount,
                    method: "POST",
                    dataType: "json",
                    success: function (response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.pesan,
                                timer: 2000,
                                showButtonText: false
                            }).then(() => {
                                window.location.href = $logout; // redirect setelah akun dihapus
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: response.pesan,
                                confirmButtonText: 'Tutup'
                            })
                        }
                    },
                    error: function (response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal menghapus akun.',
                            showButtonText: "Tutup"
                        });
                    }
                });
            }
        });
    });
});
