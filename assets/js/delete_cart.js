$(document).ready(function () {
    $(document).on('submit', '.delete-keranjang', function (e) { // supaya event berlaku untuk semua form .delete-keranjang.
        e.preventDefault(); // MENCEGAH form reload halaman

        if (confirm('Yakin ingin menghapus produk ini dari keranjang?')) {
            const form = $(this); // form yang sedang diklik
            $.ajax({
                url: form.attr('action'),
                method: "POST",
                data: form.serialize(),
                dataType: "json", // penting agar bisa ambil total_harga baru
                success: function (response) {
                    if (response.success) {
                        form.closest('tr').remove() // menghapus baris tabel tempat tombol diklik.
                        $('#total-price').text('Rp ' + response.totalHargaFormat); // update total harga

                        // Cek apakah masih ada baris produk (selain pesan no-items)
                        const rowCount = $('tbody tr').length;

                        // // Cek apakah masih ada baris produk (selain pesan no-items)
                        if (rowCount === 0 || response.totalHarga == 0) {
                            $('tbody').html(`
                                <tr>
                                  <td colspan="7" class="no-items"> Keranjang Anda Kosong.</td> 
                                </tr>
                              `);
                        } // Dalam string template JavaScript (pakai backtick ``), ekspresi harus diapit ${...}, bukan ditulis mentah.
                        alert(response.pesan); // gunakan key 'message' sesuai respons
                    } else {
                        alert(response.pesan); // gunakan key 'message' sesuai respons
                    }
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
