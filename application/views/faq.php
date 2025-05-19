<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
       <!-- Google Font -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">

<!-- ikon user, Font Awesome (paling umum & gampang). Tambahin link CDN di <head> HTML:-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style_faq.css?v=' . time()); ?>">

    
</head>
<body>



<header>
        <div class="container main-header">
            <div class="logo-header">
                <img src="<?= base_url('assets/img/logo_company.jpeg'); ?>" alt="Logo">
                <h1>CV. MULIA LANGGENG MUFAKAT</h1>
            </div>
            <div class="navigasi-header">
                <a href="<?= base_url('index.php/Home/index') ?>">Home</a>
                <a href="<?= base_url('index.php/Home/produk'); ?>">Produk</a>
                <a href="<?= base_url('index.php/Home/layanan'); ?>">Layanan</a>
                <a href="<?= base_url('index.php/Home/tentangKami'); ?>">Tentang Kami</a>
            </div>
            <?php if ($this->session->userdata('logged_in')) : ?>
                <div class="login-register">
                    <a class="ikon-keranjang" href="<?= base_url('index.php/Katalog_produk/keranjang'); ?>">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <a class="ikon-profil" href="<?= base_url('index.php/Home/profil'); ?>">
                        <i class="fas fa-user"></i>
                    </a> <!-- Ikon user -->
                </div>
            <?php else : ?>
                <div id="btn-login-register" class="login-register">
                    <button type="button" class="btn-login" onclick="toggleLoginModal()">Login</button> <!--onclick, ini adalah event handler. Saat pengguna mengklik elemen ini, maka akan memanggil fungsi JavaScript bernama closeLoginModal() yang berfungsi untuk membuka modal login yang berdisplay none(disembunyikan) ke block-->
                    <button type="button" class="btn-signup" onclick="window.location.href='<?= base_url('index.php/Signup_login_control/signup'); ?>'">Sign Up</button>
                </div>
            <?php endif; ?>

        </div>
    </header>


    <section class="container" style="margin-top: 60px;">
      

<img src="<?= base_url('assets/img/faq_img.png'); ?>" alt="question" class="faq-image"/>
        <h1 style="font-size: 50px; margin-bottom: 20px; text-align: center;">FAQ</h1>
        <section class="faq-section container">
   
</section>


    </section>

    <div class="faq-container">
    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">01</span>
        <span class="faq-question">	Bagaimana cara melakukan pemesanan?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Proses pemesanan biasanya dimulai dengan memilih produk, menambahkan ke keranjang belanja, memeriksa detail pesanan, 
        mengisi informasi pengiriman dan penagihan, memilih metode pembayaran, dan menyelesaikan pembayaran. </div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">02</span>
        <span class="faq-question">Apakah pesanan saya berhasil?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Setelah pembayaran selesai, biasanya akan ada konfirmasi pesanan melalui email atau notifikasi di aplikasi toko online. </div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">03</span>
        <span class="faq-question">Apa yang harus saya lakukan jika saya kesulitan menempatkan pesanan?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Jika mengalami kesulitan, hubungi customer service toko online atau periksa panduan belanja yang tersedia. .</div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">04</span>
        <span class="faq-question">Saya lupa menambahkan item ke pesanan saya. Bisakah saya menambahkannya ke pesanan yang ada atau harus saya tempatkan pesanan kedua?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Beberapa toko online memungkinkan penambahan item ke pesanan yang ada, namun ada juga yang mengharuskan pemesanan baru, tergantung kebijakan toko. </div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">05</span>
        <span class="faq-question">Bisakah saya mengubah atau membatalkan pesanan saya?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Kebijakan pembatalan dan perubahan pesanan bervariasi di setiap toko. 
        Beberapa toko memungkinkan pembatalan atau perubahan sebelum pesanan diproses, sementara yang lain tidak.</div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">06</span>
        <span class="faq-question">Bisakah saya melakukan pembelian melalui telepon?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Beberapa toko online juga menyediakan layanan pembelian melalui telepon, namun tidak semua. </div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">07</span>
        <span class="faq-question">Metode pembayaran apa yang tersedia?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Metode pembayaran bervariasi, mulai dari kartu kredit, transfer bank, hingga pembayaran tunai (COD).</div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">08</span>
        <span class="faq-question">Bagaimana cara mengecek status pesanan saya?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Status pesanan biasanya dapat dicek melalui akun toko online atau melalui email konfirmasi pesanan. </div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">09</span>
        <span class="faq-question">Apakah barang yang sudah dibeli bisa dikembalikan?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Kebijakan pengembalian bervariasi di setiap toko, 
        namun sebagian besar tidak menerima pengembalian barang yang sudah dibeli jika barang dalam kondisi baik dan tidak cacat. </div>
    </div>

    <div class="faq-item">
      <div class="faq-header">
        <span class="faq-number">10</span>
        <span class="faq-question">Apakah ada garansi untuk produk yang dibeli?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">Ada beberapa produk menyediakan garansi untuk produk tertentu, namun tidak semua. </div>
    </div>


    <!-- Tambah item lainnya sesuai kebutuhan -->
  </div>

  <script>
    // === JavaScript untuk toggle pertanyaan ===
    document.querySelectorAll('.faq-header').forEach(header => {
      header.addEventListener('click', () => {
        const answer = header.nextElementSibling; // Ambil elemen jawaban setelah header
        const toggle = header.querySelector('.faq-toggle'); // Ambil elemen +/− dalam header
        const isVisible = answer.style.display === 'block'; // Cek apakah jawaban sedang tampil

        // Sembunyikan semua jawaban lain sebelum tampilkan yang ini
        document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
        document.querySelectorAll('.faq-toggle').forEach(t => t.textContent = '+');

        // Jika belum terlihat, tampilkan
        if (!isVisible) {
          answer.style.display = 'block'; // Tampilkan jawaban
          toggle.textContent = '−'; // Ganti ikon jadi minus
        }
      });
    });
  </script>


<footer>
        <section id="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>Tentang Kami</h3>
                        <p>CV. Mulia Langgeng Mufakat</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="footer-column">
                        <h3>Kategori Produk</h3>
                        <ul class="footer-links">
                            <li><a href="#">Laptop & Notebook</a></li>
                            <li><a href="#">Printer</a></li>
                            <li><a href="#">AC</a></li>
                            <li><a href="#">Aksesoris</a></li>
                            <li><a href="#">Lainnya</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Informasi</h3>
                        <ul class="footer-links">
                            <li><a href="tentangKami">Tentang Kami</a></li>
                            <li><a href="caraPembelian">Cara Pembelian</a></li>
                            <li><a href="kebijakanPrivasi">Kebijakan Privasi</a></li>
                            <li><a href="syaratKetentuan">Syarat & Ketentuan</a></li>
                            <li><a href="faq">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Kontak Kami</h3>
                        <p><i class="fas fa-map-marker-alt"></i> Jl. Poskeskel, Desa Mulyojati Kec. Metro Barat Kota Metro</p>
                        <p><i class="fas fa-phone"></i> +62 823-7459-1985</p>
                        <p><i class="fas fa-envelope"></i> mulamufakat@gmail.com</p>
                    </div>
                </div>
                <div class="copyright">
                    &copy; 2025 CV. Mulia Langgeng Mufakat — All rights reserved.
                </div>
            </div>
    </footer>

    


</body>
</html>
