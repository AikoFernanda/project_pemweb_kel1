 <h2>Profil Saya</h2>
 <p>Kelola informasi profil Anda untuk mengontrol dan mengamankan akun</p>
 <form id="formProfil" class="profile-form" action="<?= base_url('index.php/Home/updateProfil') ?>" method="POST" enctype="multipart/form-data">
     <div class="form-group">
         <label for="nama_lengkap">Nama Lengkap</label>
         <input id="nama_lengkap" type="text" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
     </div>
     <div class="form-group">
         <label for="no_hp">No. Telepon</label>
         <input id="no_hp" type="tel" name="no_hp" value="<?= $user['no_hp']; ?>">
     </div>
     <div class="form-group">
         <label for="tanggal_lahir">Tanggal Lahir</label>
         <input id="tanggal_lahir" type="date" name="tanggal_lahir" value="<?= $user['tanggal_lahir']; ?>">
     </div>
     <div class="form-group">
         <label for="alamat">Alamat</label>
         <input id="alamat" type="text" name="alamat" value="<?= $user['alamat']; ?>">
     </div>
     <div class="form-group">
         <label>Jenis Kelamin</label>
         <div class="radio-group">
             <label><input type="radio" name="jenis_kelamin" value="L" <?= $user['jenis_kelamin'] === 'L' ? 'checked' : '' ?>> Laki-laki</label> <!--Gunakan checked untuk radio button (bukan selected, itu buat <option>), dan jangan lupa echo-->
             <label><input type="radio" name="jenis_kelamin" value="P" <?= $user['jenis_kelamin'] === 'P' ? 'checked' : '' ?>> Perempuan</label>
         </div>
     </div>
     <div class="form-group">
         <label>Upload Foto: (jpeg/jpg/png)</label>
         <input type="file" name="foto">
     </div>
     <button type="submit" class="btn-submit">Simpan Perubahan</button>
 </form>