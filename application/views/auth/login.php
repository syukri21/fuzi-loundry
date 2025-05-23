<?php 
  $dataSetting = $this->db->get('order_setting')->result();
  $setting = null;
  foreach ($dataSetting as $value) {
    $setting = $value;
  }
 ?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div><a class="logo" href="<?php echo base_url(); ?>"><img class="img-fluid for-light" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form" id="form_login" action="javascript:;">
                  <h4>Masuk ke akun Anda</h4>
                  <p>Masukkan email dan password anda.</p>
                  <div class="form-group">
                    <label class="col-form-label">Email</label>
                    <input name="email" class="form-control" type="email" required="" placeholder="Test@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password" required="" placeholder="*********">
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Remember password</label>
                    </div>
                    <!-- <a class="link" href="forget-password.html">Forgot password?</a> -->
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                  </div>
                  <h6 class="text-muted mt-4 or">Pendaftaran </h6>
                  <!-- <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div> -->
                  <p class="mt-4 mb-0 text-center">Belum punya akun?<a class="ms-2" href="<?php echo base_url('register'); ?>">Buat Akun</a></p> 
                </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $this->load->view('layout/loader'); ?>
      <!-- latest jquery-->
      <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather-icon.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/notify/bootstrap-notify.min.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url(); ?>assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used-->

      <script type="text/javascript">
        'use strict'; 
        const base_url = '<?php echo base_url(); ?>'
        const notifOpt = {
          type: 'theme',
          allow_dismiss: true,
          delay: 2000,
          showProgressbar: true,
          timer: 300,
          animate:{
            enter:'animated fadeInDown',
            exit:'animated fadeOutUp'
          }
        }

        $("#form_login").submit(function () {
          $.ajax({
            url: base_url+'login_act',
            type:'post',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
              $('.loader-wrapper').fadeIn('slow', function () {}); 
            },
            success: function(res) { 
              if(res.status) {
                if(res.level == 'Admin') {
                  window.location.href = base_url+'admin-dashboard'
                } else if(res.level == 'Kurir') {
                  window.location.href = base_url+'kurir-dashboard'
                } else if(res.level == 'Kasir') {
                  window.location.href = base_url+'kasir-dashboard'
                } else if(res.level == 'Washing') {
                  window.location.href = base_url+'washing-dashboard'
                } else if(res.level == 'Pelanggan') {
                  window.location.href = base_url+'pelanggan-dashboard'
                } else {}
              }

              if(res.status == 'invalid_email') {
                $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Email tidak terdaftar', notifOpt)
              }
              if(res.status == 'invalid_password') {
                $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Password tidak cocok', notifOpt)
              }
            },
          }).done(function function_name() {
            $('.loader-wrapper').fadeOut('slow', function () {}); 
          })
        })
      </script>
    </div>
  </body>
</html>