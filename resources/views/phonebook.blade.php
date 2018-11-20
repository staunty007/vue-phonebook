<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PhoneBook</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

	<div id="app">
		<Myheader></Myheader>
		<div class="container">
			<router-view></router-view>
		</div>
		<Myfooter></Myfooter>
		
	</div>
	
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>