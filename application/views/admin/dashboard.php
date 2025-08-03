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

				<!-- Graphs starts-->
				<div class="container-fluid">
					<p>Grafik Pendapatan Berdasarkan Paket</p>
					<div class="row">
						<div class="col-sm-12 col-xl-12 col-lg-12">
							<div class="card">
								<div class="card-body">
									<canvas id="revenueChart"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
				<script>
					const ctx = document.getElementById('revenueChart').getContext('2d');
					const revenueChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ['January', 'February', 'March', 'April', 'May', 'June'],
							datasets: []
						},
						options: {
							scales: {
								y: {
									beginAtZero: true
								}
							}
						}
					});
				</script>

				<!-- Graphs ends -->


			</div>
			<!-- footer start-->
			<?php $this->load->view('layout/footer'); ?>
		</div>
	</div>
	<?php $this->load->view('layout/js'); ?>
	<script type="text/javascript">
		const base_url = '<?php echo base_url(); ?>'
		const namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
		const namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
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
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			}
		}

		$(document).ready(function() {
			$("#ket-hari").html(namaHari[today.getDay()])
			$("#ket-bulan").html(namaBulan[bulans])
			$("#ket-tahun").html(tahuns)

			loadPendapatan()
			loadOrderSetting()
			loadGraphs()
		})

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

		function loadGraphs() {
			$.ajax({
				url: base_url + 'load-graph',
				type: 'get',
				dataType: 'json',
				success: function(res) {
					const labels = res.data.labels;
					const datasets = res.data.datasets;
					revenueChart.data.labels = labels;
					revenueChart.data.datasets = datasets;
					revenueChart.update();
				},
				error: function(err) {
					console.error('Error loading graphs:', err);
					$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Gagal memuat grafik', notifOpt)
				}
			});
		}

		$("#form_harga").submit(function() {

			var data = new FormData();
			$.each($('#logo')[0].files, function(i, file) {
				data.append('file-' + i, file);
			});

			data.append('nama_laundry', $("#nama_laundry").val())
			data.append('alamat_laundry', $("#alamat_laundry").val())
			data.append('harga', $("#harga").val())
			data.append('nama_pemilik', $("#nama_pemilik").val())
			data.append('nama_bank', $("#nama_bank").val())
			data.append('no_rekening', $("#no_rekening").val())
			data.append('komisi_kurir', $("#komisi_kurir").val())
			data.append('komisi_washing', $("#komisi_washing").val())
			data.append('id', $("#id_harga").val())

			$.ajax({
				url: base_url + 'simpan-harga',
				type: 'post',
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				dataType: 'json',
				beforeSend: function() {
					$('.loader-wrapper').fadeIn('slow', function() {});
				},
				success: function(res) {
					if (res.status) {
						$("#logo").val('')
						$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> menyimpan perubahan setting order', notifOpt)
					} else {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
					}
				},
			}).done(function() {
				loadOrderSetting()
				$('.loader-wrapper').fadeOut('slow', function() {});
			})
		})

		function loadPendapatan() {
			$.ajax({
				url: base_url + 'loadPendapatan',
				type: 'get',
				dataType: 'json',
				success: function(res) {
					let pendapatanHari = 0
					$.each(res.hari, function(ih, valh) {
						pendapatanHari += parseInt(valh.total_harga)
					})

					let pendapatanBulan = 0
					$.each(res.bulan, function(ih, valh) {
						pendapatanBulan += parseInt(valh.total_harga)
					})

					let pendapatanTahun = 0
					$.each(res.tahun, function(ih, valh) {
						pendapatanTahun += parseInt(valh.total_harga)
					})

					$("#hari").html('Rp ' + formatRupiah(pendapatanHari))
					$("#bulan").html('Rp ' + formatRupiah(pendapatanBulan))
					$("#tahun").html('Rp ' + formatRupiah(pendapatanTahun))
				}
			})
		}
	</script>
</body>

</html>
