$(document).ready(function () {
    $('#formProfil').on('submit', function (e) { // submit bukan event dari tombol, tapi dari <form>. jadi gaperlu '.btn-submit
        e.preventDefault(); // akses langsung ke atribut action DOM

        Swal.fire({
            icon: "question",
            title: "Yakin Ingin Menyimpan Perubahan?",
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, simpan!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = $('#formProfil')[0]; // ambil elemen form DOM. $('#formProfil') hasilnya adalah objek jQuery. Tapi FormData tidak bisa langsung menerima jQuery, jadi kita ambil DOM asli-nya pakai [0].
                const formData = new FormData(form); // buat FormData untuk file
                // Pastikan <form> punya atribut enctype="multipart/form-data" agar file ikut dikirim.
                $.ajax({
                    url: form.action, // salah! karena form.attr('action') hanya untuk objek jQuery, gunakan form.action akses langsung ke atribut action DOM
                    method: "POST",
                    data: formData, // Untuk upload file seperti foto profil, harus pakai FormData, dan jangan pakai form.serialize() karena serialixe mengirim dalam bentuk string saja. new FormData(form) mengambil semua input dari form (termasuk input type file)
                    processData: false, // Wajib supaya FormData tidak diubah jadi string query
                    contentType: false, // Wajib supaya header content-type diset otomatis
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.pesan,
                                confirmButtonText: 'Ok'
                            }).then(() => {
                                location.reload();  // Memaksa reload halaman
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.pesan,
                                confirmButtonText: 'Ok'
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan Server!',
                            text: 'Terjadi Kesalahan Saat Mengirim Data',
                            confirmButtonText: 'Ok'
                        });
                        console.log('AJAX Error: ' + xhr.responseText);
                    }
                });
            }
        });
    });
});

// processData: false
// biasanya jQuery akan mengubah data menjadi query string, tapi FormData itu format khusus, tidak boleh dirubah menjadi string. Jadi kita matikan fitur ini dengan set value menjadi false.

// contentType: false
// biasanya jQuery akan mengatur header jadi application/x-ww-form-urlencoded. Tapi FormData butuh multipart/form-data otomatis dari browser. jadi kita biarkan borwser yang atur dengan set valuenya menjadi false.

// Jadi gunakan ForData karena ada file (misal foto). serialize() nggak bisa kirim file. Harus setting processData: false dan contentType: false supaya file-nya terkirim dengan benar.