<div class="section-body">
   <div class="card card-primary">
      <div class="card-header">
         <h4>Tambah Penyakit</h4>
      </div>
      <form action="" method="post">

         <div class="card-body">
            <div class="form-group">
               <label for="kode_penyakit">Kode Penyakit</label>
               <input type="text" class="form-control" name="kode_penyakit" value="<?= $kode_penyakit ?>" required>
            </div>
            <div class="form-group">
               <label for="nama_penyakit">Nama penyakit</label>
               <input type="text" class="form-control r" id=" nama" name="nama_penyakit" value="<?= $nama_penyakit ?>" required placeholder="Masukkan Nama Penyakit" autocomplete="off">
            </div>
            <div class="form-group">
               <label for="kategori">Pilih Kategori</label>
               <select class="form-control" name="kategori" id="kategori" required>
                  <?php foreach ($data_kategori as $_kategori) { ?>
                     <option value="<?= $_kategori->id ?>"><?= $_kategori->nama_kategori ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group">
               <label for="deskripsi">Deskripsi</label>
               <textarea name="deskripsi" id="deskripsi" class="form-control" value="<?= $deskripsi ?>" required></textarea>
            </div>
            <div class="form-group">
               <label for="solusi">Solusi</label>
               <textarea name="solusi" id="solusi" class="form-control" value="<?= $solusi ?>" required></textarea>
            </div>
            <?php foreach ($data_gejala as $_gejala) { ?>
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="gejala[]" value="<?= $_gejala->id ?>" id="gejala_<?= $_gejala->id ?>">
                  <label class="form-check-label" for="gejala_<?= $_gejala->id ?>">
                     <?= $_gejala->nama_gejala ?>
                  </label>
               </div>
            <?php } ?>
         </div>
         <div class="card-footer text-right">
            <a href="<?= base_url('admin/penyakit'); ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Simpan</button>
         </div>
      </form>
   </div>
</div>