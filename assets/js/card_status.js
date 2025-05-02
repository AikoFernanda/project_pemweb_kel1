// document.addEventListener('DOMContentLoaded', function() {
// jangan pakai DOMContentLoaded,
// Agar script card_status.js tetap berfungsi saat menggunakan partial view (misalnya hasil dari AJAX), kita harus memastikan bahwa JavaScript card_status.js juga dijalankan ulang setelah partial dimuat ke halaman.
// Kenapa? Karena DOMContentLoaded hanya berjalan sekali saat halaman utama pertama kali dimuat. Kalau me-load partial pakai AJAX atau mengganti isi HTML via JavaScript, maka script-nya tidak otomatis jalan lagi.
// Solusi: Ubah card_status.js jadi fungsi yang bisa dipanggil kapan saja


    function updateCartStatus() {
    const statusList = document.querySelectorAll('.cart-status'); //  mengambil semua elemen HTML yang cocok dengan selector CSS yang kamu berikan. Hasilnya adalah NodeList, yaitu daftar elemen (mirip array, tapi bukan array murni).
    statusList.forEach(function (statusEl) {
        const stock = parseInt(statusEl.dataset.stock);

        if(stock === 0) {
            statusEl.textContent = 'Tidak Tersedia';
            statusEl.style.backgroundColor = '#f9f9f9';
            statusEl.style.color = '#999';
            statusEl.style.borderColor = '#ddd';
        } else {
            statusEl.textContent = 'Tersedia';
            statusEl.style.backgroundColor = '#e6f3ff';
            statusEl.style.color = '#007bfff';
            statusEl.style.borderColor = '#b3daff';
        }
    });
};

// Jalankan pertama kali saat halaman penuh dimuat
document.addEventListener('DOMContentLoaded', updateCartStatus);