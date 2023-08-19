<Section class="section">
   <div class="section-header">
      <h1>Gejala</h1>
   </div>
   <div class="section-body">
      <div class="card shadow">
         <div class="card-header">
            <a href="<?php echo base_url('admin/gejala/create'); ?>" class="btn btn-primary"><i class="fa fa-plus" style=""></i> Tambah Gejala</a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-striped table-bordered" id="tabel">
                  <thead class="text-center">
                     <tr>
                        <th>No</th>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($data as $index => $_data) {
                     ?>
                        <tr>
                           <th class="text-center"><?= $index + 1 ?></th>
                           <td class="text-center"><?= $_data->kode_gejala ?></td>
                           <td><?= $_data->nama_gejala ?></td>
                           <td class="text-center"><?= $_data->bobot ?></td>
                           <td class="text-center">
                              <a class="btn btn-icon btn-warning btn-sm" href="<?= base_url('admin/gejala/edit/' . $_data->id); ?>"><i class="fa fa-edit"></i> Edit</a>
                              <a href="<?= base_url('admin/gejala/delete/' . $_data->id); ?>" onclick="return deleteConfirmation();" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                           </td>
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
</Section>