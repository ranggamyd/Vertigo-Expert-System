<div class="section-body">
   <div class="card card-primary">
      <div class="card-header">
         <h4>Tambah Gejala</h4>
      </div>
      <form action="" method="post">
         <div class="card-body">
            <div class="form-group">
               <label for="kode_gejala">Kode Gejala</label>
               <input type="text" class="form-control" name="kode_gejala" value="<?= $kode_gejala ?>" required>
            </div>
            <div class="form-group">
               <label for="nama_gejala">Nama Gejala</label>
               <input type="text" class="form-control" name="nama_gejala" value="<?= $nama_gejala ?>" required>
            </div>
            <div class="form-group">
               <label for="nama">Bobot</label>
               <input type="number" step="0.1" class="form-control" id="bobot" name="bobot" placeholder="Masukkan Bobot" value="0">
            </div>
         </div>
         <div class="card-footer text-right">
            <a href="<?= base_url('admin/gejala'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan</button>
         </div>
      </form>
   </div>
</div>