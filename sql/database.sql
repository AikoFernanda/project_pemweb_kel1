create table akun 
(
	id_akun int auto_increment primary key,
    email varchar(100) not null unique,
    username_akun  varchar(100) not null unique,
    password_akun varchar(255) not null,
    role varchar(30) default 'user',
    status_akun boolean default 1,
    tanggal_daftar timestamp default current_timestamp
);

CREATE TABLE `user` (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    id_akun INT NOT NULL,
    nama_lengkap VARCHAR(100),
    alamat TEXT,
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