<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Undang Teman',
  			'mainBreadcrumb' => 'Undang Teman',
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
                      <div class="table-responsive"> 
                        <table class="display" id="basic-1">
                          <thead>
                            <tr>
                              <th>No</th> 
                              <th>Nama Pengundang</th>  
                              <th>Jumlah Diundang</th>  
                            </tr>
                          </thead> 
                          <tbody id="tbody-1">
                            
                          </tbody>
                        </table>
                        <span style="visibility: hidden;" id="text"><?php echo base_url('register?u='.$this->session->userdata('id')); ?></span>
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
          url: base_url+'getAllUndangTeman',
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
                  <td>${val.nama_lengkap_pengundang}</td> 
                  <td>${val.jumlah} Orang</td>    
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

      function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyalin tautan', notifOpt)    
      }

      function gabung() {
        var id_pengundang = $("#kode_undangan").val()
        var id_pendaftar = '<?php echo $this->session->userdata('id'); ?>'
        if(id_pengundang != '') {
          $.ajax({
            url: base_url+'masuk-kode',
            data: {
              id_pengundang: id_pengundang,
              id_pendaftar: id_pendaftar,
            },
            type: 'post',
            dataType: 'json',
            beforeSend: function () {
              $('.loader-wrapper').fadeIn('slow', function () {}); 
            },
            success: function (res) {
              if(res.status == 'success') {
                $("#kode_undangan").val('')
                $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> bergabung dengan kode undangan '+id_pengundang, notifOpt)    
              } else if(res.status == 'registered') {
                $("#kode_undangan").val('')
                $.notify('<i class="fa fa-remove"></i><strong>Error</strong> anda sudah tergabung', notifOpt)    
              } else {
                $.notify('<i class="fa fa-remove"></i><strong>Error</strong> ada sesuatu yang salah', notifOpt)    
              }
            }
          }).done(function () {
            loadData()
            $('.loader-wrapper').fadeOut('slow', function () {}); 
          })
        } else {
          $.notify('<i class="fa fa-remove"></i><strong>Error</strong> masukkan kode undangan', notifOpt)    
        }
      }

      function ambilKupon(id_pengundang) {
        $.ajax({
          url: base_url+'ambil-kupon/'+id_pengundang,
          type: 'gey',
          dataType: 'json',
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function (res) {
            if(res.status) { 
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> mengabil kupon ', notifOpt)    
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> ada sesuatu yang salah', notifOpt)    
            }
          }
        }).done(function () {
          loadData()
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }
    </script>
  </body>
</html>