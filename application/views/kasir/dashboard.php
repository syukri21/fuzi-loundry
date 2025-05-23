<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
      $pageData = array(
        'title' => 'Kasir Dashboard',
        'mainBreadcrumb' => 'Kasir Dashboard',
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
      <?php $this->load->view('layout/header_kasir', $pageData); ?>
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php $this->load->view('layout/sidebar_kasir'); ?>
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

      $(document).ready(function () { 
        $("#ket-hari").html(namaHari[today.getDay()])
        $("#ket-bulan").html(namaBulan[bulans])
        $("#ket-tahun").html(tahuns)

        loadPendapatan()
      })

      async function loadPendapatan() {
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