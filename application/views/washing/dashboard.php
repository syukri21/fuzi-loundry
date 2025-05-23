<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Washing Dashboard',
  			'mainBreadcrumb' => 'Dashboard',
  			'subBreadcrumb' => '', 
  		);
  	 ?>
    <?php $this->load->view('layout/head',$pageData); ?>
  </head>
  <body onload="startTime()">
    <?php $this->load->view('layout/loader'); ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <?php $this->load->view('layout/header', $pageData); ?>
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php $this->load->view('layout/sidebar_washing'); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <?php $this->load->view('layout/breadcrumb', $pageData); ?>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row second-chart-list third-news-update">
              <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                <div class="card o-hidden profile-greeting">
                  <div class="card-body">
                    <div class="media">
                      <div class="badge-groups w-100">
                        <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span></div>
                      </div>
                    </div>
                    <div class="greeting-user text-center"> 
                      <div class="profile-vector"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/dashboard/welcome.png" alt=""></div>
                      <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                      <p><span> <?php echo $user['nama_lengkap']; ?> </span></p>
                      <div class="whatsnew-btn"><a href="<?php echo base_url('washing-order'); ?>" class="btn btn-primary">Data Order</a></div> 
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>  
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?php $this->load->view('layout/footer'); ?>
      </div>
    </div>
    <?php $this->load->view('layout/js'); ?>
    <script type="text/javascript">   
      const base_url = '<?php echo base_url(); ?>'
      var today = new Date()
      var curHr = today.getHours()

      if (curHr >= 0 && curHr < 4) {
          document.getElementById("greeting").innerHTML = 'Selamat Malam';
      } else if (curHr >= 4 && curHr < 12) {
          document.getElementById("greeting").innerHTML = 'Selamat Siang';
      } else if (curHr >= 12 && curHr < 16) {
          document.getElementById("greeting").innerHTML = 'Selamat Sore';
      } else {
          document.getElementById("greeting").innerHTML = 'Selamat Malam';
      }

      // time 
      function startTime() {
          var today = new Date();
          var h = today.getHours();
          var m = today.getMinutes();
          // var s = today.getSeconds();
          var ampm = h >= 12 ? 'PM' : 'AM';
          h = h % 12;
          h = h ? h : 12;
          m = checkTime(m);
          // s = checkTime(s);
          document.getElementById('txt').innerHTML =
              h + ":" + m + ' ' + ampm;
          var t = setTimeout(startTime, 500);
      }
      function checkTime(i) {
          if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
          return i;
      }

      $(document).ready(function () {  
      }) 
    </script>
  </body>
</html>