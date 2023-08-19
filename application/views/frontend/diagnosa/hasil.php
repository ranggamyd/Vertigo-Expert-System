<section id="hero" class="hero" style="height: 100%;">
   <div class="container">
      <h1 class="text-center text-bold">Hasil Diagnosa</h1><br>
      <div class="card-body">
         <div class='alert alert-primary alert-dismissible'>
            <div class="card mb-3">
               <div class="row g-0">
                  <div class="col-md-5" style="background-image: url('<?= base_url('assets/'); ?>assets/img/vertigo.jpg'); background-position: center;">
                  </div>
                  <div class="col-md-7 p-4">
                     <div class="row">
                        <div class="col">
                           <h3>Informasi Pasien</h3>
                           <table>
                              <tr>
                                 <th>Nama</th>
                                 <td style="padding-left: 1rem;">:</td>
                                 <td><?= $pasien->nama ?></td>
                              </tr>
                              <tr>
                                 <th>Jenis Kelamin</th>
                                 <td style="padding-left: 1rem;">:</td>
                                 <td><?= $pasien->JK ?></td>
                              </tr>
                              <tr>
                                 <th>Alamat</th>
                                 <td style="padding-left: 1rem;">:</td>
                                 <td><?= $pasien->alamat ?></td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <div class="alert alert-success mt-3">
                              <h3 class="text-center">Kesimpulan</h3>
                              <?php
                              function sortByPersentase($a, $b)
                              {
                                 return $b->presentase - $a->presentase;
                              }

                              usort($detail_hasil, 'sortByPersentase');

                              $terbesar = $detail_hasil[0]->presentase;

                              $terbesarRecords = [];

                              foreach ($detail_hasil as $record) {
                                 if ($record->presentase == $terbesar) {
                                    $terbesarRecords[] = $record;
                                 }
                              }
                              ?>

                              Hasil diagnosa menunjukkan bahwa penyakit yang anda alami adalah: <br><br>
                              <ul>
                                 <?php
                                 foreach ($terbesarRecords as $record) : ?>
                                    <li>
                                       <b><?= $record->nama_penyakit ?></b> (<?= $record->nama_kategori ?>), sebesar <b><?= round($record->presentase, 2) ?>%</b> <br>
                                       <br><b>Solusi dari penyakit <?= $record->nama_penyakit ?> adalah: <br></b>
                                       <p style="text-align: justify;"><?= $record->solusi ?></p>
                                    </li>
                                 <?php endforeach ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <h3>Kemungkinan lain</h3>
                           <ul>
                              <?php foreach ($detail_hasil as $hasil) { ?>
                                 <li><?= $hasil->nama_penyakit ?> : <?= $hasil->presentase ?>%</li>
                              <?php } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>