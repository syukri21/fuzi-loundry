<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
      $pageData = array(
        'title' => 'Karyawan',
        'mainBreadcrumb' => 'Master Data',
        'subBreadcrumb' => 'Karyawan', 
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
                            <th>Nama Karyawan</th>
                            <th>Kategori</th> 
                            <th>Kontak</th>
                            <th>Alamat</th> 
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
                    <h5 class="modal-title">Tambah Karyawan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="my-2">
                      <label>Nama Karyawan</label>
                      <input class="form-control" name="nama_karyawan" id="nama_karyawan" type="text" placeholder="Masukkan Nama Karyawan" required=""></input>
                    </div>
                    <div class="my-2">
                      <label>Kontak</label>
                      <input class="form-control" name="kontak" id="kontak" type="text" placeholder="Masukkan Kontak" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" required="" rows="3"></textarea>
                    </div>
                    <div class="my-2"> 
                      <label>Kategori</label>
                      <select class="form-control" name="kategori" id="kategori" required="">
                        <option value="Karyawan">Karyawan</option>
                      </select>
                    </div>
                    <div class="my-2">
                      <div class="row">
                        <div class="col-md-6" hidden>
                          <label>Email</label>
                          <input class="form-control" name="email" id="email" type="email" placeholder="Masukkan Email"  ></input> 
                        </div>
                        <div class="col-md-6" hidden>
                          <label>Password</label>
                          <input class="form-control" name="password" id="password" type="password" placeholder="Masukkan Password"  ></input> 
                        </div>
                      </div>
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
                  <input type="hidden" name="id" id="id_karyawan_e">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Karyawan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="my-2">
                      <label>Nama Karyawan</label>
                      <input class="form-control" name="nama_karyawan" id="nama_karyawan_e" type="text" placeholder="Masukkan Nama Karyawan" required=""></input>
                    </div>
                    <div class="my-2">
                      <label>Kontak</label>
                      <input class="form-control" name="kontak" id="kontak_e" type="text" placeholder="Masukkan Kontak" required=""></input>
                    </div>
                    <div class="my-2"> 
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" id="alamat_e" placeholder="Masukkan Alamat" required="" rows="3"></textarea>
                    </div>
                    <div class="my-2"> 
                      <label>Kategori</label>
                      <select class="form-control" name="kategori" id="kategori_e" required="">
                        <option value="Karyawan">Kasir</option>
                      </select>
                    </div>
                    <div class="my-2">
                      <div class="row">
                        <div class="col-md-6" hidden>
                          <label>Email</label>
                          <input class="form-control" name="email" id="email_e" type="email" placeholder="Masukkan Email" required=""></input> 
                        </div>
                        <div class="col-md-6" hidden>
                          <label>Password</label>
                          <input class="form-control" name="password" id="password_e" type="password" placeholder="Masukkan Password"></input> 
                          * Jangan diisi jika tidak mengubah password
                        </div>
                      </div>
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
                  <input type="hidden" name="id" id="id_karyawan_d">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"> 
                    Hapus karyawan yang bernama <b><span id="nama_karyawan_d"></span></b> ?
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
      const table = 'karyawan';
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

        var channel = pusher.subscribe('admin-karyawan');
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
                  <td>${val.nama_karyawan}</td>
                  <td>${val.kategori}</td>
                  <td>${val.kontak}</td>
                  <td>${val.alamat}</td>  
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
              $("#nama_karyawan_e").val(val.nama_karyawan)
              $("#kontak_e").val(val.kontak)
              $("#alamat_e").val(val.alamat)
              $("#kategori_e").val(val.kategori)
              $("#email_e").val(val.email) 
              $("#id_karyawan_e").val(val.id)
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
              $("#nama_karyawan_d").html(val.nama_karyawan) 
              $("#id_karyawan_d").val(val.id)
            })
          }
        }).done(function() {
          $("#modal-hapus").modal('toggle')
        })
      }

			function generateEmail(namaPelanggan){
				namaPelanggan = namaPelanggan.replace(/\s+/g, ''); // Remove all spaces
				let email = namaPelanggan + generateRandomString(5);
				return email + '@gmail.com';
			}

      $("#form_tambah").submit(function() {
        $("#modal-tambah").modal('toggle')

				$("#password").val('password')
				$("#email").val(generateEmail($("#nama_karyawan").val()));

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
              $("#nama_karyawan").val('')
              $("#kontak").val('')
              $("#alamat").val('')
              $("#kategori").val('')
              $("#email").val('')
              $("#password").val('')

              loadData()
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan data karyawan', notifOpt)  
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
              $("#id_karyawan_e").val('') 
              $("#password_e").val('')

              loadData()
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan perubahan data karyawan', notifOpt)
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
              $("#id_karyawan_d").val('')
              $("#nama_karyawan_d").val('')  
              loadData()
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menghapus data karyawan', notifOpt)
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          }
        }).done(function() {  
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      })

			function generateRandomString(length) {
				const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
				let result = '';
				for (let i = 0; i < length; i++) {
					result += characters.charAt(Math.floor(Math.random() * characters.length));
				}
				return result;
			}

    </script>
  </body>
</html>
