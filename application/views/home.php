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
    <title>Home | Aplikasi Laundry</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/owlcarousel.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css">
  </head>
  <body class="landing-page">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start            -->
      <div class="landing-home">
        <ul class="decoration">
          <li class="one"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/landing/decore/1.png" alt=""></li>
          <li class="two"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/landing/decore/2.png" alt=""></li>
          <li class="three"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/landing/decore/4.png" alt=""></li>
          <li class="four"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/landing/decore/3.png" alt=""></li>
          <li class="five"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/landing/2.png" alt=""></li>
          <li class="six"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/landing/decore/cloud.png" alt=""></li>
          <li class="seven"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/landing/2.png" alt=""></li>
        </ul>
        <div class="container-fluid">
          <div class="sticky-header">
            <header>                       
              <nav class="navbar navbar-b navbar-trans navbar-expand-xl fixed-top nav-padding" id="sidebar-menu"><a class="navbar-brand p-0" href="#"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt=""></a>
                <button class="navbar-toggler navabr_btn-set custom_nav" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
                <div class="navbar-collapse justify-content-end collapse hidenav" id="navbarDefault">
                  <ul class="navbar-nav navbar_nav_modify" id="scroll-spy">
                    <li class="nav-item buy-btn"><a class="nav-link js-scroll" href="<?php echo base_url('login'); ?>" >Login</a></li>
                  </ul>
                </div>
              </nav>
            </header>
          </div>
          <div class="row">
            <div class="col-xl-5 col-lg-6">
              <div class="content">
                <div>
                  <h1 class="wow fadeIn">Combes </h1>
                  <h1 class="wow fadeIn">Laundry</h1>
                  <h2 class="txt-secondary wow fadeIn">Pelayanan Mudah, Cepat & Bersih</h2>
                  <div class="btn-grp mt-4"><a class="btn btn-pill btn-primary btn-air-primary btn-lg me-3 wow pulse" style="margin-top: 16%;" href="<?php echo base_url('login'); ?>"> Masuk <i class="icofont icofont-arrow-right"></i></a> </div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-6">                 
              <div class="wow fadeIn"><img class="screen1" src="<?php echo base_url(); ?>assets/images/landing/screen1.jpg" alt=""></div>
              <div class="wow fadeIn"><img class="screen2" src="<?php echo base_url(); ?>assets/images/landing/screen2.jpg" alt=""></div>
            </div>
          </div>
        </div>
      </div>

      <?php $this->load->view('layout/loader'); ?>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="<?php echo base_url(); ?>assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo base_url(); ?>assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/tooltip-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/animation/wow/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/landing_sticky.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/landing.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/notify/bootstrap-notify.min.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script type="text/javascript">
      const base_url = '<?php echo base_url(); ?>'
      const notifOpt = {
        type: 'theme',
        allow_dismiss: true,
        delay: 3000,
        showProgressbar: true,
        timer: 300,
        animate:{
          enter:'animated fadeInDown',
          exit:'animated fadeOutUp'
        }
      } 

      $("#form_cari").submit(function () {
        var order_id = $("#order_id").val()
        if(order_id == '' || order_id == null) {
          $.notify('<i class="fa fa-remove"></i><strong>Error</strong> order id tidak boleh kosong', notifOpt)    
        } else {
          $.ajax({
            url: base_url+'getOrderById/'+order_id,
            type: 'get',
            dataType: 'json',
            beforeSend: function () {
              $('.loader-wrapper').fadeIn('slow', function () {}); 
            },
            success: function (res) { 
              if(res.length == 0) {
                $("#collapseicon").collapse('hide') 
                $.notify('<i class="fa fa-search"></i><strong>Hasil Pencarian</strong> order id tidak ditemukan', notifOpt)
              } else {
                $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> order id ditemukan', notifOpt)
                $.each(res, function (i, value) {
                  let status_pembayaran = ``
                  if(value.status_pembayaran == 'settlement') {
                    status_pembayaran = `
                      <span class="badge badge-primary">Sudah Bayar</span>
                    `
                  } else {
                    status_pembayaran = `
                      <span class="badge badge-secondary">Belum Bayar</span>
                    `
                  }

                  let kategori_order = ``
                  if(value.kategori_order == 'online') {
                    kategori_order = `
                      <span class="badge badge-success">Online</span>
                    `
                  } else {
                    kategori_order = `
                      <span class="badge badge-warning">Reguler</span>
                    `
                  }

                  let status_order = `
                      <span class="badge badge-primary">${value.status_order}</span>
                    `

                  $("#nama_pelanggan").html(value.nama_pelanggan)
                  $("#no_wa").html(value.no_wa)
                  $("#email").html(value.email)
                  $("#alamat").html(value.alamat)
                  $("#berat").html(value.berat)
                  $("#total_harga").html(formatRupiah(value.total_harga))
                  $("#status_pembayaran").html(status_pembayaran)
                  $("#status_order").html(status_order)
                  $("#kategori_order").html(kategori_order)
                })
                $("#collapseicon").collapse('show') 
              }
            }
          }).done(function () {
            $('.loader-wrapper').fadeOut('slow', function () {}); 
          })
        }
      })

      function formatRupiah(bilangan){
        var number_string = bilangan.toString(),
          sisa  = number_string.length % 3,
          rupiah  = number_string.substr(0, sisa),
          ribuan  = number_string.substr(sisa).match(/\d{3}/g);
            
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        return rupiah;
      }
    </script>
  </body>
</html>
