<div class="section-body">
   <div class="card card-primary">
      <div class="card-header">
         <h4>Edit Kategori</h4>
      </div>
      <form action="" method="post">

         <div class="card-body">
            <div class="form-group">
               <label for="gambar">Kode Kategori</label>
               <input type="text" class="form-control" name="kode_kategori" value="<?= $kode_kategori ?>" required>
            </div>
            <div class="form-group">
               <label for="nama">Nama Kategori</label>
               <input type="text" class="form-control" id=" nama" name="nama_kategori" value="<?= $nama_kategori ?>" placeholder="Masukkan Nama Penyakit" autocomplete="off" required>
            </div>
            <div class="form-group">
               <label for="deskripsi">Deskripsi</label>
               <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= $deskripsi ?></textarea>
            </div>
         </div>
         <div class="card-footer text-right">
            <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan</button>
         </div>
      </form>
   </div>
</div>