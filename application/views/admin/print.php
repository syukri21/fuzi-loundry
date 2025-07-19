<!DOCTYPE html>
<html>
<head>
	<title>Print Order</title>
</head>
<body>
	<center>
		<img src="<?php echo base_url(); ?>assets/images/logo/logo.png" style="margin-bottom: 5px; margin-top: 1%;">
		<div id="nama_laundry"></div>
		<div id="alamat_laundry" style="margin-bottom: 10px;"></div>
		<table cellpadding="10" cellspacing="0" border="1">
			<tr>
				<td colspan="2"><span id="order_id"></span></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td> <span id="nama_pelanggan"></span></td>
			</tr>
			<tr>
				<td>Nomor WhatsApp</td>
				<td> <span id="no_wa"></span></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td> <span id="alamat"></span></td>
			</tr>
			<tr>
				<td>Total Harga</td>
				<td> Rp <span id="total_harga"></span></td>
			</tr>
			<tr>
				<td>Status Pembayaran</td>
				<td> <span id="status_pembayaran"></span></td>
			</tr>
			<tr>
				<td>Status Order</td>
				<td> <span id="status_order"></span></td>
			</tr>
		</table>
	</center>
</body>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
	const base_url = '<?php echo base_url(); ?>'
	const id = '<?php echo $this->input->get('i') ?>'

	$(document).ready(function () {
		loadOrderSetting()
	})

	function loadData() {
		$.ajax({
			url: base_url+'getOrderById/'+id,
			type: 'get',
			dataType: 'json',
			success: function(res) {
				$.each(res, function (i, value) {
					$("#order_id").html(value.order_id)
					$("#nama_pelanggan").html(value.nama_pelanggan)
					$("#email").html(value.email)
					$("#no_wa").html(value.no_wa)
					$("#alamat").html(value.alamat)
					$("#total_harga").html(formatRupiah(value.total_harga))
					$("#status_pembayaran").html(value.status_pembayaran)
					$("#status_order").html(value.status_order)
				})
			}
		}).done(function () {
			window.print();
		})
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
            	$("#nama_laundry").html(val.nama_laundry)
            	$("#alamat_laundry").html(val.alamat_laundry)
            })
          }
        }).done(function() {
        	loadData()
          // $('.loader-wrapper').fadeOut('slow', function () {}); 
        })
      }

	function formatRupiah(bilangan){
		var	number_string = bilangan.toString(),
			sisa 	= number_string.length % 3,
			rupiah 	= number_string.substr(0, sisa),
			ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
				
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		return rupiah;
	}
</script>
</html>
