<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>Sistem Pakar Diagnosa Penyakit Vertigo</title>
   <meta content="" name="description">
   <meta content="" name="keywords">
   <link href="<?= base_url('assets/assets/img/vertigo.jpg'); ?>" rel="icon">
   <link href="<?= base_url('assets/assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">
   <link href="/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href="<?= base_url('assets/assets/vendor/aos/aos.css'); ?>" rel="stylesheet">
   <link href="<?= base_url('assets/assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
   <link href="<?= base_url('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
   <link href="<?= base_url('assets/assets/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
   <link href="<?= base_url('assets/assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
   <link href="<?= base_url('assets/assets/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
   <link href="<?= base_url('assets/assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
   <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
         <a href="<?php echo base_url('home'); ?>" class="logo d-flex align-items-center">
            <img src="<?= base_url('assets/'); ?>assets/img/logo.png" alt="">
            <span>SP VERTIGO</span>
         </a>
         <nav id="navbar" class="navbar">
            <ul>
               <li><a class="nav-link scrollto" href="<?php echo base_url('home'); ?>">Home</a></li>
               <li><a class="nav-link scrollto" href="<?php echo base_url('diagnosa'); ?>">Diagnosa</a></li>
               <li><a class="nav-link scrollto" href="<?php echo base_url('info_penyakit'); ?>">Informasi Penyakit</a></li>
               <li><a class="nav-link scrollto" href="<?php echo base_url('about'); ?>">Tentang</a></li>
               <?php if (!$this->session->userdata('admin_id')) { ?>
                  <li><a class="getstarted scrollto" href="<?php echo base_url('auth/login'); ?>">Sign in</a></li>
               <?php } else { ?>
                  <li><a class="getstarted scrollto" href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>
               <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
         </nav>
      </div>
   </header>

   <div class="container mb-5"></div>