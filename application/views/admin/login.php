<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="<?= base_url('assets/'); ?>assets/img/vertigo.jpg" rel="icon">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Login_Vertigo</title>
   <link href="<?php echo base_url('vendor/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
   <link href="/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link href="<?php echo base_url('vendor/admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="card o-hidden border-1 shadow-lg my-5">
               <div class="card-body p-0">
                  <div class="row">
                     <div class="col">
                        <div class="p-5">
                           <div class="text-center">
                              <h1 class="text-primary mb-5">LOGIN ADMIN</h1>
                           </div>
                           <form class="user" action="" method="post">
                              <?php if ($this->session->flashdata('message_login_error')) : ?>
                                 <div class="invalid-feedback">
                                    <?= $this->session->flashdata('message_login_error') ?>
                                 </div>
                              <?php endif ?>
                              <div class="form-group">
                                 <input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?> form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" value="<?= set_value('username') ?>">
                                 <?= form_error('username') ?>
                              </div>
                              <div class="form-group">
                                 <input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?> form-control form-control-user" id="exampleInputPassword" placeholder="Password" value="<?= set_value('password') ?>">
                                 <?= form_error('password') ?>
                              </div>
                              <button type="submit" class="btn btn-primary btn-user btn-block">
                                 Login
                              </button>
                              <hr>
                           </form>
                           <hr>
                        </div>
                     </div>
                     <!-- <div class="col-lg-6">
                        <img src="<?= base_url('assets/'); ?>assets/img/vertigo.jpg" alt="gambar ">
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="<?php echo base_url('vendor/admin/vendor/jquery/jquery.min.js'); ?>"></script>
      <script src="<?php echo base_url('vendor/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

      <script src="<?php echo base_url('vendor/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

      <script src="<?php echo base_url('vendor/admin/js/sb-admin-2.min.js'); ?>"></script>

      <?php if (isset($error)) {
         echo $error;
      } ?>

</body>

</html>