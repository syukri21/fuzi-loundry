<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php 
  		$pageData = array(
  			'title' => 'Order',
  			'mainBreadcrumb' => 'Order',
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
                <strong>Penting</strong>
                Jika anda telah membeli <b>paket membership</b> anda tidak perlu melakukan order manual lagi, Kurir kami akan mengantarkan pakaian Anda. 
              </p>
            </div>
            <div class="row"> 
              <div class="col-sm-12 col-xl-6 xl-100">
                <div class="card">
                  <div class="card-header">
                    <div class="default-according style-1" id="accordionoc">
                    <div style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseicon" aria-expanded="true" aria-controls="collapse11">
                      <h5><i class="fa fa-plus"></i> Data Order</h5><span>Klik untuk membuat pesanan online</span>
                    </div> 
                      <div class="collapse show" id="collapseicon" aria-labelledby="collapseicon" data-bs-parent="#accordionoc">
                        <div class="card-body">
                          <form action="javascript:;" id="form_order"> 
                            <input type="hidden" name="harga" id="harga">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $user['id']; ?>">
                            <input type="hidden" name="t_harga" id="t_harga">
                            <div class="alert alert-primary inverse fade show" role="alert"><i class="icofont icofont-location-pin"></i>
                              <p>
                                <strong>
                                  <?php if($user['lokasi'] != '') { ?>
                                    <a target="_blank" href="<?php echo $user['lokasi']; ?>">Lihat Lokasi</a>
                                <?php } ?>
                                </strong>, pakaian Anda akan di ambil pada alamat berikut ini. <br>
                                <p>
                                  <?php echo $user['alamat']; ?>
                                </p> 
                              </p>
                            </div>
                            <div class="row mt-4">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Pilih Paket</label>
                                  <input type="hidden" name="nama_paket" id="nama_paket">
                                  <input type="hidden" name="harga_paket" id="harga_paket">
                                  <select onchange="namaPaket()" required="" name="paket" class="js-example-basic-single col-sm-12" id="paket"></select> 
                                </div>

                                <div class="mt-2">
                                  <label>Berat Pakaian (kg)</label>
                                  <input class="form-control" type="number" name="berat" id="berat" placeholder="Masukkan Berat Pakaian" required="">
                                </div>
                                
                                <input type="hidden" name="kupon" id="kupon">
                                <div id="wadah_kupon" class="my-3">
                                  
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div>Harga Per kg</div>
                                <h5 class="mt-2">Rp <span id="ket-harga">0</span></h5>
                              </div>
                              <div class="col-md-3">
                                <div>Harga <span id="ket-berat">0</span> kg </div>
                                <h5 class="mt-2">Rp <span id="total-harga">0</span></h5>
                                <button class="btn btn-primary mt-3  btn-air-primary"><center> <i class="fa fa-file-text-o"></i> Buat Pesanan</center></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div> 
                    </div>
                  </div>
                  <div class="card-body"> 
                    <div class="alert alert-primary inverse fade show" role="alert"><i class="icofont icofont-info"></i>
                      <p>
                        <strong>Informasi!</strong>, 
                        Jika Anda <b>belum melakukan pembayaran</b> silahkan membayar dengan <b>klik tombol belum bayar</b>.
                      </p>
                    </div>
                    <div class="table-responsive"> 
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th>No</th> 
                            <th>Order ID</th>
                            <th><center>Status Pembayaran</center></th>  
                            <th><center>Status Order</center></th>  
                            <th>Berat Pakaian</th>
                            <th>Total Bayar</th>  
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
          </div>  
          <!-- Container-fluid Ends-->
        </div>

        <!-- Modal Hapus -->
          <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
              <div class="modal-content">
                <form action="javascript:;" id="form_hapus">
                  <input type="hidden" name="order_id" id="hapus_order_id">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"> 
                    Hapus pesanan dengan order id <b><span id="k-hapus"></span></b> ?
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

        <!-- Modal Refund -->
          <div class="modal fade" id="modal-refund" tabindex="-1" role="dialog" aria-labelledby="modal-refund" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="dialog">
              <div class="modal-content">
                <form action="javascript:;" id="form_refund">
                  <input type="hidden" name="order_id" id="refund_order_id">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pengembalian Dana</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"> 
                    <label>Alasan Penolakan</label>
                    <textarea name="alasan_refund" class="form-control" id="alasan_refund" placeholder="Silahkan masukkan alasan untuk mengembalikan dana anda" required="" rows="4"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger" type="submit">Ajukan Pengembalian</button>
                  </div> 
                </form>
              </div>
            </div>
          </div>
          <!-- End Modal Refund -->

        <!-- Modal Selesai -->
        <div class="modal fade" id="modal-selesai" tabindex="-1" role="dialog" aria-labelledby="modal-selesai" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content"> 
              <div class="modal-header">
                <h5 class="modal-title">Anda Telah Menyelesaikan Pembayaran</h5>
              </div> 
              <div class="modal-body">  
                <table cellpadding="5">
                  <tr>
                    <td>Berat Pakaian</td>
                    <td>: <b><span id="sb-berat"></span></b></td>
                  </tr>
                  <tr>
                    <td>Total Bayar</td>
                    <td>: <b><span id="sb-total-harga"></span></b></td>
                  </tr>
                  <tr>
                    <td>Tanggal Order</td>
                    <td>: <b><span id="sb-tanggal-order"></span></b></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
              </div>  
            </div>
          </div>
        </div>
        <!-- End Modal Selesai -->

        <!-- Modal Selesai -->
        <div class="modal fade" id="modal-belum-bayar" tabindex="-1" role="dialog" aria-labelledby="modal-belum-bayar" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="dialog">
            <div class="modal-content"> 
              <div class="modal-header">
                <h5 class="modal-title">Belum Bayar</h5>
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
        <!-- End Modal Selesai -->
        <!-- footer start-->
        <?php $this->load->view('layout/footer'); ?>
      </div>
    </div>
    <?php $this->load->view('layout/js'); ?> 
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-hCnc-G7Vc8crGNVH"></script>
    <script type="text/javascript">    
      'use strict'; 
      const base_url = '<?php echo base_url(); ?>'
      const id_pelanggan = '<?php echo $user['id']; ?>'
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

        var channel = pusher.subscribe('pelanggan-order');
        channel.bind('load-data', function(data) {
          loadData()
        });
      // End Pusher 

    	$(document).ready(function () { 

        var status = '<?php echo $this->session->flashdata('status'); ?>'
        if(status == 'error_cek') {
          $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Order ID tidak ditemukan', notifOpt)    
        }

        loadPaket()
        loadData()
        loadOrderSetting()
        loadKupon()
      })

      function loadData() {
        $.ajax({
          url: base_url+'getOrderByPelanggan/'+id_pelanggan,
          type: 'get',
          dataType: 'json',
          beforeSend: function() { 
            $('#basic-1').dataTable().fnClearTable();
            $('#basic-1').dataTable().fnDestroy(); 
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            if(res.length == 0) {
                $('#basic-1').DataTable();  
                $('.loader-wrapper').fadeOut('slow', function () {}); 
            }

            let tbody = null
            let no = 1
            let btnBayar = '' 

            res.forEach(function(val) {
              let tgl = new Date(val.tanggal_order)
              let waktu = tgl.getHours()+':'+tgl.getMinutes()
              let format_tgl = tgl.getDate()+' '+bulan[parseInt(tgl.getMonth())]+' '+tgl.getFullYear() 


              if(val.status_pembayaran == 'belum_bayar') {
                btnBayar = `
                  <button onclick="belumBayar('${val.order_id}')" class="btn btn-air-danger btn-pill btn-danger">Belum Bayar</button>
                `
              } else if(val.status_pembayaran == 'settlement') {
                btnBayar = `
                  <button onclick="openDialogFinish('${val.berat}',${val.total_harga}, '${waktu}', '${format_tgl}')" class="btn btn-air-primary btn-pill btn-primary">Sudah Bayar</button>
                `
              } else {
                btnBayar = `
                  <button class="btn btn-air-dark btn-pill btn-dark">Tidak Terdaftar</button>
                `
              }

              let btnStatusOrder = '';
              if(val.status_order == 'pending') {
                btnStatusOrder = `
                  <span class="badge badge-dark">Pending</span>
                `
              } else if(val.status_order == 'penjemputan') {
                btnStatusOrder = `
                  <span class="badge badge-info">Penjemputan</span>
                `
              } else if(val.status_order == 'pencucian') {
                btnStatusOrder = `
                  <span class="badge badge-success">Proses Pencucian</span>
                `
              } else if(val.status_order == 'selesai_cuci') {
                btnStatusOrder = `
                  <span class="badge badge-secondary">Selesai Mencuci</span>
                `
              } else if(val.status_order == 'pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-warning">Pengantaran</span>
                `
              } else if(val.status_order == 'selesai_pengantaran') {
                btnStatusOrder = `
                  <span class="badge badge-primary">Selesai</span>
                `
              }

               tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${val.order_id}</td> 
                  <td align="center">
                    ${btnBayar}
                  </td>
                  <td align="center">
                    ${btnStatusOrder}
                  </td> 
                  <td>${val.berat} kg</td> 
                  <td>Rp ${formatRupiah(val.total_harga)}</td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
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

      function loadKupon() {
        var id_pengundang = "<?php echo $this->session->userdata('id'); ?>"
        $.ajax({
          url: base_url+'getKupon/'+id_pengundang,
          type: 'get',
          dataType: 'json',
          success: function (res) {
            if(res.length != 0) {
              $.each(res, function (i, isi) {
                if(isi.status == 'belum_dipakai') {
                  $("#wadah_kupon").html(`
                    Dengan menggunakan kupon anda tidak perlu membayar
                    <button class="btn btn-primary btn-air-primary mt-2" type="button" onclick="pakaiKupon(${isi.id})"><i class="fa fa-ticket"></i> Pakai Kupon</button>
                  `)
                } else {
                  $("#kupon").val('')
                  $("#wadah_kupon").html('')
                }
              })
            } else {
              $("#kupon").val('')
              $("#wadah_kupon").html('')
            }
          }
        })
      }

      function pakaiKupon(id) {
        $("#kupon").val(id)
        $("#wadah_kupon").html('<span class="badge badge-primary">Kupon Dipakai</span> <br>Anda tidak perlu membayar ')
      }

      function belumBayar(order_id) {
        $("#k-no_order").html(order_id)

        $("#modal-belum-bayar").modal('toggle')
      }

      function snapBayar(snap) {
        window.snap.pay(snap);
      }

      function openDialogFinish(berat, total_harga, waktu, tanggal) { 
        $("#sb-berat").html(berat+' kg')
        $("#sb-total-harga").html("Rp "+formatRupiah(total_harga))
        $("#sb-tanggal-order").html(tanggal+' Pukul '+waktu)

        $("#modal-selesai").modal('toggle')
      }

      function openHapus(order_id) {
        $("#k-hapus").html(order_id)
        $("#hapus_order_id").val(order_id)

        $('#modal-hapus').modal('toggle')
      }

      $("#form_hapus").submit(function () {
        $('#modal-hapus').modal('toggle')
        $.ajax({
          url: base_url+'hapus-order',
          type: 'post',
          dataType: 'json',
          data: $(this).serialize(),
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            if(res.status) {
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menghapus pesanan', notifOpt)    
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          }
        }).done(function () {
          loadData()
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      })

      function openRefund(order_id) {
        $("#refund_order_id").val(order_id)

        $('#modal-refund').modal('toggle')
      }

      $("#form_refund").submit(function () {
        $('#modal-refund').modal('toggle')
        $.ajax({
          url: base_url+'persetujuan-refund-order',
          type: 'post',
          dataType: 'json',
          data: $(this).serialize(),
          beforeSend: function () {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            $("#alasan_refund").val('')
            if(res.status) {
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> mengajukan pengembalian dana', notifOpt)    
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }
          }
        }).done(function () {
          loadData()
          $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
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
              // $("#id_harga").val(val.id)
              $("#k-nama_pemilik").html(val.nama_pemilik)
              $("#k-nama_bank").html(val.nama_bank)
              $("#k-no_rekening").html(val.no_rekening)
            })
          }
        }).done(function() {
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }

      $("#berat").keyup(function () {
        var harga = parseInt($('#berat').val()) * parseInt($('#harga').val())
        $("#ket-berat").html($(this).val())
        $("#t_harga").val(harga)
        $("#total-harga").html(formatRupiah(harga))
      })

      $("#form_order").submit(function () {
        $.ajax({
          url: base_url+'tambah-order',
          type: 'post',
          data: $('#form_order').serialize(),
          dataType: 'json',
          beforeSend: function() {
            $('.loader-wrapper').fadeIn('slow', function () {}); 
          },
          success: function(res) {
            if(res.status) {
              $.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan data pesanan', notifOpt)    
            } else {
              $.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt) 
            }

            $("#ket-berat").html('0')
            $("#t_harga").html('')
            $("#total-harga").html('0')
            $("#berat").val('')
            $("#harga").val('')
            $("#ket-harga").html('0')
          }
        }).done(function () {
          loadData() 
          loadKupon()
          loadPaket()
        })
      })

      function loadPaket() {
        $.ajax({
          url: base_url+'getData/paket_reguler',
          dataType: 'json',
          type: 'get',
          success: function (res) {
            let option = '<option value="">Pilih Paket Reguler</option>'
            $.each(res, function (i, val) {
              option += `
                <option value="${val.id}">${val.nama_paket} (Rp ${formatRupiah(val.harga_paket)})</option>
              `
            })

            $("#paket").html(option)
          }
        }).done(function () {
          $("#paket").select2()
        })
      }

      function namaPaket() { 
        var id = $('#paket').val()
        $.ajax({
          url: base_url+'getDataPaketById/'+id,
          dataType: 'json',
          type: 'get',
          success: function (res) { 
            $.each(res, function (i, val) {
              if($("#berat").val() == '' || $("#berat").val() == null) {
                $("#ket-berat").html('1')
                $("#berat").val(1)
              }

              $("#ket-harga").html(formatRupiah(val.harga_paket))
              $("#i_harga").val(val.harga_paket)
              $("#harga").val(val.harga_paket) 


              $("#ket-harga_e").html(formatRupiah(val.harga_paket))
              $("#i_harga_e").val(val.harga_paket)

              $("#nama_paket").val(val.nama_paket)
              $("#harga_paket").val(val.harga_paket)

              var total = parseInt($("#berat").val() * $("#harga").val())
              $("#t_harga").val(total)
              $("#total-harga").html(formatRupiah(total))
            })
          }
        })
      }
    </script>
  </body>
</html>