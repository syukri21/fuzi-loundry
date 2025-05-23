<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Laporan Pendapatan',
  			'mainBreadcrumb' => 'Laporan Pendapatan',
  			'subBreadcrumb' => '', 
  		);
  	 ?>
    <?php $this->load->view('layout/head',$pageData); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/datatable-extension.css">
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
            <div class="row"> 
              <div class="col-sm-12 col-xl-6 xl-100">
                <div class="card"> 
                  <div class="card-header">
                    <h5 class="card-title">Harian <b>(<span id="hari"></span>)</b></h5>
                  </div>
                  <div class="card-body">
                    <div class="dt-ext table-responsive"> 
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>No</th> 
                            <th>Order ID</th>
                            <th>Nama Pelanggan</th>
                            <th><center>Status Pembayaran</center></th>  
                            <th><center>Status Order</center></th>  
                            <th>Berat Pakaian</th>
                            <th>Total Bayar</th>  
                            <th><center>Kategori Pesanan</center></th>  
                            <th>Tanggal Order</th>   
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
            <div class="row"> 
              <div class="col-sm-12 col-xl-6 xl-100">
                <div class="card"> 
                  <div class="card-header">
                    <h5 class="card-title">Bulanan <b>(<span id="bulan"></span>)</b></h5>
                  </div>
                  <div class="card-body">
                    <div class="dt-ext table-responsive"> 
                      <table class="display" id="basic-2">
                        <thead>
                          <tr>
                            <th>No</th> 
                            <th>Order ID</th>
                            <th>Nama Pelanggan</th>
                            <th><center>Status Pembayaran</center></th>  
                            <th><center>Status Order</center></th>  
                            <th>Berat Pakaian</th>
                            <th>Total Bayar</th>  
                            <th><center>Kategori Pesanan</center></th>  
                            <th>Tanggal Order</th>   
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
            <div class="row"> 
              <div class="col-sm-12 col-xl-6 xl-100">
                <div class="card"> 
                  <div class="card-header">
                    <h5 class="card-title">Tahunan <b>(<span id="tahun"></span>)</b></h5>
                  </div>
                  <div class="card-body">
                    <div class="dt-ext table-responsive"> 
                      <table class="display" id="basic-3">
                        <thead>
                          <tr>
                            <th>No</th> 
                            <th>Order ID</th>
                            <th>Nama Pelanggan</th>
                            <th><center>Status Pembayaran</center></th>  
                            <th><center>Status Order</center></th>  
                            <th>Berat Pakaian</th>
                            <th>Total Bayar</th>  
                            <th><center>Kategori Pesanan</center></th>  
                            <th>Tanggal Order</th>   
                          </tr>
                        </thead> 
                        <tbody id="tbody-3">
                          
                        </tbody>
                      </table>
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
    <?php $this->load->view('layout/loader'); ?>
    <?php $this->load->view('layout/js'); ?>  
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.autoFill.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.select.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datatable/datatable-extension/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script type="text/javascript">    
      const base_url = '<?php echo base_url(); ?>'
      const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni', 'Juli', 'Agustus', 'September', 'Oktober','November', 'Desember'];
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

        var channel = pusher.subscribe('admin-laporan-pendapatan');
        channel.bind('load-data', function(data) {
          loadAll()
        });
      // End Pusher

    	$(document).ready(function () { 
        loadAll()
      })

      function loadAll() {
        loadData() 
      }

      function loadData() {
        $.ajax({
          url: base_url+'loadPendapatan',
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            $('#basic-1').dataTable().fnClearTable();
            $('#basic-1').dataTable().fnDestroy(); 
            // $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function (res) {
            let pendapatanHari = 0
            
            let tbody = ''
            let no = 1

            let tbody1 = ''
            let no1 = 1

            let tbody2 = ''
            let no2 = 1

            $.each(res.hari, function (ih, valh) {
              pendapatanHari += parseInt(valh.total_harga)

              let tgl = new Date(valh.tanggal_order)
              let waktu = tgl.getHours()+':'+tgl.getMinutes()
              let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 
              
              if(valh.status_pembayaran == 'settlement') {
                btnBayar = `
                  <span  class="badge badge-primary">Sudah Bayar</span>
                `
              } else if(valh.status_pembayaran == 'belum_bayar') {
                btnBayar = `
                  <span  class="badge badge-primary">Belum Bayar</span>
                `
              }  else {
                btnBayar = `
                  <span  class="badge badge-primary">${valh.status_pembayaran}</span>
                `
              } 

              let badgeKategori = '';
              if(valh.kategori_order == 'online') {
                badgeKategori = 'badge-success'
              } else {
                badgeKategori = 'badge-secondary'
              }

              let btnStatusOrder = '';
              if(valh.status_order == 'pending') {
                btnStatusOrder = `
                  <span class="badge badge-dark">Pending</span>
                `
              } else if(valh.status_order == 'penjemputan') {
                btnStatusOrder = `
                  <span class="badge badge-info">Penjemputan</span>
                `
              } else if(valh.status_order == 'pencucian') {
                btnStatusOrder = `
                  <span class="badge badge-secondary">Proses Pencucian</span>
                `
              } else if(valh.status_order == 'selesai_cuci') {
                btnStatusOrder = `
                  <span class="badge badge-success">Selesai Mencuci</span>
                `
              } else if(valh.status_order == 'pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-warning">Pengantaran</span>
                `
              } else if(valh.status_order == 'selesai_pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-primary">Selesai</span>
                `
              }

               tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${valh.order_id}</td> 
                  <td>${valh.nama_pelanggan}</td> 
                  <td align="center">
                    ${btnBayar}
                  </td>
                  <td align="center">
                    ${btnStatusOrder}
                  </td> 
                  <td>${valh.berat} kg</td> 
                  <td>Rp ${formatRupiah(valh.total_harga)}</td> 
                  <td align="center"><span class="badge ${badgeKategori}">${valh.kategori_order}</span></td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                </tr>
              ` 
              no ++
            })

            $("#tbody-1").html(tbody)

            let pendapatanBulan = 0
            $.each(res.bulan, function (ih, valh) {
              pendapatanBulan += parseInt(valh.total_harga)

              let tgl = new Date(valh.tanggal_order)
              let waktu = tgl.getHours()+':'+tgl.getMinutes()
              let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 
              
              if(valh.status_pembayaran == 'settlement') {
                btnBayar = `
                  <span  class="badge badge-primary">Sudah Bayar</span>
                `
              } else if(valh.status_pembayaran == 'belum_bayar') {
                btnBayar = `
                  <span  class="badge badge-primary">Belum Bayar</span>
                `
              }  else {
                btnBayar = `
                  <span  class="badge badge-primary">${valh.status_pembayaran}</span>
                `
              } 

              let badgeKategori = '';
              if(valh.kategori_order == 'online') {
                badgeKategori = 'badge-success'
              } else {
                badgeKategori = 'badge-secondary'
              }

              let btnStatusOrder = '';
              if(valh.status_order == 'pending') {
                btnStatusOrder = `
                  <span class="badge badge-dark">Pending</span>
                `
              } else if(valh.status_order == 'penjemputan') {
                btnStatusOrder = `
                  <span class="badge badge-info">Penjemputan</span>
                `
              } else if(valh.status_order == 'pencucian') {
                btnStatusOrder = `
                  <span class="btn badge-badge">Proses Pencucian</span>
                `
              } else if(valh.status_order == 'selesai_cuci') {
                btnStatusOrder = `
                  <span class="btn badge-badge">Selesai Mencuci</span>
                `
              } else if(valh.status_order == 'pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-warning">Pengantaran</span>
                `
              } else if(valh.status_order == 'selesai_pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-primary">Selesai</span>
                `
              }

               tbody1 += `
                <tr>
                  <td>${no1}</td> 
                  <td>${valh.order_id}</td> 
                  <td>${valh.nama_pelanggan}</td> 
                  <td align="center">
                    ${btnBayar}
                  </td>
                  <td align="center">
                    ${btnStatusOrder}
                  </td> 
                  <td>${valh.berat} kg</td> 
                  <td>Rp ${formatRupiah(valh.total_harga)}</td> 
                  <td align="center"><span class="badge ${badgeKategori}">${valh.kategori_order}</span></td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                </tr>
              ` 
              no1 ++
            })

            $("#tbody-2").html(tbody)

            let pendapatanTahun = 0
            $.each(res.tahun, function (ih, valh) {
              pendapatanTahun += parseInt(valh.total_harga)

              let tgl = new Date(valh.tanggal_order)
              let waktu = tgl.getHours()+':'+tgl.getMinutes()
              let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 
              
              if(valh.status_pembayaran == 'settlement') {
                btnBayar = `
                  <span  class="badge badge-primary">Sudah Bayar</span>
                `
              } else if(valh.status_pembayaran == 'belum_bayar') {
                btnBayar = `
                  <span  class="badge badge-primary">Belum Bayar</span>
                `
              }  else {
                btnBayar = `
                  <span  class="badge badge-primary">${valh.status_pembayaran}</span>
                `
              } 

              let badgeKategori = '';
              if(valh.kategori_order == 'online') {
                badgeKategori = 'badge-success'
              } else {
                badgeKategori = 'badge-secondary'
              }

              let btnStatusOrder = '';
              if(valh.status_order == 'pending') {
                btnStatusOrder = `
                  <span class="badge badge-dark">Pending</span>
                `
              } else if(valh.status_order == 'penjemputan') {
                btnStatusOrder = `
                  <span class="badge badge-info">Penjemputan</span>
                `
              } else if(valh.status_order == 'pencucian') {
                btnStatusOrder = `
                  <span class="btn badge-badge">Proses Pencucian</span>
                `
              } else if(valh.status_order == 'selesai_cuci') {
                btnStatusOrder = `
                  <span class="btn badge-badge">Selesai Mencuci</span>
                `
              } else if(valh.status_order == 'pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-warning">Pengantaran</span>
                `
              } else if(valh.status_order == 'selesai_pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-primary">Selesai</span>
                `
              }

               tbody2 += `
                <tr>
                  <td>${no2}</td> 
                  <td>${valh.order_id}</td> 
                  <td>${valh.nama_pelanggan}</td> 
                  <td align="center">
                    ${btnBayar}
                  </td>
                  <td align="center">
                    ${btnStatusOrder}
                  </td> 
                  <td>${valh.berat} kg</td> 
                  <td>Rp ${formatRupiah(valh.total_harga)}</td> 
                  <td align="center"><span class="badge ${badgeKategori}">${valh.kategori_order}</span></td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                </tr>
              ` 
              no2 ++
            })

            $("#tbody-3").html(tbody)

            $("#hari").html('Rp '+ formatRupiah(pendapatanHari))
            $("#bulan").html('Rp '+ formatRupiah(pendapatanBulan))
            $("#tahun").html('Rp '+ formatRupiah(pendapatanTahun))
          }
        }).done(function() { 
          $('#basic-1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
          });  

          $('#basic-2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
          });  

          $('#basic-3').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
          });  
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }  
    </script>
  </body>
</html>