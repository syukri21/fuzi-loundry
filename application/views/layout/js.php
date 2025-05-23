<!-- latest jquery-->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="<?php echo base_url(); ?>assets/js/scrollbar/simplebar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="<?php echo base_url(); ?>assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="<?php echo base_url(); ?>assets/js/sidebar-menu.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/chart/chartist/chartist.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart/knob/knob.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart/knob/knob-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chart/apex-chart/stock-prices.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/notify/bootstrap-notify.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/notify/index.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/typeahead/handlebars.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owlcarousel/owl.carousel.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/owlcarousel/owl-custom.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>assets/js/datatable/datatables/datatable.custom.js"></script> -->
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?php echo base_url(); ?>assets/js/script.js"></script> 
<script type="text/javascript">
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
<!-- login js-->
<!-- Plugin used-->