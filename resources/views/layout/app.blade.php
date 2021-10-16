<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Presensi Online">
    <meta property="og:title" content="SIAP - Presensi">
    <meta property="og:description" content="Presensi Online">
    <title>Siap Presensi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vali/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
  </head>
  <body class="app sidebar-mini" x-data="main">
	@include('layout.header')
	@include('layout.sidebar')
	<main class="app-content" x-data="content">
		@yield('content')
		@yield('modal')
	</main>
	<!-- Essential javascripts for application to work-->
    <script src="{{ asset('vali/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('vali/js/popper.min.js') }}"></script>
    <script src="{{ asset('vali/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vali/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('vali/js/plugins/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('vali/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vali/js/plugins/dataTables.bootstrap.min.js') }}"></script>
	 <script type="text/javascript" src="{{ asset('vali/js/plugins/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('js/alpine.min.js') }}" defer></script>
    @stack('scripts')
    <script>
		document.addEventListener('alpine:init',() => {
			Alpine.data("main",() => ({
				table:null,
				init() {
					
					/* $('.btn-datepicker').on('click',function(e){
						$(this).parent().parent().find('.datepicker').datepicker('show');
						console.log($(this).parent());
					}) */
				}
			}));
		});
	</script>
  </body>
</html>