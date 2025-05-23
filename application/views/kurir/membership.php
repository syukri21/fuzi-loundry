<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Membership',
  			'mainBreadcrumb' => 'Membership',
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
      <?php $this->load->view('layout/header_kurir', $pageData); ?>
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php $this->load->view('layout/sidebar_kurir'); ?>
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
                      <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-check"></i>Sudah Bayar
                        <span class="badge badge-secondary rounded-pill"><span id="jumlah_sudah_bayar"></span></span></a></li> 
                    </ul>
                    <div class="tab-content" id="info-tabContent">
                      <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                        <div class="table-responsive"> 
                          <table class="display" id="basic-1">
                            <thead>
                              <tr>
                                <th>No</th> 
                                <th>Status Pembayaran</th>  
                                <th>Status Paket</th>  
                                <th>Nama Pelanggan</th>  
                                <th>Nomor WhatsApp</th>  
                                <th>Email Pelanggan</th>  
                                <th>Alamat Pelanggan</th>  
                                <th>Nama Kurir</th>  
                                <th>Kontak Kurir</th>  
                                <th>Email Kurir</th>  
                                <th>Alamat Kurir</th>  
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Durasi</th>
                                <th>Pengambilan</th> 
                              </tr>
                            </thead> 
                            <tbody id="tbody-1">
                              
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
        <?php $this->load->view('layout/loader', FALSE); ?>
        <!-- footer start-->
        <?php $this->load->view('layout/footer'); ?>
      </div>
    </div>
    <?php $this->load->view('layout/js'); ?>  
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
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

      // Pusher
        var pusher = new Pusher('93cd4823970b1fb2ec93', {
          cluster: 'ap1'
        });

        var channel = pusher.subscribe('kurir-membership');
        channel.bind('load-data', function(data) {
          loadAll()
        });
      // End Pusher

      $(document).ready(function () {
        loadAll()
      })

      function loadAll() {
        loadSudahBayar() 
      }

      function loadSudahBayar() {
        $.ajax({
          url: base_url+'loadMembershipPembayaranKurir',
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
              let btnPembayaran  = `
                <span class="badge badge-primary">Sudah Bayar</span>
              `

              let btnStatus  = null
              if(val.status_paket == 'aktif') {
                btnStatus = `
                  <span class="badge badge-primary">Aktif</span>
                `
              } else if(val.status_paket == 'berakhir') {
                btnStatus = `
                  <span class="badge badge-success">Berakhir</span>
                `
              } else {
                btnStatus = `
                  <span class="badge badge-primary">${val.status_paket}</span>
                `
              }

               tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${btnPembayaran}</td>
                  <td>${btnStatus}</td>
                  <td>${val.nama_pelanggan}</td> 
                  <td>${val.no_wa}</td> 
                  <td>${val.email_pelanggan}</td> 
                  <td>${val.alamat_pelanggan}</td> 
                  <td>${val.nama_karyawan}</td> 
                  <td>${val.kontak}</td> 
                  <td>${val.email_karyawan}</td> 
                  <td>${val.alamat_karyawan}</td> 
                  <td>${val.nama_paket}</td> 
                  <td>Rp ${formatRupiah(val.harga_paket)}</td> 
                  <td>${val.durasi} hari</td> 
                  <td>Setiap ${val.pengambilan} hari</td>  
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
    </script>
  </body>
</html>