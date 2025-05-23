<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Kinerja Pegawai',
  			'mainBreadcrumb' => 'Kinerja Pegawai',
  			'subBreadcrumb' => '', 
  		);
  	 ?>
    <?php $this->load->view('layout/head',$pageData); ?>
  </head>
  <body>
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
        <?php $this->load->view('layout/sidebar'); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <?php $this->load->view('layout/breadcrumb', $pageData); ?>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row second-chart-list third-news-update"> 
              <div class="col-12">
                <div class="card gradient-primary o-hidden">
                  <div class="card-body">
                    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-truck"></i>Kurir</a></li>
                      <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-controls="info-profile" aria-selected="false"><i class="icofont icofont-user"></i>Washing</a></li> 
                    </ul>
                    <div class="tab-content" id="info-tabContent">
                      <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                        <div class="table-responsive"> 
                          <table class="display" id="basic-1">
                            <thead>
                              <tr>
                                <th>No</th> 
                                <th>Nama Kurir</th>  
                                <th>Email</th>
                                <th><center>Jumlah Penjemputan & Pengiriman</center></th>  
                              </tr>
                            </thead> 
                            <tbody id="tbody-1">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
                        <div class="table-responsive"> 
                          <table class="display" id="basic-2">
                            <thead>
                              <tr>
                                <th>No</th> 
                                <th>Nama Washing</th>  
                                <th>Email</th>
                                <th><center>Jumlah Pencucian</center></th>  
                              </tr>
                            </thead> 
                            <tbody id="tbody-2">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
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
      $(document).ready(function () {
        loadAll()
      })

      function loadAll() {
        loadKurir()
        loadWashing()
      }

      function loadKurir() {
        $.ajax({
          url: base_url+'loadKinerjaKurir',
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            $('#basic-1').dataTable().fnClearTable();
            $('#basic-1').dataTable().fnDestroy(); 
            // $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            let tbody = null
            let no = 1
            $("#jumlah_sudah_bayar").html(res.length)
            res.forEach(function(val) {  
               tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${val.nama_lengkap}</td> 
                  <td>${val.email}</td> 
                  <td align="center">
                    <span class="badge badge-secondary rounded-pill">${val.jumlah}</span>
                  </td> 
                </tr>
              ` 
              no ++
            })

            $("#tbody-1").html(tbody) 
          }
        }).done(function() { 
          $('#basic-1').DataTable();  
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }

      function loadWashing() {
        $.ajax({
          url: base_url+'loadKinerjaWashing',
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            $('#basic-2').dataTable().fnClearTable();
            $('#basic-2').dataTable().fnDestroy(); 
            // $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            let tbody = null
            let no = 1
            $("#jumlah_sudah_bayar").html(res.length)
            res.forEach(function(val) {  
               tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${val.nama_lengkap}</td> 
                  <td>${val.email}</td> 
                  <td align="center">
                    <span class="badge badge-secondary rounded-pill">${val.jumlah}</span>
                  </td> 
                </tr>
              ` 
              no ++
            })

            $("#tbody-2").html(tbody) 
          }
        }).done(function() { 
          $('#basic-2').DataTable();  
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }
    </script>
  </body>
</html>