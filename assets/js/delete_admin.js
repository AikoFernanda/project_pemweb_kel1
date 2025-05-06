$(document).ready(function () {
    $(document).on('click', '.btn-hapus', function(e) {
        e.preventDefault();

        if (!confirm('Yakin ingin menghapus data ini dari tabel?')) return; // Tanda NOT(!) artinya "jika tidak dikonfirmasi", atau dengan kata lain: jika user klik Cancel. dengan return; akan menghentikan eksekusi fungsi JavaScript saat itu juga (tidak lanjut ke proses hapus/berhenti mengeksekusi blok kode).
        const id = $(this).data('id');  // ambil id dari atribut data(data-id) pada tombol/button yang diclick.
        const location = admin_page_location;
        const data = {};

        switch(location) {
            case 'akun': // jika location bernilai 'akun' maka true.
                data.id_akun = id; // Buat objek data yang berisi { id_akun: id }. Lalu kirim ke controller PHP lewat AJAX. misal data = {id_akun = 5}
                break;
            case 'produk':
                data.id_produk = id;
                break;
            case 'user':
                data.id_user = id;
                break;
            case 'keranjang':
                data.id_keranjang = id;
                break;
            case 'transaksi':
                data.id_transaksi = id;
                break;
            case 'detail_transaksi':
                data.id_detail_transaksi = id;
                break;
            case 'jadwal_pengiriman':
                data.id_jadwal = id;
                break;
        }

        $.ajax({
            url: dataDelete, // URL tujuan (endpoint PHP controller)
            type: "POST", // Method HTTP-nya adalah POST
            data: data, //  Data dikirim ke server via AJAX (POST request). controller akan menangkap dengan variabel superglobal post
            dataType: 'json', //  memberi tahu JavaScript (jQuery) bahwa server akan membalas dengan data bertipe JSON.
            success: function(res) {
                if(res.status === 'sukses') { // res adalah array asosiatif dengan key status dan pesan. jika value dari res key 'status' = 'sukses' maka true.
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: res.pesan, // value dari res key 'pesan'
                        confirmButtonText: 'Ok'
                    });
                    (e.target).closest('tr').remove();
                    // e adalah parameter event (dari function(e)), dan e.target adalah elemen asli(<button type='button' class="btn-hapus" ... pada view)yang memicu event tersebut.
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: res.pesan,
                        confirmButtonText: 'Ok'
                    });
                }
            },
            error: function(res) {
                Swal.fire({
                    icon: "error",
                    title: 'Terjadi Kesalahan!',
                    text: 'Coba Lagi Nanti.!',
                    confirmButtonText: 'Ok'
                });
            },
        })
    })
})