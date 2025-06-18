<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$pageData = array(
		'title' => 'Komisi Kurir',
		'mainBreadcrumb' => 'Komisi Kurir',
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
					<div class="row second-chart-list third-news-update">
						<div class="col-12">
							<div class="card gradient-primary o-hidden">
								<div class="card-body">
									<div class="table-responsive">
										<table class="display" id="basic-1">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Kurir</th>
													<th>Email</th>
													<th>Total Komisi</th>
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
			<?php $this->load->view('layout/loader', FALSE); ?>
			<!-- footer start-->
			<?php $this->load->view('layout/footer'); ?>
		</div>
	</div>
	<?php $this->load->view('layout/js'); ?>
	<!-- <script src="https://js.pusher.com/7.0/pusher.min.js"> -->

	<script type="text/javascript">
		class Pusher {
			subscribe(a) {
				console.log("var")
			}
		}
	</script>

	<script type="text/javascript">
		const base_url = '<?php echo base_url(); ?>'
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

		var channel = pusher.subscribe('admin-membership');
		channel.bind('load-data', function(data) {
			loadAll()
		});
		// End Pusher

		$(document).ready(function() {
			loadAll()
		})

		function loadAll() {
			loadData()
		}

		function loadData() {
			$.ajax({
				url: base_url + 'loadKomisiKurir',
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
                  <td>${val.nama_lengkap}</td>
                  <td>${val.email}</td>
                  <td>Rp ${formatRupiah(val.komisi)}</td>  
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
	</script>
</body>

</html>
