<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Paket Laundry',
  			'mainBreadcrumb' => 'Master Data',
  			'subBreadcrumb' => 'Paket Laundry', 
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
            <div class="row"> 
              <div class="col-md-12">
                <div class="card gradient-primary o-hidden"> 
                  <div class="card-body">
                    <button class="btn btn-info btn-pill btn-air-info mb-4" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambah"><i class="icon-plus"></i> Tambah</button>
                    <div class="table-responsive"> 
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Harga Paket</th>
                            <th>Durasi</th> 
                            <th>Pengambilan</th> 
                            <th>Keterangan Paket</th> 
                            <th><center>Edit & Hapus</center></th> 
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
          <!-- Container-fluid Ends-->
        </div>

        <!-- Modal -->
          <!-- Modal Tambah -->
          <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
              <div class="modal-content">
                <form action="javascript:;" id="form_tambah">
                  <div class="modal-header">
                    <h5 class="modal-title">Tambah Paket Laundry</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="my-2">
                      <label>Nama Paket</label>
                      <input class="form-control" name="nama_paket" id="nama_paket" type="text" placeholder="Masukkan Nama Paket" required=""></input>
                    </div>
                    <div class="my-2">
                      <label>Harga Paket</label>
                      <input class="form-control" name="harga_paket" id="harga_paket" type="number" placeholder="Masukkan Harga Paket" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Durasi (hari)</label>
                      <input class="form-control" name="durasi" id="durasi" type="number" placeholder="Masukkan Durasi" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Pengambilan Per .. Hari</label>
                      <input class="form-control" name="pengambilan" id="pengambilan" type="number" placeholder="Akan Diambil setiap berapa hari sekali ?" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Keterangan Paket</label>
                      <textarea class="form-control" name="keterangan_paket" id="keterangan_paket"placeholder="Masukkan Keterangan Paket" required="" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-info" type="submit">Simpan</button>
                  </div> 
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Tambah -->
          <!-- Modal Edit -->
          <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
              <div class="modal-content">
                <form action="javascript:;" id="form_edit">
                  <input type="hidden" name="id" id="id_paket_e">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Paket Laundry</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="my-2">
                      <label>Nama Paket</label>
                      <input class="form-control" name="nama_paket" id="nama_paket_e" type="text" placeholder="Masukkan Nama Paket" required=""></input>
                    </div>
                    <div class="my-2">
                      <label>Harga Paket</label>
                      <input class="form-control" name="harga_paket" id="harga_paket_e" type="number" placeholder="Masukkan Harga Paket" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Durasi (hari)</label>
                      <input class="form-control" name="durasi" id="durasi_e" type="number" placeholder="Masukkan Durasi" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Pengambilan Per .. Hari</label>
                      <input class="form-control" name="pengambilan" id="pengambilan_e" type="number" placeholder="Akan Diambil setiap berapa hari sekali ?" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Keterangan Paket</label>
                      <textarea class="form-control" name="keterangan_paket" id="keterangan_paket_e"placeholder="Masukkan Keterangan Paket" required="" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                  </div> 
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Edit -->
          <!-- Modal Hapus -->
          <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
              <div class="modal-content">
                <form action="javascript:;" id="form_hapus">
                  <input type="hidden" name="id" id="id_paket_d">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"> 
                    Hapus paket yang bernama <b><span id="nama_paket_d"></span></b> ?
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  </div> 
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Hapus -->
        <!-- End Modal -->

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
    	'use strict'; 
      const base_url = '<?php echo base_url(); ?>'
      const table = 'paket_laundry';
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

        var channel = pusher.subscribe('admin-paket-laundry');
        channel.bind('load-data', function(data) {
          loadData()
        });
      // End Pusher

      $(document).ready(function () { 
        loadData()
      })

      function loadData() {
        $.ajax({
          url: base_url+'getData/'+table,
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
            res.forEach(function(val) {
              tbody += `
                <tr>
                  <td>${no}</td>
                  <td>${val.nama_paket}</td>
                  <td>Rp ${formatRupiah(val.harga_paket)}</td>
                  <td>${val.durasi} hari</td> 
                  <td>${val.pengambilan} hari sekali</td> 
                  <td>${val.keterangan_paket}</td> 
                  <td align="center">
                    <button onclick="openEdit(${val.id})" class="my-2 btn btn-primary btn-pill btn-air-primary"><i class="icon-pencil-alt"></i></button>
                    <button onclick="openHapus(${val.id})" class="my-2 btn btn-danger btn-pill btn-air-danger"><i class="icon-close"></i></button>
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

      function openEdit(id) { 
        $.ajax({
          url: base_url+'getDataById/'+table+'/'+id,
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
          },
          success: function(res) {
            let tbody = null
            let no = 1
            res.forEach(function(val) { 
              $("#nama_paket_e").val(val.nama_paket)
              $("#harga_paket_e").val(val.harga_paket)
              $("#durasi_e").val(val.durasi)
              $("#pengambilan_e").val(val.pengambilan)
              $("#keterangan_paket_e").val(val.keterangan_paket)
              $("#id_paket_e").val(val.id)
            })
          }
        }).done(function() {
          $("#modal-edit").modal('toggle')
        })
      }

      function openHapus(id) { 
        $.ajax({
          url: base_url+'getDataById/'+table+'/'+id,
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
          },
          success: function(res) {
            let tbody = null
            let no = 1
            res.forEach(function(val) { 
              $("#nama_paket_d").html(val.nama_paket) 
              $("#id_paket_d").val(val.id)
            })
          }
        }).done(function() {
          $("#modal-hapus").modal('toggle')
        })
      }

      $("#form_tambah").submit(function() {
        $("#modal-tambah").modal('toggle')

        $.ajax({
          url: base_url+'insert/'+table,
          type: 'post', 
          dataType: 'json',
          data: $(this).serialize(),
          beforeSend: function() {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) { 
            if(res) {
              $("#nama_paket").val('')
              $("#harga_paket").val('')
              $("#durasi").val('')

              loadData()
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan data paket', notifOpt)  
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          }
        }).done(function() {   
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      })

      $("#form_edit").submit(function() {
        $("#modal-edit").modal('toggle')

        $.ajax({
          url: base_url+'update/'+table,
          type: 'post', 
          dataType: 'json',
          data: $(this).serialize(),
          beforeSend: function() {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) { 
            if(res) {
              $("#id_paket_e").val('') 

              loadData()
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan perubahan data paket', notifOpt)
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          }
        }).done(function() {  
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      })

      $("#form_hapus").submit(function() {
        $("#modal-hapus").modal('toggle')

        $.ajax({
          url: base_url+'delete/'+table,
          type: 'post', 
          dataType: 'json',
          data: $(this).serialize(),
          beforeSend: function() {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) { 
            if(res) {
              $("#id_paket_d").val('')
              $("#nama_paket_d").val('')  
              loadData()
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menghapus data paket', notifOpt)
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          }
        }).done(function() {  
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }) 
    </script>
  </body>
</html>
