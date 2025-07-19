<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Dashboard',
  			'mainBreadcrumb' => 'Dashboard',
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
            <p>Pendapatan</p>
            <div class="row">
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="database"></i></div>
                      <div class="media-body"><span class="m-0">Harian (<span id="ket-hari"></span>)</span>
                        <h4 class="mb-0 counter" id="hari"></h4><i class="icon-bg" data-feather="database"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="database"></i></div>
                      <div class="media-body"><span class="m-0">Bulanan (<span id="ket-bulan"></span>)</span>
                        <h4 class="mb-0 counter" id="bulan"></h4><i class="icon-bg" data-feather="database"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-4 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><i data-feather="database"></i></div>
                      <div class="media-body"><span class="m-0">Tahunan (<span id="ket-tahun"></span>)</span>
                        <h4 class="mb-0 counter" id="tahun"></h4><i class="icon-bg" data-feather="database"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>

            <div class="row">
<!--
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Setting Laundry</h5>
                  </div>
                  <div class="card-body"> 
                    <form id="form_harga" action="javascript:;" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id_harga">  
                      <div class="row">
                        <div class="col-md-12 mb-2">
                          <label>Logo (Rekomendasi Ukuran 120 x 30 px)</label>
                          <input type="file" name="logo" id="logo" class="form-control">
                          Jangan memilih jika tidak ingin mengganti logo
                        </div>
                        <div class="col-md-6 mt-2">
                          <div class="form-group">
                            <label>Nama Laundry</label>
                            <input type="text" name="nama_laundry" id="nama_laundry" class="form-control" placeholder="Masukkan Nama Laundry">  
                          </div>
                        </div>
                        <div class="col-md-6 mt-2">
                          <div class="form-group"> 
                            <label>Alamat Laundry</label>
                            <textarea name="alamat_laundry" id="alamat_laundry" class="form-control" placeholder="Masukkan Nama Laundry"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6 mt-2">
                          <div class="form-group"> 
                            <label>Harga /kg</label>
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga per Kg">  
                          </div>
                        </div>
                        <div class="col-md-6 mt-2">
                          <div class="form-group"> 
                            <label>Nama Pemilik Bank</label>
                            <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" placeholder="Nama Pemilik Bank">  
                          </div>
                        </div>
                        <div class="col-md-6 mt-2"r
                          <div class="form-grou"> 
                            <label>Nama Bank</label>
                            <input type="text" name="nama_bank" id="nama_bank" class="form-control" placeholder="Nama Bank">  
                          </div>
                        </div>
                        <div class="col-md-6 mt-2">
                          <div class="form-grou"> 
                            <label>Nomor Rekening</label>
                            <input type="number" name="no_rekening" id="no_rekening" class="form-control" placeholder="Nomor Rekening">  
                          </div>
                        </div>
                        <div class="col-md-6 mt-2">
                          <div class="form-grou"> 
                            <label>Komisi Kurir (Rp)</label>
                            <input type="number" name="komisi_kurir" id="komisi_kurir" class="form-control" placeholder="Presentase Komisi Kurir">  
                          </div>
                        </div>
                        <div class="col-md-6 mt-2">
                          <div class="form-grou"> 
                            <label>Komisi Washing (%)</label>
                            <input type="number" name="komisi_washing" id="komisi_washing" class="form-control" placeholder="Presentase Komisi Washing">  
                          </div>
                        </div>
                      </div>
                      <button class="btn btn-primary mt-3 btn-pill btn-air-primary"><i class="fa fa-save mr-2"></i> Simpan Perubahan</button>
                    </form>
                  </div>
                </div> -->

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
      const namaHari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']
      const namaBulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
      var today = new Date()
      var haris = today.getDate() 
      var bulans = today.getMonth() 
      var tahuns = today.getFullYear() 
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
        $("#ket-hari").html(namaHari[today.getDay()])
        $("#ket-bulan").html(namaBulan[bulans])
        $("#ket-tahun").html(tahuns)

        loadPendapatan()
        loadOrderSetting()
      })

      function loadOrderSetting() {
        $.ajax({
          url: base_url+'getData/order_setting',
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            // $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            res.forEach(function(val) {
              $("#id_harga").val(val.id) 
              $("#nama_laundry").val(val.nama_laundry)
              $("#alamat_laundry").val(val.alamat_laundry)
              $("#harga").val(val.harga)
              $("#nama_pemilik").val(val.nama_pemilik)
              $("#nama_bank").val(val.nama_bank)
              $("#no_rekening").val(val.no_rekening)
              $("#komisi_kurir").val(val.komisi_kurir_percent)
              $("#komisi_washing").val(val.komisi_washing_percent) 
            })
          }
        }).done(function() {
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }

      $("#form_harga").submit(function () {

        var data = new FormData();
        $.each($('#logo')[0].files, function(i, file) {
            data.append('file-'+i, file);
        });

        data.append('nama_laundry',$("#nama_laundry").val())
        data.append('alamat_laundry',$("#alamat_laundry").val())
        data.append('harga',$("#harga").val())
        data.append('nama_pemilik',$("#nama_pemilik").val())
        data.append('nama_bank',$("#nama_bank").val())
        data.append('no_rekening',$("#no_rekening").val())
        data.append('komisi_kurir',$("#komisi_kurir").val())
        data.append('komisi_washing',$("#komisi_washing").val())
        data.append('id',$("#id_harga").val())

        $.ajax({
          url: base_url+'simpan-harga',
          type: 'post',
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function (res) {
            if(res.status) {
              $("#logo").val('')
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan perubahan setting order', notifOpt)   
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          },
        }).done(function () {
          loadOrderSetting()
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      })

      function loadPendapatan() {
        $.ajax({
          url: base_url+'loadPendapatan',
          type: 'get',
          dataType: 'json',
          success: function (res) {
            let pendapatanHari = 0
            $.each(res.hari, function (ih, valh) {
              pendapatanHari += parseInt(valh.total_harga)
            })

            let pendapatanBulan = 0
            $.each(res.bulan, function (ih, valh) {
              pendapatanBulan += parseInt(valh.total_harga)
            })

            let pendapatanTahun = 0
            $.each(res.tahun, function (ih, valh) {
              pendapatanTahun += parseInt(valh.total_harga)
            })

            $("#hari").html('Rp '+ formatRupiah(pendapatanHari))
            $("#bulan").html('Rp '+ formatRupiah(pendapatanBulan))
            $("#tahun").html('Rp '+ formatRupiah(pendapatanTahun))
          }
        })
      }
    </script>
  </body>
</html>
