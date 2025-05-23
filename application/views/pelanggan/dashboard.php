<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Pelanggan Dashboard',
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
        <?php $this->load->view('layout/sidebar_pelanggan'); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">        
            <?php $this->load->view('layout/breadcrumb', $pageData); ?>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid"> 
            <div class="alert alert-primary inverse fade show" role="alert"><i class="icofont icofont-info"></i>
              <p>
                <strong>Informasi</strong>
                Dapatkan 1 tiket order secara gratis dengan mengajak 10 teman anda untuk bergabung dengan kami.
                <a href="<?php echo base_url('undang-teman') ?>">Undang Teman</a>
              </p>
            </div>
            <div class="row" id="promo-section">
              <div class="col-12">
                <h5 class="mb-3">Promo Paket</h5>
                <div class="owl-carousel owl-theme" id="owl-carousel-13"> 
                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-6 xl-100 box-col-12">
                <div class="card"> 
                  <div class="card-body">
                    <div id="membership">
                      <h5 class="card-title">Pembelian Membership</h5>
                      <table class="table">
                        <tr>
                          <td><span class="mt-4 f-16 text-muted">Nama Paket</span> </td>
                          <td><span id="nama_paket_m"></span></td>  
                        </tr>
                        <tr>
                          <td><span class="mt-4 f-16 text-muted">Harga Paket</span> </td>
                          <td><span id="harga_paket_m"></span></td>
                        </tr>
                        <tr>
                          <td><span class="mt-4 f-16 text-muted">Durasi Paket</span> </td>
                          <td><span id="durasi_m"></span></td>
                        </tr>
                        <tr>
                          <td><span class="mt-4 f-16 text-muted">Pengambilan</span> </td>
                          <td><span id="pengambilan_m"></span></td>
                        </tr>
                        <tr>
                          <td><span class="mt-4 f-16 text-muted">Keterangan Paket</span> </td>
                          <td><span id="keterangan_paket_m"></span></td>
                        </tr>
                        <tr>
                          <td><span class="mt-4 f-16 text-muted">Status Pembayaran</span> </td>
                          <td><span id="status_pembayaran_m"></span></td>
                        </tr> 
                      </table>
                    </div>
                    <div id="jadwal" class="mt-3">
                      <h5 class="card-title">Jadwal Paket (Membership)</h5>
                      <div class="cal-date-widget card-body">
                        <div class="row">
                          <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                            <div class="cal-info text-center">
                              <h2><span id="tanggal_s"></span></h2>
                              <div class="d-inline-block mt-2"><span class="b-r-dark pe-3"><span id="bulan_s"></span></span><span class="ps-3"><span id="tahun_s"></span></span></div>
                              <p class="mt-4 f-16 text-muted">
                                Kurir kami akan mengantarkan pakaian Anda pada setiap tanggal yang berlatar belakang biru 
                              </p>
                            </div>
                          </div>
                          <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6 mt-2">
                            <hr>
                            <p>Jika jadwal tidak muncul, klik tombol dibawah ini</p>
                            <button class="btn btn-primary btn-air-primary btn-pill mb-3" onclick="muatUlangJadwal()"><i class="fa fa-refresh"></i> Muat Jadwal</button>
                            <div class="cal-datepicker">
                              <div class="datepicker-here float-sm-end" data-language="en">           </div>
                            </div>
                          </div>
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

        <!-- Modal Pesan -->
        <div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog" aria-labelledby="modal-pesan" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">
              <form action="javascript:;" id="form_pesan">
                <input type="hidden" name="id_paket" id="id_paket">
                <input type="hidden" name="id_pelanggan" value="<?php echo $user['id']; ?>">
                <div class="modal-header">
                  <h5 class="modal-title">Konfirmasi Pembelian Paket</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                  <p>Data jadwal akan muncul jika pembelian telah terkonfirmasi. <br> Beli <b><span id="nama_paket_p"></span> (Rp <span id="harga_paket_p"></span>)</b> ?</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-primary" type="submit">Beli</button>
                </div> 
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Pesan -->

        <!-- Modal Belum Bayar -->
        <div class="modal fade" id="modalBelumBayar" tabindex="-1" role="dialog" aria-labelledby="modalBelumBayar" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">  
              <div class="modal-header">
                <h5 class="modal-title">Belum Bayar</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body"> 
                <p>
                  Silahkan melakukan pembayaran dengan melakukan transfer ke nomor rekening bank berikut ini
                </p>

                <table cellpadding="5" class="mb-3">
                  <tr>
                    <td>Nama Pemilik Rekening</td>
                    <td>: <b><span id="k-nama_pemilik"></span></b></td>
                  </tr>
                  <tr>
                    <td>Nama Bank</td>
                    <td>: <b><span id="k-nama_bank"></span></b></td>
                  </tr>
                  <tr>
                    <td>Nomor Rekening</td>
                    <td>: <b><span id="k-no_rekening"></span></b></td>
                  </tr>
                </table>

                <p>Atau anda bisa langsung ke outlet kami. dengan menunjukkan no order ini <b><span id="k-no_order"></span></b></p> 
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
              </div>  
            </div>
          </div>
        </div>
        <!-- End Modal Belum Bayar -->

        <!-- Modal Batal -->
        <div class="modal fade" id="modalBatal" tabindex="-1" role="dialog" aria-labelledby="modalBelumBayar" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content">  
              <form action="javascript:;" id="form_batal">
                <input type="hidden" name="id" id="id_paket_b">
                <div class="modal-header">
                  <h5 class="modal-title">Batalkan Pesanan</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                  <p>
                    Yakin untuk membatalkan pesanan ?
                  </p> 
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-danger" type="submit">Batalkan</button>
                </div>  
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal Batal -->

        <?php $this->load->view('layout/loader'); ?>
        <!-- footer start-->
        <?php $this->load->view('layout/footer'); ?>
      </div>
    </div>
    <?php $this->load->view('layout/js'); ?> 
    <script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.pelanggan.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script type="text/javascript">   
      const base_url = '<?php echo base_url(); ?>'
      var today = new Date()
      var dateNow = today.getDate() 
      var monthNow = today.getMonth() 
      var yearNow = today.getFullYear() 
      const bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
      var dataPaket = {}

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

        var channel = pusher.subscribe('pelanggan-membership');
        channel.bind('load-data', function(data) {
          reload()
        });
      // End Pusher 

      var jadwal_change = false
      let pergantian = null
      
      $("#tanggal_s").html(dateNow)
      $("#bulan_s").html(bulan[monthNow])
      $("#tahun_s").html(yearNow)

      var jadwalPage = ''
      var orderMembershipPage = ''
      var pembelianPage = ''

      $(document).ready(function () {
        loadMembership() 
        getPromo() 
        loadOrderSetting()
      })

      function reload() {
        window.location.reload()
      }
      
      function loadData(argument) {
        setTimeout(function() {
          dateLoad()
          var action = $(".datepicker--nav-action[data-action='next']")
          $(".datepicker--nav-action[data-action='next']").click(function () {
            setTimeout(function() {
              jadwal_change = true
              dateLoad()
            }, 100);
          })

          $(".datepicker--nav-action[data-action='prev']").click(function () { 
            setTimeout(function() {
              jadwal_change = false
              dateLoad()
            }, 100);
          })   
        }, 100); 
      } 

      function muatUlangJadwal() {
        // jadwal_change = false
        // pergantian = null
        // loadData()
        window.location.reload()
      }

      function dateLoad() {
        var sekarang = new Date()
        var tgl_aktif_def = new Date(dataPaket.tgl_aktif)
        var tgl_aktif = new Date(dataPaket.tgl_aktif)
        tgl_aktif.setDate(tgl_aktif_def.getDate() + dataPaket.durasi-1)

        var d_terakhir = tgl_aktif.getDate()
        var m_terakhir = parseInt(tgl_aktif.getMonth())
        var y_terakhir = tgl_aktif.getFullYear()

        var d_aktif = tgl_aktif_def.getDate()
        var m_aktif = parseInt(tgl_aktif_def.getMonth() + 1)
        var y_aktif = tgl_aktif_def.getFullYear()

        var d_sekarang = sekarang.getDate()
        var m_sekarang = parseInt(sekarang.getMonth())
        var y_sekarang = sekarang.getFullYear()

        var f_terakhir = y_terakhir+'-'+m_terakhir+'-'+d_terakhir
        var f_sekarang = y_sekarang+'-'+m_sekarang+'-'+d_sekarang
        if(Date.parse(sekarang) > Date.parse(tgl_aktif)) { 
          $.ajax({
            url: base_url+'nonaktifkan-membership/'+dataPaket.id,
            type: 'get',
            dataType: 'json',
            success: function(res) {
              window.location.reload()
            }
          })
        }

        let x = 0
        var date = $(".datepicker--cell").find("[data-date]") 
        let now = new Date(dataPaket.tgl_aktif)
        if(jadwal_change) {
          x = new Date(pergantian)
          let d_pergantian = x.getDate()
          let m_pergantian = parseInt(x.getMonth()+1)
          let y_pergantian = x.getFullYear()
          let f_pergantian = y_pergantian+"-"+m_pergantian+"-"+d_pergantian
          // console.log(f_pergantian)
          now = new Date(f_pergantian)
        } else {
          now = new Date(dataPaket.tgl_aktif)
        }
        let jml_ambil = 0
        let pengurangan = 0
        $.each(date.prevObject, function( index, value ) { 
          x++ 
          let d_jadwal = $(this).attr('data-date')
          let m_jadwal = $(this).attr('data-month')
          let y_jadwal = $(this).attr('data-year')
          let f_jadwal = y_jadwal+"-"+m_jadwal+"-"+d_jadwal

          let d_now = now.getDate()
          let m_now = parseInt(now.getMonth())
          let y_now = now.getFullYear()
          let f_now = y_now+"-"+m_now+"-"+d_now

          if(f_now == f_jadwal) {
            // console.log(f_now+' '+f_jadwal)
            now.setDate(now.getDate() + dataPaket.pengambilan + 1)
            pergantian = now
            jml_ambil ++
            $(this).addClass('-focus- -selected-')  
          }   
 
          if(f_terakhir == f_jadwal) { 
            return false
          }  
        })
      } 

      $("#form_pesan").submit(function () {
        $("#modal-pesan").modal('toggle')
        $.ajax({
          url: base_url+'pesan-membership',
          type: 'post',
          data: $(this).serialize(),
          dataType: 'json',
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            if(res.status) {
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> memesan paket', notifOpt)    
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> kesalahan sistem', notifOpt)    
            }
          }
        }).done(function () {  
          window.location.reload() 
        })
      })

      function loadMembership() {
        $.ajax({
          url: base_url+'getMembership',
          type: 'get', 
          dataType: 'json',
          beforeSend: function () { 
          },
          success: function(res) {   
            let isi = ''
            let last = 0 
            $.each(res, function (i, val) {  
              dataPaket = {
                id : val.id,
                tgl_aktif : val.tgl_aktif,
                durasi : parseInt(val.durasi),
                pengambilan : parseInt(val.pengambilan),
              } 
              let btnBayar = ''
              if(val.status_pembayaran == 'sudah_bayar') { 
                loadData()
                btnBayar = `
                  <span class="badge badge-primary">Sudah Bayar</span>
                `
              } else {
                jadwalPage = $("#jadwal").html()
                $("#jadwal").html('')
                btnBayar = `
                  <button onclick="openBelumBayar()" class="btn btn-warning btn-air-warning"><i class="icon-timer"></i> Belum Bayar</button>
                  <button onclick="openBatal(${val.id})" class="btn btn-danger btn-air-danger"><i class="fa fa-remove"></i> Batalkan Pesanan</button>
                `
              }

              $("#nama_paket_m").html(val.nama_paket)
              $("#harga_paket_m").html('Rp '+formatRupiah(val.harga_paket))
              $("#durasi_m").html(val.durasi+' Hari')
              $("#pengambilan_m").html(`Pakaian anda akan diambil setiap ${val.pengambilan} hari sekali`)
              $("#keterangan_paket_m").html(val.keterangan_paket)
              $("#status_pembayaran_m").html(btnBayar) 
            }) 

            if(res.length == last) { 
            }

            if(res.length == 0) {
              $("#jadwal").html('')
              $("#membership").html(`<h5 class="card-title">Silahkan Memesan Paket</h5> Anda juga bisa memesan lewat menu order <a href="${base_url+'pelanggan-order'}">Klik disini</a> `)
            } else {
              orderMembershipPage = $("#promo-section").html()
              $("#promo-section").html('')
            }
          }
        })
      }
 
      function getPromo() {
        $.ajax({
          url: base_url+'getData/paket_laundry',
          type: 'get', 
          dataType: 'json',
          beforeSend: function () { 
          },
          success: function(res) {
            let isi = ''
            let last = 0
            $.each(res, function (i, val) { 
              isi += `
                <div class="item" style="cursor: pointer" onclick="pesanPaket(${val.id},'${val.nama_paket}', ${val.harga_paket})">
                  <div class="card o-hidden">
                    <div class="bg-${getColor()} b-r-4 card-body">
                      <div class="media static-top-widget">
                        <div class="align-self-center text-center"><span style="font-size: 30px;"><i class="icon-shopping-cart"></i></span></div>
                        <div class="media-body"><span class="m-0"><b>${val.nama_paket}</b></span><br>
                          <span class="m-0">${val.keterangan_paket}</span>
                          <h4 class="mb-0 counter">Rp ${formatRupiah(parseInt(val.harga_paket))}</h4>
                          <span style="font-size: 120px;"><i class="icofont icofont-bag icon-bg"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>   
              `
              last++
            }) 
            if(res.length == last) {
              $("#owl-carousel-13").html(isi)  
              loadOwl()
            }
          }
        })
      }

      function pesanPaket(id_paket_laundry, nama_paket, harga_paket) {
        $("#id_paket").val(id_paket_laundry)
        $("#nama_paket_p").html(nama_paket)
        $("#harga_paket_p").html(formatRupiah(harga_paket))
        $("#modal-pesan").modal('toggle')
      }

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
              $("#k-nama_pemilik").html(val.nama_pemilik)
              $("#k-nama_bank").html(val.nama_bank)
              $("#k-no_rekening").html(val.no_rekening)
            })
          }
        }).done(function() {
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }

      function loadOwl() {
        var owl = $('#owl-carousel-13');
        owl.owlCarousel({
            items:5,
            loop:false,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            nav: false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
      }

      function openBatal(id) {
        $("#id_paket_b").val(id) 

        $("#modalBatal").modal('toggle')
      }

      $("#form_batal").submit(function () {
        $("#modalBatal").modal('toggle')
        $.ajax({
          url: base_url+'batalkan-pesanan',
          type: 'post',
          data: $('#form_batal').serialize(),
          dataType: 'json',
          beforeSend: function () {
            $('.loader-wrapper').fadeOut('slow', function () {}); 
          },
          success: function (res) {
            if(res) {
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> membatalkan paket', notifOpt)    
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> batalkan paket', notifOpt)    
            }
          }
        }).done(function () { 
          window.location.reload()  
        })
      })

      function getColor() {
        var i = Math.floor(Math.random() * 5)
        var color = ['primary','success','secondary','warning','info']
        return color[i]
      }

      function openBelumBayar() {
        $("#modalBelumBayar").modal('toggle')
      }
    </script>
  </body>
</html>