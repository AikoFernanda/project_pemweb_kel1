document.addEventListener('DOMContentLoaded', function() {
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
});