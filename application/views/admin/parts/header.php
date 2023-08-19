 <!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?= base_url('assets/'); ?>assets/img/vertigo.jpg" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?> - Dashboard Admin</title>
    <link href="<?php echo base_url('vendor/admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('vendor/admin/'); ?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url('vendor/admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="   https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/admin/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">
    <script type="text/javascript">
       function deleteConfirmation() {
          return confirm('<?php echo DELETE_ALERT; ?>');
       }
    </script>
 </head>

 <body id="page-top">
    <div id="wrapper">
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
             <div class="sidebar-brand-icon">
                <i class="fas fa-stethoscope"></i>
             </div>
             <div class="sidebar-brand-text mx-3">SP Vertigo<sup></sup></div>
          </a>
          <hr class="sidebar-divider my-0">
          <li class="nav-item active">
             <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
          </li>
          <hr class="sidebar-divider">
          <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url('admin/kategori'); ?>">
                <i class="fa fa-address-book"></i>
                <span>Kategori Penyakit</span></a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url('admin/penyakit'); ?>">
                <i class="fas fa-medkit"></i>
                <span>Penyakit (Cases)</span></a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url('admin/gejala'); ?>">
                <i class="fas fa-plus-square"></i>
                <span>Gejala (Rules)</span></a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url('admin/diagnosa'); ?>">
                <i class="fas fa-users"></i>
                <span>Hasil Diagnosa</span></a>
          </li>
          <hr class="sidebar-divider">
          <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url('admin/akun') ?>">
                <i class="fas fa-user"></i>
                <span>Pengguna</span></a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?php echo base_url('admin/akun/edit/') . $this->session->userdata('admin_id'); ?>">
                <i class="fas fa-address-card"></i>
                <span>Edit Profil</span></a>
          </li>
          <hr class="sidebar-divider d-none d-md-block">
          <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
       </ul>
       <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                   <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                   <li class="nav-item dropdown no-arrow d-sm-none">
                      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-search fa-fw"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                         <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                               <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                               <div class="input-group-append">
                                  <button class="btn btn-primary" type="button">
                                     <i class="fas fa-search fa-sm"></i>
                                  </button>
                               </div>
                            </div>
                         </form>
                      </div>
                   </li>
                   <div class="topbar-divider d-none d-sm-block"></div>
                   <li class="nav-item dropdown no-arrow">
                      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user->nama ?></span>
                         <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>assets/img/vertigo.jpg">
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                         </a>
                      </div>
                   </li>

                </ul>

             </nav>
             <div class="container-fluid">
                <?php
                  $sukkses = $this->session->flashdata('sukses');
                  $fail = $this->session->flashdata('fail');

                  if ($sukkses) {
                  ?>
                   <div class="alert alert-success" role="alert">
                      <?= $sukkses ?>
                   </div>
                <?php
                  }
                  if ($fail) {
                  ?>

                   <div class="alert alert-danger" role="alert">
                      <?= $fail ?>
                   </div>
                <?php
                  }
                  ?>