<?php
$dataSetting = $this->db->get('order_setting')->result();
$setting = null;
foreach ($dataSetting as $value) {
	$setting = $value;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
	<meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="pixelstrap">
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">
	<title>Cuba - Premium Admin Template</title>
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
	<!-- ico-font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/icofont.css">
	<!-- Themify icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/themify.css">
	<!-- Flag icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/flag-icon.css">
	<!-- Feather icon-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/feather-icon.css">
	<!-- Plugins css start-->
	<!-- Plugins css Ends-->
	<!-- Bootstrap css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/bootstrap.css">
	<!-- App css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link id="color" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/color-1.css" media="screen">
	<!-- Responsive css-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css">
</head>

<body>
	<!-- login page start-->
	<div class="container-fluid p-0">
		<div class="row m-0">
			<div class="col-12 p-0">
				<div class="login-card">
					<div>
						<div><a class="logo" href="<?php echo base_url(); ?>"><img class="img-fluid for-light" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo base_url(); ?>assets/images/logo/<?php echo $value->logo; ?>" alt="looginpage"></a></div>
						<div class="login-main">
							<form class="theme-form" id="form_reset_pasword" action="javascript:;">
								<h4>Lupa Password</h4>
								<p>Masukkan email akun Anda untuk mereset akun</p>
								<div class="form-group">
									<label class="col-form-label">Email Address</label>
									<div class="input-group">
										<input name="email" id="email" class="form-control" type="email" required="" placeholder="Test@gmail.com">
										<button class="btn btn-primary btn-block w-25" type="button" id="btn_send_email">Kirim Email</button>
									</div>
								</div>
								<div class="form-group">
									<label class="col-form-label">Password Baru</label>
									<div class="form-input position-relative">
										<input name="password" id="password" class="form-control" type="password" required="" placeholder="*********">
									</div>
								</div>
								<div class="form-group">
									<label class="col-form-label">Konfirmasi Password Baru</label>
									<div class="form-input
 position-relative">
										<input name="confirm_password" id="confirm_password" class="form-control" type="password" required="" placeholder="*********">
									</div>
								</div>
								<div class="form-group mb-4">
									<label class="col-form-label">Kode Verifikasi</label>
									<input name="kode_verifikasi" id="kode_verifikasi" class="form-control" type="text" required="" placeholder="Masukkan Kode Verifikasi">
									<small class="text-muted">Kode verifikasi telah dikirim ke email Anda</small>
								</div>
								<div class="form-group mb-0">
									<button class="btn btn-primary btn-block w-100" type="submit">Reset Password</button>
								</div>
								<h6 class="text-muted mt-4 or">Masuk</h6>
								<p class="mt-4 mb-0">Sudah punya akun?<a class="ms-2" href="<?php echo base_url('login'); ?>">Masuk</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('layout/loader'); ?>
		<!-- latest jquery-->
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
		<!-- Bootstrap js-->
		<script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
		<!-- feather icon js-->
		<script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather-icon.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/notify/bootstrap-notify.min.js"></script>
		<!-- scrollbar js-->
		<!-- Sidebar jquery-->
		<script src="<?php echo base_url(); ?>assets/js/config.js"></script>
		<!-- Plugins JS start-->
		<!-- Plugins JS Ends-->
		<!-- Theme js-->
		<script src="<?php echo base_url(); ?>assets/js/script.js"></script>
		<!-- login js-->
		<!-- Plugin used-->
		<script type="text/javascript">
			const base_url = '<?php echo base_url(); ?>'
			const notifOpt = {
				type: 'theme',
				allow_dismiss: true,
				delay: 2000,
				showProgressbar: true,
				timer: 300,
				animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
				}
			}

			$("#btn_send_email").click(function() {
				var email = $('#email').val()
				if (email == '') {
					$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Email tidak boleh kosong', notifOpt)
					return false
				}

				$.ajax({
					url: base_url + 'send-reset-password-email',
					type: 'post',
					dataType: 'json',
					data: {
						email: email
					},
					beforeSend: function() {
						$('.loader-wrapper').fadeIn('slow', function() {});
					},
					success: function(res) {
						if (res.status) {
							$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> Email telah dikirim', notifOpt)
						} else {
							if (res.message != null || res.message.length > 0) {
								$.notify('<i class="fa fa-remove"></i><strong>Error</strong> ' + res.message, notifOpt)
							} else {
								$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt)
							}
						}
					}
				}).done(function() {
					$('.loader-wrapper').fadeOut('slow', function() {});
				})
			})

			$("#form_reset_pasword").submit(function() {
				var email = $('#email').val();
				var password = $('#password').val();
				var confirm_password = $('#confirm_password').val();
				var kode_verifikasi = $('#kode_verifikasi').val();

				// Validate fields
				if (email == '') {
					$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Email tidak boleh kosong', notifOpt);
					return false;
				}

				if (password == '') {
					$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Password tidak boleh kosong', notifOpt);
					return false;
				}

				if (confirm_password == '') {
					$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Konfirmasi password tidak boleh kosong', notifOpt);
					return false;
				}

				if (password !== confirm_password) {
					$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Password dan konfirmasi password tidak sama', notifOpt);
					return false;
				}

				if (kode_verifikasi == '') {
					$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Kode verifikasi tidak boleh kosong', notifOpt);
					return false;
				}

				// Submit reset password request
				$.ajax({
					url: base_url + 'reset-password',
					type: 'post',
					dataType: 'json',
					data: {
						email: email,
						password: password,
						confirm_password: confirm_password,
						validate_code: kode_verifikasi
					},
					beforeSend: function() {
						$('.loader-wrapper').fadeIn('slow', function() {});
					},
					success: function(res) {
						if (res.status) {
							$.notify('<i class="fa fa-check"></i><strong>Berhasil</strong> Password berhasil direset', notifOpt);
							setTimeout(function() {
								window.location.href = base_url + 'login';
							}, 2000);
						} else {
							if (res.message != null && res.message.length > 0) {
								$.notify('<i class="fa fa-remove"></i><strong>Error</strong> ' + res.message, notifOpt);
							} else {
								$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Ada sesuatu yang salah', notifOpt);
							}
						}
					},
					error: function() {
						$.notify('<i class="fa fa-remove"></i><strong>Error</strong> Terjadi kesalahan pada server', notifOpt);
					}
				}).done(function() {
					$('.loader-wrapper').fadeOut('slow', function() {});
				});

				return false;
			})
		</script>
	</div>
</body>

</html>
