<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Laporan Order',
  			'mainBreadcrumb' => 'Laporan Order',
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
                  <div class="card-body">
                    <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-check"></i>Sudah Bayar
                        <span class="badge badge-secondary rounded-pill"><span id="jumlah_sudah_bayar"></span></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-controls="info-profile" aria-selected="false"><i class="icofont icofont-time"></i>Belum Bayar <span class="badge badge-secondary rounded-pill"><span id="jumlah_belum_bayar"></span></span></a></li> 
                      <!-- <li class="nav-item"><a class="nav-link" id="pengembalian-dana-tab" data-bs-toggle="tab" href="#pengembalian-dana" role="tab" aria-controls="pengembalian-dana" aria-selected="false"><i class="icofont icofont-history"></i>Pengembalian Dana <span class="badge badge-secondary rounded-pill"><span id="jumlah_pengembalian_dana"></span></span></a></li>  -->
                    </ul>
                    <div class="tab-content" id="info-tabContent">
                      <div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
                        <div class="row mb-3">
                          <div class="col-md-4">
                            <label>Tanggal Awal </label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="tgl_awal" id="tgl_awal" placeholder="Pilih Tanggal Awal">
                          </div>
                          <div class="col-md-4">
                            <label>Tanggal Akhir </label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="tgl_akhir" id="tgl_akhir" placeholder="Pilih Tangga Akhir">
                          </div>
                          <div class="col-md-4">
                            <label>Pencarian Berdasarkan Tanggal</label><br>
                            <button class="btn btn-secondary" id="btnCariSudahBayar"><i class="fa fa-search"></i> Cari</button>
                            <button class="btn btn-info" onclick="loadAll()"><i class="fa fa-refresh"></i> Muat Ulang Data</button>
                          </div>
                        </div>
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
                      <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
                        <div class="row mb-3">
                          <div class="col-md-4">
                            <label>Tanggal Awal </label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="tgl_awal" id="tgl_awal_b" placeholder="Pilih Tanggal Awal">
                          </div>
                          <div class="col-md-4">
                            <label>Tanggal Akhir </label>
                            <input class="datepicker-here form-control digits" type="text" data-language="en" name="tgl_akhir" id="tgl_akhir_b" placeholder="Pilih Tangga Akhir">
                          </div>
                          <div class="col-md-4">
                            <label>Pencarian Berdasarkan Tanggal</label><br>
                            <button class="btn btn-secondary" id="btnCariBelumBayar"><i class="fa fa-search"></i> Cari</button>
                            <button class="btn btn-info" onclick="loadAll()"><i class="fa fa-refresh"></i> Muat Ulang Data</button>
                          </div>
                        </div>
                        <div class="table-responsive"> 
                          <table class="display" id="basic-2">
                            <thead>
                              <tr>
                                <th>No</th> 
                                <th>Order ID</th>
                                <th>Nama Pelanggan</th>
                                <th><center>Status Pembayaran</center></th>   
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

        var channel = pusher.subscribe('admin-laporan-order');
        channel.bind('load-data', function(data) {
          loadAll()
        });
      // End Pusher

    	$(document).ready(function () { 
        loadAll()
      })

      function loadAll() {
        loadSudahBayar()
        loadBelumBayar() 
      }

      function loadSudahBayar() {
        $.ajax({
          url: base_url+'getOrderByStatus/settlement',
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
            res.forEach(function(resOrder) {
              let tgl = new Date(resOrder.tanggal_order)
              let waktu = tgl.getHours()+':'+tgl.getMinutes()
              let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 
              
              if(resOrder.status_pembayaran == 'settlement') {
                btnBayar = `
                  <span  class="badge badge-primary">Sudah Bayar</span>
                `
              } else if(resOrder.status_pembayaran == 'belum_bayar') {
                btnBayar = `
                  <span  class="badge badge-primary">Belum Bayar</span>
                `
              }  else {
                btnBayar = `
                  <span  class="badge badge-primary">${resOrder.status_pembayaran}</span>
                `
              } 

              let badgeKategori = '';
              if(resOrder.kategori_order == 'online') {
                badgeKategori = 'badge-success'
              } else {
                badgeKategori = 'badge-secondary'
              }

              let btnStatusOrder = '';
              if(resOrder.status_order == 'pending') {
                btnStatusOrder = `
                  <span class="badge badge-dark">Pending</span>
                `
              } else if(resOrder.status_order == 'penjemputan') {
                btnStatusOrder = `
                  <span class="badge badge-info">Penjemputan</span>
                `
              } else if(resOrder.status_order == 'pencucian') {
                btnStatusOrder = `
                  <span class="badge badge-secondary">Proses Pencucian</span>
                `
              } else if(resOrder.status_order == 'selesai_cuci') {
                btnStatusOrder = `
                  <span class="badge badge-success">Selesai Mencuci</span>
                `
              } else if(resOrder.status_order == 'pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-warning">Pengantaran</span>
                `
              } else if(resOrder.status_order == 'selesai_pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-primary">Selesai</span>
                `
              }

               tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${resOrder.order_id}</td> 
                  <td>${resOrder.nama_pelanggan}</td> 
                  <td align="center">
                    ${btnBayar}
                  </td>
                  <td align="center">
                    ${btnStatusOrder}
                  </td> 
                  <td>${resOrder.berat} kg</td> 
                  <td>Rp ${formatRupiah(resOrder.total_harga)}</td> 
                  <td align="center"><span class="badge ${badgeKategori}">${resOrder.kategori_order}</span></td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                </tr>
              ` 
              no ++
            })

            $("#tbody-1").html(tbody)
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
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      } 

      function loadBelumBayar() {
        $.ajax({
          url: base_url+'getOrderByStatus/belum_bayar',
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            $('#basic-2').dataTable().fnClearTable();
            $('#basic-2').dataTable().fnDestroy(); 
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            $("#jumlah_belum_bayar").html(res.length)
            let tbody = null
            let no = 1
            res.forEach(function(resOrder) {
              let tgl = new Date(resOrder.tanggal_order)
              let waktu = tgl.getHours()+':'+tgl.getMinutes()
              let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 
              
              if(resOrder.status_pembayaran == 'settlement') {
                btnBayar = `
                  <span class="badge badge-primary">Sudah Bayar</span>
                `
              } else if(resOrder.status_pembayaran == "belum_bayar") {
                if(resOrder.kategori_order == 'online') {
                  btnBayar = `
                    <span class="badge badge-danger">Belum Bayar</span> 
                  `
                } else {
                  btnBayar = `
                    <span class="badge badge-danger">Belum Bayar</span> 
                  `  
                }
              } else {
                btnBayar = `
                  <span class="badge badge-dark">${resOrder.status_pembayaran}</span>
                `
              } 
              
              let badgeKategori = '';
              if(resOrder.kategori_order == 'online') {
                badgeKategori = 'badge-success'
              } else {
                badgeKategori = 'badge-secondary'
              }

              tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${resOrder.order_id}</td> 
                  <td>${resOrder.nama_pelanggan}</td> 
                  <td align="center">
                    ${btnBayar}
                  </td> 
                  <td>${resOrder.berat} kg</td> 
                  <td>Rp ${formatRupiah(resOrder.total_harga)}</td> 
                  <td align="center"><span class="badge ${badgeKategori}">${resOrder.kategori_order}</span></td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                </tr>
              ` 
              no ++
            })

            $("#tbody-2").html(tbody)
          }
        }).done(function() { 
          $('#basic-2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
          });  
          $('.loader-wrapper').fadeOut('slow', function () {});  
        })
      }

      $("#btnCariSudahBayar").click(function () {
        var tgl_awal = $("#tgl_awal").val()
        var tgl_akhir = $("#tgl_akhir").val()
        if(tgl_awal != '' && tgl_akhir != '') {
          $.ajax({
            url: base_url+'getOrderByTanggal/settlement',
            type: 'post',
            data: {
              tgl_awal: tgl_awal,
              tgl_akhir: tgl_akhir,
            },
            dataType: 'json',
            beforeSend: function() { 
            $('#basic-1').dataTable().fnClearTable();
            $('#basic-1').dataTable().fnDestroy(); 
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            let tbody = null
            let no = 1
            $("#jumlah_sudah_bayar").html(res.length)
            if(res.length == 0) {
              $("#tbody-1").html('')
              $.notify('<i class="fa fa-search"></i><strong>Hasil Pencarian</strong> data tidak ditemukan', notifOpt)
            }
            else {
              res.forEach(function(resOrder) { 
                $.notify('<i class="fa fa-search"></i><strong>Hasil Pencarian</strong> '+res.length+' data ditemukan', notifOpt)
                let tgl = new Date(resOrder.tanggal_order)
                let waktu = tgl.getHours()+':'+tgl.getMinutes()
                let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 
                
                if(resOrder.status_pembayaran == 'settlement') {
                  btnBayar = `
                    <span  class="badge badge-primary">Sudah Bayar</span>
                  `
                } else if(resOrder.status_pembayaran == 'belum_bayar') {
                  btnBayar = `
                    <span  class="badge badge-primary">Belum Bayar</span>
                  `
                }  else {
                  btnBayar = `
                    <span  class="badge badge-primary">${resOrder.status_pembayaran}</span>
                  `
                } 

                let badgeKategori = '';
                if(resOrder.kategori_order == 'online') {
                  badgeKategori = 'badge-success'
                } else {
                  badgeKategori = 'badge-secondary'
                }

                let btnStatusOrder = '';
                if(resOrder.status_order == 'pending') {
                  btnStatusOrder = `
                    <span class="badge badge-dark">Pending</span>
                  `
                } else if(resOrder.status_order == 'penjemputan') {
                  btnStatusOrder = `
                    <span class="badge badge-info">Penjemputan</span>
                  `
                } else if(resOrder.status_order == 'pencucian') {
                  btnStatusOrder = `
                    <span class="btn badge-badge">Proses Pencucian</span>
                  `
                } else if(resOrder.status_order == 'selesai_cuci') {
                  btnStatusOrder = `
                    <span class="btn badge-badge">Selesai Mencuci</span>
                  `
                } else if(resOrder.status_order == 'pengantaran') {
                  btnStatusOrder = `
                    <span class="badge badge-warning">Pengantaran</span>
                  `
                } else if(resOrder.status_order == 'selesai_pengantaran') {
                  btnStatusOrder = `
                    <span class="badge badge-primary">Selesai</span>
                  `
                }

                 tbody += `
                  <tr>
                    <td>${no}</td> 
                    <td>${resOrder.order_id}</td> 
                    <td>${resOrder.nama_pelanggan}</td> 
                    <td align="center">
                      ${btnBayar}
                    </td>
                    <td align="center">
                      ${btnStatusOrder}
                    </td> 
                    <td>${resOrder.berat} kg</td> 
                    <td>Rp ${formatRupiah(resOrder.total_harga)}</td> 
                    <td align="center"><span class="badge ${badgeKategori}">${resOrder.kategori_order}</span></td> 
                    <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                  </tr>
                ` 
                no ++
              })
            } 

            $("#tbody-1").html(tbody)
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
            $('.loader-wrapper').fadeOut('slow', function () {});  
          })
        } else {
          $.notify('<i class="fa fa-remove"></i><strong>Error</strong> tanggal awal dan akhir harus diisi', notifOpt)    
        }
      })

      $("#btnCariBelumBayar").click(function () {
        var tgl_awal = $("#tgl_awal_b").val()
        var tgl_akhir = $("#tgl_akhir_b").val()
        if(tgl_awal != '' && tgl_akhir != '') {
          $.ajax({
            url: base_url+'getOrderByTanggal/belum_bayar',
            type: 'post',
            data: {
              tgl_awal: tgl_awal,
              tgl_akhir: tgl_akhir,
            },
            dataType: 'json',
            beforeSend: function() { 
            $('#basic-2').dataTable().fnClearTable();
            $('#basic-2').dataTable().fnDestroy(); 
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            let tbody = null
            let no = 1
            $("#jumlah_belum_bayar").html(res.length)
            if(res.length == 0) {
              $("#tbody-2").html('')
              $.notify('<i class="fa fa-search"></i><strong>Hasil Pencarian</strong> data tidak ditemukan', notifOpt)
            }
            else {
              res.forEach(function(resOrder) { 
                $.notify('<i class="fa fa-search"></i><strong>Hasil Pencarian</strong> '+res.length+' data ditemukan', notifOpt)
                let tgl = new Date(resOrder.tanggal_order)
              let waktu = tgl.getHours()+':'+tgl.getMinutes()
              let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 
              
              if(resOrder.status_pembayaran == 'settlement') {
                btnBayar = `
                  <span class="badge badge-primary">Sudah Bayar</span>
                `
              } else if(resOrder.status_pembayaran == "belum_bayar") {
                if(resOrder.kategori_order == 'online') {
                  btnBayar = `
                    <span class="badge badge-danger">Belum Bayar</span> 
                  `
                } else {
                  btnBayar = `
                    <span class="badge badge-danger">Belum Bayar</span> 
                  `  
                }
              } else {
                btnBayar = `
                  <span class="badge badge-dark">${resOrder.status_pembayaran}</span>
                `
              } 
              
              let badgeKategori = '';
              if(resOrder.kategori_order == 'online') {
                badgeKategori = 'badge-success'
              } else {
                badgeKategori = 'badge-secondary'
              }

              tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${resOrder.order_id}</td> 
                  <td>${resOrder.nama_pelanggan}</td> 
                  <td align="center">
                    ${btnBayar}
                  </td> 
                  <td>${resOrder.berat} kg</td> 
                  <td>Rp ${formatRupiah(resOrder.total_harga)}</td> 
                  <td align="center"><span class="badge ${badgeKategori}">${resOrder.kategori_order}</span></td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                </tr>
              ` 
              no ++
              })
            } 

            $("#tbody-2").html(tbody)
          }
          }).done(function() { 
            $('#basic-2').DataTable({
              dom: 'Bfrtip',
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
              ]
            });  
            $('.loader-wrapper').fadeOut('slow', function () {});  
          })
        } else {
          $.notify('<i class="fa fa-remove"></i><strong>Error</strong> tanggal awal dan akhir harus diisi', notifOpt)    
        }
      })
    </script>
  </body>
</html>