<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Cashier App</title>

	{{-- CSS --}}
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="css/app.css">
</head>
<body>

	{{-- HEADER --}}
	<div id="site-header">
		@include('partials.header')
	</div>

	{{-- MAIN --}}
	<div id="site-main">
		@yield('content')
	</div>

	{{-- FOOTER --}}
	<div id="site-footer">
		@include('partials.footer')
	</div>

	{{-- JS --}}
	<script src="js/all.js"></script>
</body>
</html>