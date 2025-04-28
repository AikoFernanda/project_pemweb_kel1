$(document).ready(function() {
    $(document).on('submit', '.delete-keranjang', function (e) { // supaya event berlaku untuk semua form .delete-keranjang.
        e.preventDefault(); // MENCEGAH form reload halaman

        if (confirm('Yakin ingin menghapus produk ini dari keranjang?')) {
            const form = $(this); // form yang sedang diklik
            $.ajax({
                url: form.attr('action'),
                method: "POST",
                data: form.serialize(),
                success: function (respon) {
                    alert(respon); // tampilkan pesan dari server
                    form.closest('tr').remove() // menghapus baris tabel tempat tombol diklik.
                },
                /* Di dalam $.ajax({...}), kalau request kamu gagal (bisa karena server error, internet mati, atau masalah lainnya), fungsi error: ini akan dipanggil otomatis. */
                error: function (xhr, status, error) {
                    alert('Terjadi Kesalahan. Coba Lagi Nanti.');
                    /*
                    xhr -> Singkatan dari XMLHttpRequest. Ini objek bawaan browser yang isinya semua detail respon server. 
                    status -> Status text, contoh: "timeout", "error", "abort", atau "parsererror". 
                    error -> Pesan error dari server atau browser, biasanya string error-nya.
                    */
                }
            });
        }
    });
});