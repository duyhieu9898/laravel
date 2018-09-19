<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'default')</title>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="{{ asset('js/home.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	@include('layouts.header')

	@section('sidebar')
        <p>This is the master sidebar.</p>
   	@show
	<div class="content">
		<h1>laravel</h1>
		@yield('framework', 'default')
	</div>
	@yield('content', 'default')
	<p id='oclock'>The current UNIX timestamp is <span id="time">{{ date('d-m-y H:i:s',time()) }}</span></p>

	@include('layouts.footer')
</body>
</html>