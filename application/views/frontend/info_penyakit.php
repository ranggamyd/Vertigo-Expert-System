<section id="values" class="values">
   <div class="container" data-aos="fade-up">
      <header class="section-header">
         <p>Sistem Pakar Diagnosa Penyakit Vertigo</p>
         <p>Metode Certainty Factor (CF)</p>
      </header>
      <div class="row">
         <?php $cats = $this->db->get('kategori')->result_array(); ?>
         <?php foreach ($cats as $cat) : ?>
            <div class="col-6" data-aos="fade-up" data-aos-delay="0">
               <div class="box"">
                  <img src=" <?= base_url('assets/'); ?>assets/img/vertigo.jpg" class="img-fluid" alt="">
                  <h3><?= $cat['nama_kategori'] ?></h3>
                  <p style="text-align: justify;"><?= $cat['deskripsi'] ?></p>
               </div>
            </div>
         <?php endforeach ?>
      </div>
      <div class="row p-5">
         <?php foreach ($cats as $cat) : ?>
            <?php $cases = $this->db->get_where('penyakit', ['id_kategori' => $cat['id']])->result_array(); ?>
            <?php foreach ($cases as $case) : ?>
               <div class="col-12 mb-3" data-aos="fade-up" data-aos-delay="0">
                  <div class="card shadow-sm">
                     <h5 class="card-header">Kategori: <?= $cat['nama_kategori'] ?></h5>
                     <div class="card-body">
                        <h5 class="card-title"><?= $case['nama_penyakit'] ?></h5>
                        <p class="card-text"><?= $case['deskripsi'] ?></p>
                        <h5 class="card-title">Gejala yang dialami penyakit <?= $case['nama_penyakit'] ?></h5>
                        <?php $this->db->join('gejala', 'gejala.id = penyakit_gejala.id_gejala', 'left'); ?>
                        <?php $rules = $this->db->get_where('penyakit_gejala', ['id_penyakit' => $case['id']])->result_array(); ?>
                        <ul>
                           <?php foreach ($rules as $rule) : ?>
                              <li><?= $rule['nama_gejala'] ?></li>
                           <?php endforeach ?>
                        </ul>
                        <h5 class="card-title">Solusi</h5>
                        <p class="card-text"><?= $case['solusi'] ?></p>
                     </div>
                  </div>
               </div>
            <?php endforeach ?>
         <?php endforeach ?>
      </div>
   </div>
</section>