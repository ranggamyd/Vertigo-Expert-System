<div class="section-body">
   <div class="card">
      <div class="card-header">
         <h4>Daftar Diagnosa</h4>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-striped table-bordered display" id="dataTable">
               <thead>
                  <tr">
                     <th>No</th>
                     <th>Tanggal</th>
                     <th>Nama</th>
                     <th>Jenis Kelamin</th>
                     <th>Alamat</th>
                     <th>Penyakit</th>
                     <th>Presentase</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $index = 1 ?>
                  <?php foreach ($data as $_data) { ?>
                     <tr>
                        <th class="text-center"><?= $index ++ ?></th>
                        <td class="text-center"><?= date('d M Y', strtotime($_data['tanggal'])) ?></td>
                        <td><?= $_data['nama'] ?></td>
                        <td class="text-center"><?= $_data['JK'] ?></td>
                        <td><?= $_data['alamat'] ?></td>
                        <td><?= $_data['nama_penyakit'] ?></td>
                        <td class="text-center"><?= $_data['presentase'] ?>%</td>
                     </tr>
                  <?php
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>