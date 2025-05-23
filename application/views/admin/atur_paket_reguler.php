<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Atur Paket Reguler',
  			'mainBreadcrumb' => 'Atur Paket Reguler',
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
            <div class="edit-profile">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body"> 
                      <button onclick="openAksi('tambah')" class="btn btn-primary btn-air-primary btn-pill mb-3">Tambah Paket Reguler</button>
                      <div class="table-responsive"> 
                        <table class="display" id="basic-1">
                          <thead>
                            <tr>
                              <th>No</th> 
                              <th>Nama Paket</th>  
                              <th>Harga Paket</th>  
                              <th><center>Aksi</center></th>  
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
          <!-- Container-fluid Ends-->
        </div>

        <!-- Modal Bayar -->
        <div class="modal fade" id="modal-aksi" tabindex="-1" role="dialog" aria-labelledby="modal-aksi" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">
              <form action="javascript:;" id="form_aksi"> 
                <input type="hidden" name="id_paket" id="id_paket">
                <input type="hidden" name="aksi" id="aksi">
                <div class="modal-header">
                  <h5 class="modal-title"><span id="ket-title"></span></h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                  <div class="form-group">
                    <label>Nama Paket Reguler</label>
                    <input type="text" name="nama_paket" id="nama_paket" class="form-control" required="" placeholder="Masukkan Nama Paket Reguler">
                  </div>
                  <div class="form-group">
                    <label>Harga Paket Reguler</label>
                    <input type="number" name="harga_paket"  id="harga_paket" class="form-control" required="" placeholder="Masukkan Harga Paket Reguler">
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button id="btn-submit" class="btn btn-primary" type="submit"><span id="ket-submit"></span></button>
                </div> 
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Bayar -->

        <!-- Modal Bayar -->
        <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">
              <form action="javascript:;" id="form_hapus"> 
                <input type="hidden" name="id_paket" id="id_paket_d"> 
                <div class="modal-header">
                  <h5 class="modal-title">Hapus Paket</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">  
                  Hapus paket bernama <b><span id="ket-nama"></span></b> ?
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button id="btn-submit" class="btn btn-primary" type="submit">Hapus</button>
                </div> 
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Bayar -->

        <!-- footer start-->
        <?php $this->load->view('layout/footer'); ?>
      </div>
    </div>
    <?php $this->load->view('layout/js'); ?> 
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script type="text/javascript">   
      const base_url = '<?php echo base_url(); ?>' 
      const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni', 'Juli', 'Agustus', 'September', 'Oktober','November', 'Desember']
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

      $(document).ready(function () { 

        loadData()
      })

      function loadData() { 
        $.ajax({
          url: base_url+'getData/paket_reguler',
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            $('#basic-1').dataTable().fnClearTable();
            $('#basic-1').dataTable().fnDestroy(); 
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            var tbody = null
            let no = 1 
            res.forEach(function(val) {  
               tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${val.nama_paket}</td> 
                  <td>Rp ${formatRupiah(val.harga_paket)}</td>  
                  <td>
                    <button onclick="openAksi('edit',${val.id}, '${val.nama_paket}', ${val.harga_paket})" class="btn btn-primary">Edit</button>
                    <button onclick="openHapus(${val.id}, '${val.nama_paket}')" class="btn btn-danger">Hapus</button>
                  </td>  
                </tr>
              ` 
              $("#tbody-1").html(tbody)
              no ++ 
            }) 
          }
        }).done(function() {  
          $('#basic-1').DataTable();  
          $('.loader-wrapper').fadeOut('slow', function () {});  
        })
      }

      function openAksi(aksi, id = null, nama_paket = null, harga_paket = null) {
        if(aksi == 'tambah') {
          $("#ket-title").html('Tambah Paket Reguler')
          $("#ket-submit").html('Tambah')  

        } else if(aksi == 'edit') {
          $("#ket-title").html('Edit Paket Reguler')
          $("#ket-submit").html('Edit') 

          $("#id_paket").val(id)
          $("#nama_paket").val(nama_paket)
          $("#harga_paket").val(harga_paket)
        }
        $("#aksi").val(aksi)
        $("#modal-aksi").modal('toggle')
      } 

      function openHapus(id = null, nama_paket = null) {
        $("#id_paket_d").val(id)
        $("#ket-nama").html(nama_paket)
        $("#modal-hapus").modal('toggle')
      } 

       $("#form_aksi").submit(function () {
        $("#modal-aksi").modal('toggle')
         $.ajax({
          url: base_url+'aksiPaketReguler',
          type: 'post',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function (res) {
            if(res.status) {
              if(res.aksi == 'tambah') {
                $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menambah paket', notifOpt)    
              } else {
                $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan perubahan', notifOpt)    
              }
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> ada sesuatu yang salah', notifOpt)    
            }
          }
         }).done(function () {
          loadData()
           $('.loader-wrapper').fadeOut('slow', function () {}); 
         })
       }) 

       $("#form_hapus").submit(function () {
        $("#modal-hapus").modal('toggle')
         $.ajax({
          url: base_url+'hapusPaketReguler',
          type: 'post',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function (res) {
            if(res.status) { 
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menghapus paket', notifOpt)     
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> ada sesuatu yang salah', notifOpt)    
            }
          }
         }).done(function () {
          loadData()
           $('.loader-wrapper').fadeOut('slow', function () {}); 
         })
       }) 
    </script>
  </body>
</html>