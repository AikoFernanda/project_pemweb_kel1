create table akun 
(
	id_akun int auto_increment primary key,
    email varchar(100) not null unique,
    username_akun  varchar(100) not null unique,
    password_akun varchar(255) not null,
    role varchar(30) default 'user',
    status_akun ENUM('1','0') default 1,
    tanggal_daftar timestamp default current_timestamp
);

CREATE TABLE `user` (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    id_akun INT NOT NULL,
    nama_lengkap VARCHAR(100),
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    alamat TEXT,
    foto VARCHAR(50) DEFAULT 'default.jpg' 
    no_hp VARCHAR(20),
    tanggal_lahir DATE,
    FOREIGN KEY (id_akun) REFERENCES akun(id_akun) ON DELETE CASCADE
);

create table produk
(
	id_produk int auto_increment primary key,
    nama_produk varchar(100) not null,
    kategori varchar(100) not null,
    stok INT default 0,
    harga INT not null,
    persentase_diskon INT default 0,
    gambar varchar(100) not null,
    deskripsi varchar(100) default '-',
    terakhir_diubah timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- CREATE TABLE keranjang 
-- (
-- 	id_user INT NOT NULL,
--     id_produk INT NOT NULL,
--     jumlah INT NOT NULL,
--     subtotal INT NOT NULL,
--     update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     PRIMARY KEY (id_user, id_produk),
--     FOREIGN KEY(id_user) REFERENCES `user`(id_user) ON DELETE CASCADE,
--     FOREIGN KEY(id_produk) REFERENCES produk(id_produk) ON DELETE CASCADE
-- );

CREATE TABLE keranjang (
    id_keranjang INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    subtotal INT NOT NULL,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk) ON DELETE CASCADE
);

CREATE TABLE transaksi
(
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    kode_pemesanan VARCHAR(20) NOT NULL unique,
    id_user INT NOT NULL,
    total_transaksi INT NOT NULL,
    status_transaksi ENUM('Lunas', 'Gagal', 'Pending') NOT NULL DEFAULT 'Pending',
    tanggal_transaksi TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_user) REFERENCES user(id_user) ON DELETE CASCADE
);

CREATE TABLE detail_transaksi (
    id_detail_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_transaksi INT NOT NULL,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    subtotal INT NOT NULL,
    FOREIGN KEY (id_transaksi) REFERENCES transaksi(id_transaksi) ON DELETE CASCADE,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk) ON DELETE CASCADE
);

CREATE TABLE jadwal_pengiriman
(
	id_jadwal INT AUTO_INCREMENT,
    id_transaksi INT NOT NULL,
    nama_pemesan VARCHAR(100) NOT NULL,
    alamat_tujuan VARCHAR(100) NOT NULL,
    no_hp_pemesan VARCHAR(13) NOT NULL,
    status_pengiriman ENUM('Sudah Dikirim', 'Belum Dikirim') DEFAULT 'Belum Dikirim',
    tanggal_pengiriman DATETIME DEFAULT NULL,
    PRIMARY KEY(id_jadwal),
    FOREIGN KEY(id_transaksi) REFERENCES transaksi(id_transaksi) ON DELETE CASCADE
);