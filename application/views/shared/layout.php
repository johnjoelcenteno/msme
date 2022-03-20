<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>DTI MSME</title>

	<link rel="stylesheet" href="<?= base_url() ?>assets/kendo/styles/kendo.common-material.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/kendo/styles/kendo.custom.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/kendo/styles/kendo.material.mobile.min.css" />
	<script defer src="<?= base_url() ?>assets/kendo/js/kendo.all.min.js"></script>
	<script defer src="<?= base_url() ?>assets/kendo/js/jszip.min.js"></script>

	<link rel="stylesheet" href="<?= base_url() ?>assets/material-kit/css/material-kit.min.css">
	<script src="<?= base_url() ?>assets/material-kit/js/core/popper.min.js"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<script src="<?= base_url() ?>assets/material-bootstrap.min.js"></script>

	<script src="<?= base_url() ?>assets/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/material-kit/js/plugins/moment.min.js"></script>

	<!-- This has error -->
	<!-- <script src="<?= base_url() ?>assets/material-kit/js/core/bootstrap-material-design.min.js"></script> -->
	<!-- <script src="<?= base_url() ?>assets/material-kit/js/bootstrap-material-design.min.js"></script> -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/material-kit/css/material-kit.css"> -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/material-kit/css/material-kit.css.map"> -->

	<!-- <script src="<?= base_url() ?>assets/material-kit/js/material-kit.js?v=2.0.1" type="text/javascript"></script> -->
	<!-- This has error -->

	<!-- <script>
        window.onload = function() {
            var culture = kendo.culture();
            culture.numberFormat.currency.pattern[0] = "-$n";
            culture.numberFormat.currency.symbol = "";
        };
    </script> -->


	<!--   Core JS Files   -->
	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
	<script src="<?= base_url() ?>assets/material-kit/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="<?= base_url() ?>assets/material-kit/js/plugins/nouislider.min.js" type="text/javascript"></script>

	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>

	<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
	<!-- <script src="<?= base_url() ?>assets/material-kit/js/material-kit.js?v=2.0.7" type="text/javascript"></script> -->

	<link rel="stylesheet" href="<?= base_url() ?>assets/custom_css/layout.css">

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
	<input type="hidden" id="baseUrl" value="<?= base_url() ?>">
	<script>
		const baseUrl = $('#baseUrl').val();
	</script>
	<div class="wrapper-body">
		<div class="spacer-75"></div>
		<?php $this->load->view("shared/navbar") ?>
		<div class="content-side-margin30">
			<?php $this->load->view($renderedView, $renderedData) ?>
			<footer class="footer footer-default">
				<div class="container">
					<div class="copyright ">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>, made with <i class="material-icons">favorite</i> by Cassandra wardel Da Greyt
						<a href="" target="blank"></a>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>

</html>