// Pastikan jQuery udah di-load di halaman
$(document).ready(function () {
    $('#formTambahKeranjang').submit(function (e) {
        e.preventDefault(); // MENCEGAH form reload halaman

        $.ajax({
            url: $(this).attr('action'), // ambil action dari form
            type: 'POST',
            data: $(this).serialize(), // ambil semua input dalam form
            error: function () {
                // Dipanggil ketika permintaan Ajax gagal, misalnya: Server tidak  ,bisa dijangkau,File PHP tidak ditemukan (404),Server error (500), Masalah jaringan, Format data dari server tidak valid
                // Ganti alert() dengan SweetAlert agar lebih bagus
                Swal.fire({ 
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: 'Coba lagi nanti.',
                    confirmButtonText: 'Ok'
                });
            },
            success: function (res) {
                // Dipanggil ketika permintaan Ajax berhasil. Artinya server merespons dengan kode status 200 dan data kembali normal.
                // Ganti alert() dengan SweetAlert agar lebih bagus
                if (res.includes('Session expired') || res.includes('Gagal')) { // res.includes(...) Mengecek apakah isi respon dari server (res) mengandung teks tertentu. jika dalam res ada kalimat itu(value yand dikembalikan dari controller), maka true. jika tidak mengandung kalimat itu maka false
                    Swal.fire({ // Swal.fire({...}) Ini adalah SweetAlert, library popup modern pengganti alert().
                        icon: 'error',
                        title: 'Gagal!',
                        text: res, // Isi teks: sesuai res dari server
                        confirmButtonText: 'Ok'
                    })
                } else if(res.includes('Tidak Tersedia') || res.includes('Stok')) {
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