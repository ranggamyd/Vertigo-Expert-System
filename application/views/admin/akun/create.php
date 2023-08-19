<section class="section">
   <div class="section-body">
      <div class="card card-primary">
         <div class="card-header">
            <h4>Tambah Akun</h4>
         </div>
         <form action="" method="post">
            <div class="card-body">
               <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="nama" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="<?= $nama ?>" required>
               </div>
               <div class="form-group">
                  <label for="jk">Jenis Kelamin</label>
                  <select name="jk" class="form-control" id="jk" required>
                     <option value="laki-laki" <?= $jk == 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                     <option value="perempuan" <?= $jk == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                     <option value="lainnya" <?= $jk == 'lainnya' ? 'selected' : '' ?>>Lainnya</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" class="form-control" id="alamat" required><?= $alamat ?></textarea>
               </div>
               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="username" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Masukkan username" value="<?= $username ?>" required>
                  <div class="invalid-feedbac">
                     <?= form_error('username') ?>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?= $password ?>" required>
                     </div>
                  </div>
               </div>
               <div class="card-footer text-right">
                  <a href="<?= base_url('admin/akun'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                  <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan</button>
               </div>
         </form>
      </div>
   </div>
</section>