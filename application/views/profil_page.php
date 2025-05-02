<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - CV. MULIA LANGGENG MUFAKAT</title>
</head>

<body>
    <header></header>
    <main><a href="<?= base_url('index.php/Signup_login_control/logout'); ?>">
            <button class="btn-logout">Logout</button>
        </a></main>
        <a href="<?= base_url($this->session->userdata('location')); ?>">Kembali</a> <!--Jadi back sesuai sesi menyimpan page terakhir pada key sesi 'location'-->
    <footer></footer>
</body>

</html>