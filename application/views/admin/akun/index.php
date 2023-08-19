    <section class="section">
       <div class="section-body">
          <h3>Daftar Akun </h3>
          <div class="card shadow">
             <div class="card-header">
                <div class="card-header-action">
                   <a href="<?php echo base_url('admin/akun/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i>
                      Tambah
                   </a>
                </div>
             </div>
             <div class="card-body">
                <div class="table-responsive">
                   <table class="table table-striped" id="tabel">
                      <thead class="text-center">
                         <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                         </tr>
                      </thead>
                      <tbody>
                         <?php foreach ($data as $index => $_data) {
                           ?>
                            <tr>
                               <th class="text-center"><?= $index + 1 ?></th>
                               <td><?= $_data->nama ?></td>
                               <td><?= $_data->username ?></td>
                               <td class="text-center"><?= $_data->jk ?></td>
                               <td><?= $_data->alamat ?></td>
                               <td class="text-center">
                                  <a class="btn btn-icon btn-warning btn-sm" href="<?= base_url('admin/akun/edit/' . $_data->id); ?>"><i class="fa fa-edit"></i> Edit</a>
                                  <a href="<?= base_url('admin/akun/delete/' . $_data->id); ?>" onclick="return deleteConfirmation();" class="btn btn-danger btn-sm <?= $_data->id == $user->id ? 'disabled' : '' ?>"><i class="fas fa-trash"></i> Hapus</a>
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
    </section>