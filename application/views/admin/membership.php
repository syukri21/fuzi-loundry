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
                      <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-check"></i>Sudah Bayar
                        <span class="badge badge-secondary rounded-pill"><span id="jumlah_sudah_bayar"></span></span></a></li>
                      <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-controls="info-profile" aria-selected="false"><i class="icofont icofont-history"></i>Belum Bayar <span class="badge badge-secondary rounded-pill"><span id="jumlah_belum_bayar"></span></span></a></li> 
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
                      <div class="tab-pane fade" id="info-profile" role="tabpanel" aria-labelledby="profile-info-tab">
                        <div class="table-responsive"> 
                          <table class="display" id="basic-2">
                            <thead>
                              <tr>
                                <th>No</th> 
                                <th>Status Pembayaran</th>  
                                <th>Status Paket</th>  
                                <th>Nama Pelanggan</th>  
                                <th>Nomor WhatsApp</th>  
                                <th>Email</th>  
                                <th>Alamat</th>  
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Durasi</th>
                                <th>Pengambilan</th> 
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
        <!-- Modal Bayar -->
        <div class="modal fade" id="modal-bayar" tabindex="-1" role="dialog" aria-labelledby="modal-bayar" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">
              <form action="javascript:;" id="form_bayar">
                <input type="hidden" name="id" id="id_membership">
                <div class="modal-header">
                  <h5 class="modal-title">Konfirmasi Pembayaran</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                  <p>
                    Apakah pembayaran telah dilakukan ? <br>
                    Selanjutnya pilih kurir untuk mengantarkan 
                  </p>
                  <label>Kurir</label>
                  <select required="" id="kurir" name="id_kurir" class="form-control"></select>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary" type="submit">Sudah Bayar</button>
                </div> 
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Bayar -->
        <?php $this->load->view('layout/loader', FALSE); ?>
        <!-- footer start-->
        <?php $this->load->view('layout/footer'); ?>
      </div>
    </div>
    <?php $this->load->view('layout/js'); ?>  
	<script type="text/javascript">
		class Pusher {
			subscribe(a) {
				console.log("subscribe ", a)
				return function(b, c) {
					console.log("Load", b)
					c()
				}
			}
		}
	</script>
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

        var channel = pusher.subscribe('admin-membership');
        channel.bind('load-data', function(data) {
          loadAll()
        });
      // End Pusher

      $(document).ready(function () {
        loadAll()
      })

      function loadAll() {
        loadSudahBayar()
        loadKurirSelect()
        loadBelumBayar()
      }

      function loadSudahBayar() {
        $.ajax({
          url: base_url+'loadMembershipPembayaran/sudah_bayar',
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

      function loadBelumBayar() {
        $.ajax({
          url: base_url+'loadMembershipPembayaran/belum_bayar',
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
            $("#jumlah_belum_bayar").html(res.length)
            res.forEach(function(val) {   
              let btnPembayaran  = `
                <button onclick="openBayar(${val.id})" class="btn btn-danger btn-air-danger">Belum Bayar</button>
              `
              let btnStatus  = null
              if(val.status_paket == 'belum_aktif') {
                btnStatus = `
                  <span class="badge badge-danger">Belum Aktif</span>
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
                  <td>${val.email}</td> 
                  <td>${val.alamat}</td> 
                  <td>${val.nama_paket}</td> 
                  <td>Rp ${formatRupiah(val.harga_paket)}</td> 
                  <td>${val.durasi} hari</td> 
                  <td>Setiap ${val.pengambilan} hari</td>  
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

      function openBayar(id) {
        $("#id_membership").val(id)

        $("#modal-bayar").modal('toggle')
      }

      function loadKurirSelect() {
        $.ajax({
          url: base_url+'get-users/Kurir',
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            // $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            let kurir = '<option value="" >Pilih Kurir</option>'
            let no = 1
            res.forEach(function(val) {
              kurir += `
                <option value="${val.id}">${val.nama_lengkap}</option>
              ` 
              no ++
            })

            $("#kurir").html(kurir)
          }
        }).done(function() {
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }

      $("#form_bayar").submit(function () {
        $("#modal-bayar").modal('toggle')
        $.ajax({
          url: base_url+'sudahBayarMembership',
          type: 'post',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function (res) {
            if(res.status) {
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> membayaran dan mengaktifkan membership', notifOpt)   
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          },
        }).done(function () {
          loadAll()
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      })
    </script>
  </body>
</html>
