<?php
$sesi = $this->session->userdata('role');
var_dump($sesi); // Cek isi role-nya
if ($sesi !== "admin") {
    redirect('Home/admin');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <header></header>
    <main>
        <div class="welcome">
            <h1>Selamat Datang, Admin!</h1>
            <a href=<?= base_url("index.php/Signup_login_control/logout") ?>>Logout</a>
        </div>
        <div>
            <h2>Data Akun Pengguna</h2>
            <table border="1px" cellpadding="10px" cellspacing="0">
                <tr>
                    <th>no.</th>
                    <th>id_akun</th>
                    <th>email</th>
                    <th>username_akun</th>
                    <th>password_akun</th>
                    <th>role</th>
                    <th>status_akun</th>
                    <th>tanggal_daftar</th>
                    <th>aksi</th>
                </tr>
                <?php $nomor = 1 ?>
                <?php foreach ($akun as $a) : ?> <!--$akun adalah nama variabel yang sudah ditentukan di controller untuk menyimpan data akun. $akun adalah nama variabel yang menyimpan hasil query yang diambil dari database ($data['akun']), yang sudah kita definisikan sebelumnya di controller.-->
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $a->id_akun ?></td>
                        <td><?= $a->email ?></td>
                        <td><?= $a->username_akun ?></td>
                        <td><?= $a->password_akun ?></td>
                        <td><?= $a->role ?></td>
                        <td><?= $a->status_akun ?></td>
                        <td><?= $a->tanggal_daftar ?></td>
                        <td>
                            <button class="btn-edit" name="edit">Edit</button>
                            <button class="btn-hapus" name="hapus">Hapus</button>
                        </td>
                    </tr>
                    <?php $nomor+=1 ?>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
    <footer></footer>
</body>

</html>