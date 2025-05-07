// // membuat function untuk modal login pada homepage
// function toggleLoginModal() {
//     const modal = document.getElementById('login-modal'); // Mengambil elemen HTML dengan id="login-modal".
//     if(modal.style.display === "block") { // jika class modal memiliki style dengan properti displaynya block
//         modal.style.display = "none"; // ubah displaynya dengan value none
//     } else {
//         modal.style.display = "block"; // ubah displaynya dengan value block
//     }

//     // ketika if(modal.style.display === "none"), aga janggal harus diklik 2 kali, baru muncul modal login, solusi sekarang agar berhasil adalah kondisinya ketika block bukan none.
// }

function toggleLoginModal() {
    const modal = document.getElementById('login-modal');
    modal.classList.toggle('active'); // Tambah/hapus class .active untuk kontrol tampilan
}
