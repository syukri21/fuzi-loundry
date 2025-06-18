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
	<?php $this->load->view('layout/head', $pageData); ?>
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
								<div class="card-header">
									<div class="default-according style-1" id="accordionoc">
										<div style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseicon" aria-expanded="true" aria-controls="collapse11">
											<h5><i class="fa fa-plus"></i> Data Order</h5><span>Klik untuk menambah data order reguler / offline</span>
										</div>
										<input type="hidden" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga per Kg">
										<div class="collapse show" id="collapseicon" aria-labelledby="collapseicon" data-bs-parent="#accordionoc">
											<div class="card-body">
												<form action="javascript:;" id="form_order">
													<input type="hidden" name="from" value="admin">
													<input type="hidden" name="harga" id="i_harga">
													<input type="hidden" name="t_harga" id="t_harga">
													<div class="row">
														<div class="col-md-12">
															<label>Pelanggan</label>
															<select required="" name="id_pelanggan" class="js-example-basic-single col-sm-12" id="pelanggan"></select>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-6">
															<div class="form-group">
																<label>Pilih Paket</label>
																<input type="hidden" name="id_paket" id="id_paket">
																<input type="hidden" name="nama_paket" id="nama_paket">
																<input type="hidden" name="harga_paket" id="harga_paket">
																<select onchange="namaPaket()" required="" name="paket" class="js-example-basic-single col-sm-12" id="paket"></select>
															</div>

															<div class="form-group mt-2">
																<label>Berat Pakaian (kg)</label>
																<input class="form-control" type="number" name="berat" id="berat" placeholder="Masukkan Berat Pakaian" required="">
															</div>
														</div>
														<div class="col-md-3">
															<div>Harga Per kg</div>
															<h5 class="mt-2">Rp <span id="ket-harga">0</span></h5>
														</div>
														<div class="col-md-3">
															<div>Total Harga <span id="ket-berat">0</span> kg </div>
															<h5 class="mt-2">Rp <span id="total-harga">0</span></h5>
															<button class="btn btn-primary mt-3  btn-air-primary">
																<center> <i class="fa fa-file-text-o"></i> Buat Pesanan</center>
															</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
										<li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i class="icofont icofont-check"></i>Order
												<span class="badge badge-secondary rounded-pill"><span id="jumlah_sudah_bayar"></span></span></a></li>
										<!-- <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-controls="info-profile" aria-selected="false"><i class="icofont icofont-time"></i>Belum Bayar <span class="badge badge-secondary rounded-pill"><span id="jumlah_belum_bayar"></span></span></a></li>  -->
										<!-- <li class="nav-item"><a class="nav-link" id="pengembalian-dana-tab" data-bs-toggle="tab" href="#pengembalian-dana" role="tab" aria-controls="pengembalian-dana" aria-selected="false"><i class="icofont icofont-history"></i>Pengembalian Dana <span class="badge badge-secondary rounded-pill"><span id="jumlah_pengembalian_dana"></span></span></a></li>  -->
									</ul>
									<div class="tab-content" id="info-tabContent">
										<div class="tab-pane fade show active" id="info-home" role="tabpanel" aria-labelledby="info-home-tab">
											<div class="table-responsive">
												<table class="display" id="basic-1">
													<thead>
														<tr>
															<th>No</th>
															<th>Order ID</th>
															<th>Nama Pelanggan</th>
															<th>Nama Paket</th>
															<th>Harga Paket</th>
															<th>
																<center>Status Pembayaran</center>
															</th>
															<th>
																<center>Status Order</center>
															</th>
															<th>Berat Pakaian</th>
															<th>Total Bayar</th>
															<th>
																<center>Kategori Pesanan</center>
															</th>
															<th>Tanggal Order</th>
															<th>
																<center>Aksi</center>
															</th>
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
															<th>Order ID</th>
															<th>Nama Pelanggan</th>
															<th>
																<center>Status Pembayaran</center>
															</th>
															<th>Berat Pakaian</th>
															<th>Total Bayar</th>
															<th>
																<center>Kategori Pesanan</center>
															</th>
															<th>Tanggal Order</th>
														</tr>
													</thead>
													<tbody id="tbody-2">

													</tbody>
												</table>
											</div>
										</div> <!-- 
                      <div class="tab-pane fade" id="pengembalian-dana" role="tabpanel" aria-labelledby="pengembalian-dana-tab">
                        <div class="table-responsive"> 
                          <table class="display" id="basic-3">
                            <thead>
                              <tr>
                                <th>No</th> 
                                <th>Order ID</th>
                                <th>Nama Pelanggan</th>
                                <th><center>Status Pembayaran</center></th>  
                                <th><center>Status Persetujuan</center></th>  
                                <th><center>Status Order</center></th>  
                                <th>Berat Pakaian</th>
                                <th>Total Bayar</th>  
                                <th><center>Kategori Pesanan</center></th>  
                                <th>Tanggal Order</th>   
                              </tr>
                            </thead> 
                            <tbody id="tbody-3">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>  -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Container-fluid Ends-->
			</div>
			<!-- Modal Konfirmasi -->
			<div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal-konfirmasi" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_konfirmasi">
							<input type="hidden" name="order_id" id="konfirmasi_order_id">
							<input type="hidden" name="status" id="konfirmasi_status">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Bayar</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Bayar pesanan dengan order id <b><span id="k-konfirmasi"></span></b> ?
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Bayar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Konfirmasi -->
			<!-- Modal Cancel -->
			<div class="modal fade" id="modal-cancel" tabindex="-1" role="dialog" aria-labelledby="modal-cancel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_cancel">
							<input type="hidden" name="order_id" id="cancel_order_id">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Pembatalan</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Cancel pesanan dengan order id <b><span id="k-cancel"></span></b> ?
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-dark" type="submit">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Cancel -->

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

			<!-- Modal Bayar -->
			<div class="modal fade" id="modal-bayar" tabindex="-1" role="dialog" aria-labelledby="modal-bayar" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_bayar">
							<input type="hidden" name="order_id" id="bayar_order_id">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Bayar</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Lunasi pembayaran pesanan dengan order id <b><span id="k-bayar"></span></b> ?
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Bayar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Bayar -->

			<!-- Modal Penjemputan -->
			<div class="modal fade" id="modal-penjemputan" tabindex="-1" role="dialog" aria-labelledby="modal-penjemputan" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_penjemputan">
							<input type="hidden" name="order_id" id="penjemputan_order_id">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Penjemputan</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<label>Kurir</label>
								<select required="" id="kurir" name="id_kurir" class="form-control"></select>
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Konfirmasi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Penjemputan -->

			<!-- Modal Pencucian -->
			<div class="modal fade" id="modal-pencucian" tabindex="-1" role="dialog" aria-labelledby="modal-pencucian" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_pencucian">
							<input type="hidden" name="order_id" id="pencucian_order_id">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Pencucian</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<label>Pencuci</label>
								<select required="" id="pencuci" name="id_pencuci" class="form-control"></select>
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Konfirmasi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Pencucian -->

			<!-- Modal Selesai Cuci -->
			<div class="modal fade" id="modal-selesai_cuci" tabindex="-1" role="dialog" aria-labelledby="modal-selesai_cuci" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_selesai_cuci">
							<input type="hidden" name="order_id" id="selesai_cuci_order_id">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Selesai Cuci</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Cucian pelanggan dengan Order ID <b><span id="sc-order_id"></span></b> selesai dicuci ?
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Selesai</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Selesai Cuci -->

			<!-- Modal Pengantaran -->
			<div class="modal fade" id="modal-pengantaran" tabindex="-1" role="dialog" aria-labelledby="modal-pengantaran" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_pengantaran">
							<input type="hidden" name="order_id" id="pengantaran_order_id">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Pengantaran</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Cucian pelanggan dengan Order ID <b><span id="p-order_id"></span></b> siap diantarkan ?
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Antarkan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Pengantaran -->

			<!-- Modal Selesai Pengantaran -->
			<div class="modal fade" id="modal-selesai_pengantaran" tabindex="-1" role="dialog" aria-labelledby="modal-selesai_pengantaran" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_selesai_pengantaran">
							<input type="hidden" name="order_id" id="selesai_pengantaran_order_id">
							<div class="modal-header">
								<h5 class="modal-title">Konfirmasi Pengambilan</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								Cucian pelanggan dengan Order ID <b><span id="sp-order_id"></span></b> di ambil ?
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Selesai</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Selesai Pengantaran -->

			<!-- Modal Persetujuan Refund -->
			<div class="modal fade" id="modal-persetujuan" tabindex="-1" role="dialog" aria-labelledby="modal-persetujuan" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_persetujuan">
							<input type="hidden" name="order_id" id="persetujuan_order_id">
							<input type="hidden" name="alasan" id="alasan_i">
							<input type="hidden" name="total_harga" id="total_harga_i">
							<div class="modal-header">
								<h5 class="modal-title">Lakukan Persetujuan</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<label>Alasan Refund : </label>
								<p id="alasan_penolakan_p"></p>
								<label>Persetujuan : </label>
								<select class="form-control" name="persetujuan" id="persetujuan" required="">
									<option value="">Pilih Persetujuan</option>
									<option value="setuju">Setujui</option>
									<option value="tolak">Tolak</option>
								</select>
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
								<button class="btn btn-primary" type="submit">Konfirmasi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Persetujuan Refund -->
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

			<!-- Modal Edit -->
			<div class="modal bd-example-modal-lg fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered" role="dialog">
					<div class="modal-content">
						<form action="javascript:;" id="form_edit">
							<input type="hidden" name="id" id="id_edit">
							<div class="modal-header">
								<h5 class="modal-title">Edit Data Order</h5>
								<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<input type="hidden" name="from" value="admin">
								<input type="hidden" name="harga" id="i_harga_e">
								<input type="hidden" name="t_harga" id="t_harga_e">
								<div class="row">
									<div class="col-md-12">
										<label>Pelanggan</label>
										<select required="" name="id_pelanggan" class="js-example-basic-single col-sm-12 form-control" id="pelanggan_e"></select>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group">
											<label>Pilih Paket</label>
											<input type="hidden" name="nama_paket" id="nama_paket_e">
											<input type="hidden" name="harga_paket" id="harga_paket_e">
											<select onchange="namaPaketE()" required="" name="paket" class="form-control" id="paket_e"></select>
										</div>

										<div class="mt-2">
											<label>Berat Pakaian (kg)</label>
											<input class="form-control" type="number" name="berat" id="berat_e" placeholder="Masukkan Berat Pakaian" required="">
										</div>
									</div>
									<div class="col-md-3">
										<div>Harga Per kg</div>
										<h5 class="mt-2">Rp <span id="ket-harga_e"></span></h5>
									</div>
									<div class="col-md-3">
										<div>Harga <span id="ket-berat_e">0</span> kg </div>
										<h5 class="mt-2">Rp <span id="total-harga_e">0</span></h5>
									</div>
								</div>
								<div class="modal-footer mt-3">
									<button class="btn btn-dark" type="button" data-bs-dismiss="modal">Cancel</button>
									<button class="btn btn-secondary" type="submit">Simpan Perubahan</button>
								</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal Edit -->

			<!-- footer start-->
			<?php $this->load->view('layout/footer'); ?>
		</div>
	</div>
	<?php $this->load->view('layout/loader'); ?>
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
		const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		const notifOpt = {
			type: 'theme',
			allow_dismiss: true,
			delay: 3000,
			showProgressbar: true,
			timer: 300,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			}
		}

		// Pusher
		var pusher = new Pusher('93cd4823970b1fb2ec93', {
			cluster: 'ap1'
		});

		var channel = pusher.subscribe('admin-order');
		channel.bind('load-data', function(data) {
			loadAll()
		});
		// End Pusher

		$(document).ready(function() {
			loadAll()
		})

		function loadAll() {
			loadPelanggan()
			loadPaket()
			loadKurir()
			loadPencuci()
			// loadOrderSetting()
			loadSudahBayar()
			loadBelumBayar()
			// loadRefund()
		}

		function loadSudahBayar() {
			$.ajax({
				url: base_url + 'getOrderByStatus/settlement',
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
						let waktu = tgl.getHours() + ':' + tgl.getMinutes()
						let format_tgl = tgl.getDate() + ' ' + bulan[parseInt(tgl.getMonth())] + ' ' + tgl.getFullYear()

						if (resOrder.status_pembayaran == 'settlement') {
							btnBayar = `
                  <button onclick="openDialogFinish('${resOrder.berat}',${resOrder.total_harga}, '${waktu}', '${format_tgl}')"  class="badge btn badge-primary">Sudah Bayar</button>
                `
						} else if (resOrder.status_pembayaran == "pending") {
							btnBayar = `
                  <button class="btn btn-air-warning btn-pill btn-warning">Selesaikan Pembayaran</button>
                `
						} else if (resOrder.status_pembayaran == "deny") {
							btnBayar = `
                  <span class="badge badge-danger">Ditolak</span>
                  <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                `
						} else if (resOrder.status_pembayaran == "expire") {
							btnBayar = `
                  <span class="badge badge-dark">Kadaluarsa</span>
                  <button ="btn btn-dark btn-sm"><i class="fa fa-trash-o"></i></button>
                `
						} else if (resOrder.status_pembayaran == "belum_bayar") {
							if (resOrder.kategori_order == 'online') {
								btnBayar = `
                    <span class="badge badge-danger">Bayar</span>
                    <button onclick="openBayar(${resOrder.order_id})" class="btn btn-primary btn-air-primary mt-2"><i class="fa fa-check"></i></button>
                  `
							} else {
								btnBayar = `
                    <button onclick="openKonfirmasi(${resOrder.order_id},'settlement')" class="btn btn-air-danger btn-pill btn-danger">Bayar</button>
                  `
							}
						} else {
							btnBayar = `
                  <button class="btn btn-air-dark btn-pill btn-dark">${resOrder.transaction_status}</button>
                `
						}

						let badgeKategori = '';
						if (resOrder.kategori_order == 'online') {
							badgeKategori = 'badge-success'
						} else {
							badgeKategori = 'badge-secondary'
						}

						let btnStatusOrder = '';
						if (resOrder.status_order == 'pending') {
							btnStatusOrder = `
                  <button onclick="openSelesaiCuci(${resOrder.order_id})" class="btn btn-success">Proses Pencucian</button>
                `
						} else if (resOrder.status_order == 'penjemputan') {
							btnStatusOrder = `
                  <button onclick="openPencucian(${resOrder.order_id})" class="btn btn-info">Penjemputan</button>
                `
						} else if (resOrder.status_order == 'pencucian') {
							btnStatusOrder = `
                  <button onclick="openSelesaiPengantaran(${resOrder.order_id})" class="btn btn-success">Proses Pencucian</button>
                `
						} else if (resOrder.status_order == 'selesai_cuci') {
							btnStatusOrder = `
                  <button onclick="openSelesaiPengantaran(${resOrder.order_id})" class="btn btn-warning">Pengambilan</button>
                `
						} else if (resOrder.status_order == 'pengantaran') {
							btnStatusOrder = `
                  <button onclick="openSelesaiPengantaran(${resOrder.order_id})" class="btn btn-warning">Pengantaran</button>
                `
						} else if (resOrder.status_order == 'selesai_pengantaran') {

							if (resOrder.status_pembayaran == "belum_bayar") {
								btnStatusOrder = `
										<button onclick="openBayar(${resOrder.order_id},'settlement')" class="btn btn-warning">Belum Bayar</button>
									`
							} else {
								btnStatusOrder = `
										<span class="badge badge-primary">Selesai</span>
									`
							}
						}

						tbody += `
                <tr>
                  <td>${no}</td> 
                  <td>${resOrder.order_id}</td> 
                  <td>${resOrder.nama_pelanggan}</td> 
                  <td>${resOrder.nama_paket_reguler}</td> 
                  <td>Rp ${formatRupiah(resOrder.harga_paket_reguler)}</td> 
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
                  <td align="center">
                    <button class="btn btn-primary" onclick="openEdit(${resOrder.id}, ${resOrder.id_pelanggan}, ${resOrder.berat}, ${resOrder.harga}, ${resOrder.total_harga}, ${resOrder.id_paket_reguler})"><i class="fa fa-pencil"></i></button>
                    <a target="_blank" href="${base_url+'print?i='+resOrder.order_id}" class="mt-2"><i class="fa fa-print"></i> Print</a>
                  </td>
                </tr>
              `
						no++
					})

					$("#tbody-1").html(tbody)
				}
			}).done(function() {
				$('#basic-1').DataTable();
				// $('.loader-wrapper').fadeOut('slow', function () {}); 
			})
		}

		function openEdit(id, id_pelanggan, berat, harga, total_harga, id_paket) {
			$("#id_edit").val(id)
			$("#pelanggan_e").val(id_pelanggan)
			$("#harga_e").val(harga)
			$("#ket-harga_e").html(formatRupiah(harga))
			$("#berat_e").val(berat)
			$("#ket-berat_e").html(berat)
			$("#total-harga_e").html(formatRupiah(total_harga))
			$("#modal-edit").modal('toggle')
			$("#paket_e").val(id_paket)
		}

		function openDialogFinish(berat, total_harga, waktu, tanggal) {
			$("#sb-berat").html(berat + ' kg')
			$("#sb-total-harga").html("Rp " + formatRupiah(total_harga))
			$("#sb-tanggal-order").html(tanggal + ' Pukul ' + waktu)

			$("#modal-selesai").modal('toggle')
		}

		function loadBelumBayar() {
			$.ajax({
				url: base_url + 'getOrderByStatus/belum_bayar',
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					$('#basic-2').dataTable().fnClearTable();
					$('#basic-2').dataTable().fnDestroy();
					// $('.loader-wrapper').fadeIn('slow', function () {}); 
				},
				success: function(res) {
					$("#jumlah_belum_bayar").html(res.length)
					let tbody = null
					let no = 1
					res.forEach(function(resOrder) {
						let tgl = new Date(resOrder.tanggal_order)
						let waktu = tgl.getHours() + ':' + tgl.getMinutes()
						let format_tgl = tgl.getDate() + ' ' + bulan[parseInt(tgl.getMonth())] + ' ' + tgl.getFullYear()

						if (resOrder.status_pembayaran == 'settlement') {
							btnBayar = `
                  <button class="btn btn-air-primary btn-pill btn-primary">Sudah Bayar</button>
                `
						} else if (resOrder.status_pembayaran == "pending") {
							btnBayar = `
                  <span class="badge badge-warning">Pending</span>
                  <button onclick="openCancel(${resOrder.order_id})" class="mt-2 btn btn-air-dark btn-pill btn-dark"><i class="fa fa-remove"></i> Cancel</button>
                `
						} else if (resOrder.status_pembayaran == "deny") {
							btnBayar = `
                  <span class="badge badge-danger">Ditolak</span> 
                  <button onclick="openHapus(${resOrder.order_id})" class="btn btn-danger btn-air-danger mt-2"><i class="fa fa-trash-o"></i> Hapus</button>
                `
						} else if (resOrder.status_pembayaran == "expire") {
							btnBayar = `
                  <span class="badge badge-dark">Kadaluarsa</span> 
                `
						} else if (resOrder.status_pembayaran == "belum_bayar") {
							if (resOrder.kategori_order == 'online') {
								btnBayar = `
                    <span class="badge badge-danger">Bayar</span>
                    <button onclick="openBayar(${resOrder.order_id})" class="btn btn-primary btn-air-primary mt-2"><i class="fa fa-check"></i></button>
                    <button onclick="openHapus(${resOrder.order_id})" class="btn btn-danger btn-air-danger mt-2"><i class="fa fa-trash-o"></i></button>
                  `
							} else {
								btnBayar = `
                    <button onclick="openKonfirmasi(${resOrder.order_id},'settlement')" class="btn btn-air-danger btn-pill btn-danger">Bayar</button>
                    <button onclick="openHapus(${resOrder.order_id})" class="btn btn-danger btn-air-danger mt-2"><i class="fa fa-trash-o"></i> Hapus</button>
                  `
							}
						} else if (resOrder.status_pembayaran == 'cancel') {
							btnBayar = `
                  <span class="badge badge-dark">Dibatalkan</span>
                  <button onclick="openHapus(${resOrder.order_id})" class="btn btn-danger btn-air-danger mt-2"><i class="fa fa-trash-o"></i> Hapus</button>
                `
						} else {
							btnBayar = `
                  <span class="badge badge-dark">${resOrder.status_pembayaran}</span>
                `
						}

						let badgeKategori = '';
						if (resOrder.kategori_order == 'online') {
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
						no++
					})

					$("#tbody-2").html(tbody)
				}
			}).done(function() {
				$('#basic-2').DataTable();
				// $('.loader-wrapper').fadeOut('slow', function () {});  
			})
		}

		function openBayar(order_id) {
			$("#k-bayar").html(order_id)
			$("#bayar_order_id").val(order_id)

			$('#modal-bayar').modal('toggle')
		}

		$("#form_bayar").submit(function() {
			$('#modal-bayar').modal('toggle')
			$.ajax({
				url: base_url + 'bayar-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					console.log("res", res)
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> melunasi pembayaran', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function loadRefund() {
			$.ajax({
				url: base_url + 'getOrderByStatus/pengembalian',
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					$('#basic-3').dataTable().fnClearTable();
					$('#basic-3').dataTable().fnDestroy();
					// $('.loader-wrapper').fadeIn('slow', function () {}); 
				},
				success: function(res) {
					let tbody = null
					let no = 1
					$("#jumlah_pengembalian_dana").html(res.length)
					res.forEach(function(resOrder) {
						let tgl = new Date(resOrder.tanggal_order)
						let waktu = tgl.getHours() + ':' + tgl.getMinutes()
						let format_tgl = tgl.getDate() + ' ' + bulan[parseInt(tgl.getMonth())] + ' ' + tgl.getFullYear()
						let btnPengembalian = '';

						if (resOrder.status_pembayaran == 'settlement') {
							btnBayar = `
                  <button onclick="openDialogFinish('${resOrder.berat}',${resOrder.total_harga}, '${waktu}', '${format_tgl}')"  class="btn btn-air-primary btn-pill btn-primary">Sudah Bayar</button>
                `
						} else if (resOrder.status_pembayaran == "pending") {
							btnBayar = `
                  <button class="btn btn-air-warning btn-pill btn-warning">Selesaikan Pembayaran</button>
                `
						} else if (resOrder.status_pembayaran == "deny") {
							btnBayar = `
                  <span class="badge badge-danger">Ditolak</span>
                  <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                `
						} else if (resOrder.status_pembayaran == "expire") {
							btnBayar = `
                  <span class="badge badge-dark">Kadaluarsa</span>
                  <button ="btn btn-dark btn-sm"><i class="fa fa-trash-o"></i></button>
                `
						} else {
							btnBayar = `
                  <button class="btn btn-air-dark btn-pill btn-dark">${resOrder.transaction_status}</button>
                `
						}

						if (resOrder.refund == 'persetujuan') {
							btnPengembalian = `
                  <button onclick="openPersetujuanRefund('${resOrder.order_id}', '${resOrder.alasan_refund}', ${resOrder.total_harga})"  class="btn btn-air-primary btn-pill btn-primary">Lakukan Persetujuan</button>
                `
						} else if (resOrder.refund == 'setuju') {
							btnPengembalian = `
                  <span class="badge badge-success">Disetujui</span>
                `
						} else if (resOrder.refund == 'tolak') {
							btnPengembalian = `
                  <span class="badge badge-danger">Ditolak</span>
                `
						} else {
							btnPengembalian = `
                  <span class="badge badge-dark">Tidak Terdaftar</span>
                `
						}

						let badgeKategori = '';
						if (resOrder.kategori_order == 'online') {
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
                  <td align="center">
                    ${btnPengembalian}
                  </td> 
                  <td>${resOrder.status_order}</td> 
                  <td>${resOrder.berat} kg</td> 
                  <td>Rp ${formatRupiah(resOrder.total_harga)}</td> 
                  <td align="center"><span class="badge ${badgeKategori}">${resOrder.kategori_order}</span></td> 
                  <td>${format_tgl+'<br> Pukul '+waktu}</td>  
                </tr>
              `
						no++
					})

					$("#tbody-3").html(tbody)
				}
			}).done(function() {
				$('#basic-3').DataTable();
				// $('.loader-wrapper').fadeOut('slow', function () {}); 
			})
		}

		function openHapus(order_id) {
			$("#k-hapus").html(order_id)
			$("#hapus_order_id").val(order_id)

			$('#modal-hapus').modal('toggle')
		}

		function openPenjemputan(order_id) {
			$("#penjemputan_order_id").val(order_id)

			$('#modal-penjemputan').modal('toggle')
		}

		$("#form_penjemputan").submit(function() {
			$('#modal-penjemputan').modal('toggle')
			$.ajax({
				url: base_url + 'penjemputan-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> memilih kurir untuk menjemput', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function openPencucian(order_id) {
			$("#pencucian_order_id").val(order_id)

			$('#modal-pencucian').modal('toggle')
		}

		$("#form_pencucian").submit(function() {
			$('#modal-pencucian').modal('toggle')
			$.ajax({
				url: base_url + 'pencucian-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> memilih pencuci', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function openSelesaiPengantaran(order_id) {
			$("#selesai_pengantaran_order_id").val(order_id)
			$("#sp-order_id").html(order_id)

			$('#modal-selesai_pengantaran').modal('toggle')
		}

		$("#form_selesai_pengantaran").submit(function() {
			$('#modal-selesai_pengantaran').modal('toggle')
			$.ajax({
				url: base_url + 'selesai-pengantaran-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Selesai</strong> mengantarkan pakaian', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function openPengantaran(order_id) {
			$("#pengantaran_order_id").val(order_id)
			$("#p-order_id").html(order_id)

			$('#modal-pengantaran').modal('toggle')
		}

		$("#form_pengantaran").submit(function() {
			$('#modal-pengantaran').modal('toggle')
			$.ajax({
				url: base_url + 'pengantaran-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> melakukan pengantaran', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function openSelesaiCuci(order_id) {
			$("#selesai_cuci_order_id").val(order_id)
			$("#sc-order_id").html(order_id)

			$('#modal-selesai_cuci').modal('toggle')
		}

		$("#form_selesai_cuci").submit(function() {
			$('#modal-selesai_cuci').modal('toggle')
			$.ajax({
				url: base_url + 'selesai-cuci-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> mengganti ke selesai mencuci', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function openPersetujuanRefund(order_id, alasan, total_harga) {
			$("#alasan_penolakan_p").html(alasan)
			$("#persetujuan_order_id").val(order_id)
			$("#alasan_i").val(alasan)
			$("#total_harga_i").val(total_harga)

			$('#modal-persetujuan').modal('toggle')
		}

		$("#form_hapus").submit(function() {
			$('#modal-hapus').modal('toggle')
			$.ajax({
				url: base_url + 'hapus-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menghapus pesanan', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		$("#form_persetujuan").submit(function() {
			$('#modal-persetujuan').modal('toggle')
			$.ajax({
				url: base_url + 'persetujuan-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> pengembalian dana telah dikonfirmasi', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function openKonfirmasi(order_id, status) {
			$("#k-konfirmasi").html(order_id)
			$("#konfirmasi_order_id").val(order_id)
			$("#konfirmasi_status").val(status)

			$('#modal-konfirmasi').modal('toggle')
		}

		function openCancel(order_id) {
			$("#k-cancel").html(order_id)
			$("#cancel_order_id").val(order_id)

			$('#modal-cancel').modal('toggle')
		}

		function loadPelanggan() {
			$.ajax({
				url: base_url + 'getData/pelanggan',
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					// $('.loader-wrapper').fadeIn('slow', function () {}); 
				},
				success: function(res) {
					let pelanggan = '<option value="" >Pilih Pelanggan</option>'
					let no = 1
					res.forEach(function(val) {
						pelanggan += `
                <option value="${val.id}">${val.nama_pelanggan}</option>
              `
						no++
					})

					$("#pelanggan").html(pelanggan)
					$("#pelanggan_e").html(pelanggan)
				}
			}).done(function() {
				$('#pelanggan').select2();
				// $('.loader-wrapper').fadeOut('slow', function () {}); 
			})
		}

		function loadKurir() {
			$.ajax({
				url: base_url + 'get-users/Kurir',
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
						no++
					})

					$("#kurir").html(kurir)
				}
			}).done(function() {
				// $('.loader-wrapper').fadeOut('slow', function () {}); 
			})
		}

		function loadPencuci() {
			$.ajax({
				url: base_url + 'get-users/Washing',
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					// $('.loader-wrapper').fadeIn('slow', function () {}); 
				},
				success: function(res) {
					let pencuci = '<option value="" >Pilih Pencuci</option>'
					let no = 1
					res.forEach(function(val) {
						pencuci += `
                <option value="${val.id}">${val.nama_lengkap}</option>
              `
						no++
					})

					$("#pencuci").html(pencuci)
				}
			}).done(function() {
				// $('.loader-wrapper').fadeOut('slow', function () {}); 
			})
		}

		function loadOrderSetting() {
			$.ajax({
				url: base_url + 'getData/order_setting',
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					// $('.loader-wrapper').fadeIn('slow', function () {}); 
				},
				success: function(res) {
					res.forEach(function(val) {
						$("#ket-harga").html(formatRupiah(val.harga))
						$("#i_harga").val(val.harga)
						$("#harga").val(val.harga)


						$("#ket-harga_e").html(formatRupiah(val.harga))
						$("#i_harga_e").val(val.harga)
					})
				}
			}).done(function() {
				// $('.loader-wrapper').fadeOut('slow', function () {}); 
			})
		}

		$("#form_harga").submit(function() {
			$.ajax({
				url: base_url + 'simpan-harga',
				type: 'post',
				data: $(this).serialize(),
				dataType: 'json',
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan perubahan setting order', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				},
			}).done(function() {
				loadPaket()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		$("#form_konfirmasi").submit(function() {
			$('#modal-konfirmasi').modal('toggle')
			$.ajax({
				url: base_url + 'konfirmasi-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menganti status pembayaran', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadBelumBayar()
				loadSudahBayar()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		$("#form_cancel").submit(function() {
			$('#modal-cancel').modal('toggle')
			$.ajax({
				url: base_url + 'cancel-order',
				type: 'post',
				dataType: 'json',
				data: $(this).serialize(),
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> membatalkan pesanan', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				}
			}).done(function() {
				loadBelumBayar()
				loadSudahBayar()
				// $('.loader-wrapper').fadeOut('slow', function () {}); 
			})
		})

		$("#berat").keyup(function() {
			var harga = parseInt($('#berat').val()) * parseInt($('#harga').val())
			$("#ket-berat").html($(this).val())
			$("#t_harga").val(harga)
			$("#total-harga").html(formatRupiah(harga))
		})

		$("#berat_e").keyup(function() {
			var harga = parseInt($('#berat_e').val()) * parseInt($('#i_harga_e').val())
			$("#ket-berat_e").html($(this).val())
			$("#t_harga_e").val(harga)
			$("#total-harga_e").html(formatRupiah(harga))
		})

		$("#form_order").submit(function() {
			$.ajax({
				url: base_url + 'tambah-order',
				type: 'post',
				data: $('#form_order').serialize(),
				dataType: 'json',
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan data order', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}

					$("#ket-berat").html('0')
					$("#t_harga").html('')
					$("#total-harga").html('0')
					$("#berat").val('')
				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		$("#form_edit").submit(function() {
			$("#modal-edit").modal('toggle')
			$.ajax({
				url: base_url + 'edit-order',
				type: 'post',
				data: $('#form_edit').serialize(),
				dataType: 'json',
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan perubahan', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> ada sesuatu yang salah', notifOpt)
					}

				}
			}).done(function() {
				loadAll()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function loadPaket() {
			$.ajax({
				url: base_url + 'getData/paket_reguler',
				dataType: 'json',
				type: 'get',
				success: function(res) {
					let option = '<option value="">Pilih Paket Reguler</option>'
					$.each(res, function(i, val) {
						option += `
                <option value="${val.id}">${val.nama_paket} (Rp ${formatRupiah(val.harga_paket)}/kg)</option>
              `
					})

					$("#paket").html(option)
					$("#paket_e").html(option)
				}
			}).done(function() {
				$("#paket").select2()
			})
		}

		function namaPaket() {
			var id = $('#paket').val()
			$.ajax({
				url: base_url + 'getDataPaketById/' + id,
				dataType: 'json',
				type: 'get',
				success: function(res) {
					$.each(res, function(i, val) {

						if ($("#berat").val() == '' || $("#berat").val() == null) {
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

		function namaPaketE() {
			var id = $('#paket_e').val()
			$.ajax({
				url: base_url + 'getDataPaketById/' + id,
				dataType: 'json',
				type: 'get',
				success: function(res) {
					$.each(res, function(i, val) {
						if ($("#berat_e").val() == '' || $("#berat_e").val() == null) {
							$("#ket-berat_e").html('1')
							$("#berat_e").val(1)
						}

						$("#ket-harga_e").html(formatRupiah(val.harga_paket))
						$("#i_harga_e").val(val.harga_paket)

						$("#nama_paket_e").val(val.nama_paket)
						$("#harga_paket_e").val(val.harga_paket)

						var total = parseInt($("#berat_e").val() * $("#i_harga_e").val())
						$("#t_harga_e").val(total)
						$("#total-harga_e").html(formatRupiah(total))
					})
				}
			})
		}
	</script>
</body>

</html>
