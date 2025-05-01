document.addEventListener('DOMContentLoaded', function () {
    const totalPriceEl = document.getElementById('total-price');
    const btnCheckout = document.querySelector('.btn-checkout'); // hanya satu elemen, pakai querySelector

    /* Mengecek apakah elemen #total-price dan .btn-checkout ada di halaman */
    if (totalPriceEl && btnCheckout) {
        const text = totalPriceEl.textContent; // Mengambil teks dari elemen total harga
        const angka = parseInt(text.replace(/[^0-9]/g, '')); // Menghapus semua karakter selain angka pada variabel text, lalu mengubahnya menjadi INT dari string. 

        // membadingkan jika angka bernilai 0 atau user belum input produk dikeranjang disabled button
        if (angka === 0) {
            btnCheckout.disabled = true;
            btnCheckout.style.backgroundColor = '#ccc';
            btnCheckout.style.cursor = 'not-allowed'; /* Saat mouse diarahkan ke tombol atau elemen dengan cursor: not-allowed, ikon pointer akan berubah seperti ini: 🚫 */
            btnCheckout.title = 'Total belanja masih kosong';
        }
    }

});