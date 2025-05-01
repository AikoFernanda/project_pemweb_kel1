function updateButtons() {
    var qty = document.getElementById('quantity');
    var stock = parseInt(qty.getAttribute('data-stok'));
    var decreaseBtn = document.getElementById('decreaseBtn');
    var increaseBtn = document.getElementById('increaseBtn');
    var addToCartBtn = document.getElementById('addToCartBtn');

    // jika stock habis disabled semua button
    if (stock === 0) {
        decreaseBtn.disabled = true;
        increaseBtn.disabled = true;
        if(addToCartBtn) {
            addToCartBtn.disabled = true;
            addToCartBtn.innerText = 'Stok Tidak Tersedia';
            addToCartBtn.classList.add('btn-danger'); // classList.add() ➜ Menambahkan class baru ke elemen (kalau belum ada). ini akan menimpa css style defaultnya dengan class btn-danger
        }
    } else {
        // disabled tombol - kalau qty 1
        decreaseBtn.disabled = (parseInt(qty.value) <= 1); // jika getElementById perlu .value untuk mengakses atau mendapatkan value dari id tersebut. jika getAttribute tidak perlu, karena langsung mengembalikan nilai/value dari atribut tersebut.

        // disabled tombol + kalau qty sama dengan stok
        increaseBtn.disabled = (parseInt(qty.value) >= stock);

        // enable tombol tambah keranjang jika stock tersedia
        if (addToCartBtn) {
            addToCartBtn.disabled = false;
            addToCartBtn.innerText = '+ Tambah ke Keranjang';
            addToCartBtn.classList.remove('btn-primary'); // classList.remove() ➜ Menghapus class tersebut kalau sudah ada.Hapus style btn-primary dari id='addToCartBtn.
        }
    }
}

function updatePrice() {
    var qty = parseInt(document.getElementById('quantity').value); // .value agar dapat value dari id 'quantity'
    var basePrice = parseInt(document.getElementById('quantity').getAttribute('data-harga')); /* ambil atribut data-harga yang nempel di <input id="quantity">. BasePrice untuk mendapatkan harga 1 product*/
    var totalPrice = qty * basePrice;
    var totalPriceElement = document.getElementById('total-price');
    totalPriceElement.innerHTML = formatRupiah(totalPrice); // &nbsp; spasi yang dianggap benar oleh browser, tidak dihapus. Karena ada beberapa hal seperti styling pakai CSS, misalnya text-align: right;, atau ada padding/margin tertentu, maka spasi satu karakter kayak ' ' di HTML nggak akan kelihatan secara visual. HTML dan CSS itu "mengabaikan" spasi kecil kayak gitu dalam tampilan. HTML juga kadang memperlakukan beberapa spasi sebagai satu spasi saja.

    /* 
     Ambil elemen input dulu:
     document.getElementById('quantity')
     Ambil data-harga dari elemen itu:
     .getAttribute('data-harga')
     Convert ke angka:
     parseInt(...)
     Kaliin sama jumlah quantity.*/
}

function formatRupiah(angka) {
    return 'Rp ' + angka.toLocaleString('id-ID', {
        minimumFractionDigits: 0
    });
}

// minimumFractionDigits: 0 artinya tidak perlu desimal kayak ,00.
// .toLocaleString(...)	Ini method bawaan JavaScript buat format angka jadi string sesuai lokal negara
// 'id-ID' Artinya format Indonesia (jadi pakai titik untuk ribuan, koma untuk desimal)
// { style: 'currency', currency: 'IDR' }	Mau gaya mata uang (currency) dan kode mata uangnya Rupiah (IDR)


function decreaseQuantity() {
    var qty = document.getElementById('quantity');
    if (parseInt(qty.value) > 1) {
        qty.value--;
        updateButtons();
        updatePrice();
    }
    return false; // Supaya tombol ini tidak menyebabkan form reload/submit. return false ipakai buat menghentikan aksi default dari button <button>. Kalau  klik <button> di dalam <form>, secara default browser akan submit form
}

function increaseQuantity() {
    var qty = document.getElementById('quantity');
    var stock = (qty.getAttribute('data-stok')); //getAttribute() itu hasilnya selalu string (teks). Misal "10" — itu string "sepuluh", bukan angka.stock itu bukan stock.value, karena getAttribute langsung dapet isiannya (tinggal parseInt()).
    if (parseInt(qty.value) < parseInt(stock)) { //  paksa ubah ke angka pakai parseInt()
        qty.value++;
        updateButtons();
        updatePrice();
    }
    return false;
}

// Pas awal load halaman, update dulu tombolnya
window.onload = function () {
    updateButtons();
}