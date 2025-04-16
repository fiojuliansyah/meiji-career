<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Smarthr - Bootstrap Admin Template">
	<meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
	<meta name="author" content="Dreams technologies - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Dashboard - Meiji Indonesia</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/admin/assets/img/favicon.png">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/admin/assets/img/apple-touch-icon.png">

	<!-- Theme Script js -->
	<script src="/admin/assets/js/theme-script.js"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">

	<!-- Feather CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/icons/feather/feather.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/tabler-icons/tabler-icons.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/select2/css/select2.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="/admin/assets/plugins/fontawesome/css/all.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="/admin/assets/css/bootstrap-datetimepicker.min.css">

	<!-- Summernote CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/summernote/summernote-lite.min.css">

	<!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="/admin/assets/plugins/daterangepicker/daterangepicker.css">

	<!-- Color Picker Css -->
	<link rel="stylesheet" href="/admin/assets/plugins/flatpickr/flatpickr.min.css">
	<link rel="stylesheet" href="/admin/assets/plugins/@simonwep/pickr/themes/nano.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="/admin/assets/css/style.css">
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

</head>

<body>

	<div class="main-wrapper">

		<!-- Header -->
        @include('admin.layouts.partials.header')
		<!-- /Header -->

		<!-- Sidebar -->
		@include('admin.layouts.partials.sidebar')
		<!-- /Sidebar -->


		<!-- Page Wrapper -->
		@yield('content')
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="/admin/assets/js/jquery-3.7.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="/admin/assets/js/feather.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="/admin/assets/js/jquery.slimscroll.min.js"></script>

	<!-- Chart JS -->
	<script src="/admin/assets/plugins/apexchart/apexcharts.min.js"></script>
	<script src="/admin/assets/plugins/apexchart/chart-data.js"></script>

	<!-- Chart JS -->
	<script src="/admin/assets/plugins/chartjs/chart.min.js"></script>
	<script src="/admin/assets/plugins/chartjs/chart-data.js"></script>

	<!-- Datetimepicker JS -->
	<script src="/admin/assets/js/moment.js"></script>
	<script src="/admin/assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Daterangepikcer JS -->
	<script src="/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>

	<!-- Summernote JS -->
	<script src="/admin/assets/plugins/summernote/summernote-lite.min.js"></script>

	<!-- Select2 JS -->
	<script src="/admin/assets/plugins/select2/js/select2.min.js"></script>

	<!-- Chart JS -->
	<script src="/admin/assets/plugins/peity/jquery.peity.min.js"></script>
	<script src="/admin/assets/plugins/peity/chart-data.js"></script>

	<!-- Color Picker JS -->
	<script src="/admin/assets/plugins/@simonwep/pickr/pickr.es5.min.js"></script>

	<!-- Custom JS -->
	<script src="/admin/assets/js/theme-colorpicker.js"></script>
	<script src="/admin/assets/js/script.js"></script>
	@stack('js')

</body>

</html>