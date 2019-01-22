<!DOCTYPE html>
<html lang="eng">
<head>
	<title>Portal Berita</title>
	<link rel="stylesheet" type="text/css" href="{{URL('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL('css/index.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL('css/detail.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL('css/bootstrap-datepicker3.css')}}" />
	<script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
</head>
<body>


	<div class="jumbotron text-center">
		<h1>Portal Berita</h1>
	</div>
	<div class="container">
		@yield('content')	
	</div>
	
	<script type="text/javascript" src="{{URL('js/sweetalert.min.js')}}"></script>
	@include('sweet::alert')	
	<script type="text/javascript" src="{{URL('js/bootstrap-datepicker.js')}}"></script>
	<script type="text/javascript" src="{{URL('js/index.js')}}"></script>
	

</body>
</html>