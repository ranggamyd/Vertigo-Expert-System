<section id="hero" class="hero d-flex align-items-center">
   <div class="container">
      <div class="row mt-3">
         <div class="container">
            <h3 class="text-center fw-bold text-primary mb-3">DIAGNOSA PENYAKIT VERTIGO</h3>
            <div class="card shadow-sm">
               <form action="" method="post">
                  <div class="card-body">
                     <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap anda .." value="<?= $nama ?>">
                     </div>
                     <div class="form-group">
                        <label class="pb-2">Jenis kelamin</label>
                        <div class="row pb-1">
                           <div class="col-2">
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="laki-laki">
                                 <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                              </div>
                           </div>
                           <div class="col-3">
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="jk" id="perempuan" value="perempuan">
                                 <label class="form-check-label" for="perempuan">Perempuan</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" cols="15" rows="5" placeholder="Masukkan alamat lengkap anda .."><?= $alamat ?></textarea>
                     </div>
                  </div>
                  <div class="card-footer" style="text-align: center;">
                     <a href="<?php echo base_url('home'); ?>" class="btn btn-danger btn-md">Kembali</a>
                     <button type="submit" class="btn btn-primary btn-md" id="mulai">Mulai Diagnosa</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>