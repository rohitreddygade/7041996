<html>
<head>
	<title>@yield('title')</title>
	@yield('links')
	{{HTML::style('dist/semantic.min.css')}}
	{{HTML::script('dist/semantic.min.js')}}
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	@include('layouts.nav')
	<!-- Section -->
	@if(Session::has('global'))<br>
			<p > {{Session::get('global')}}</p>
		@endif
	<!-- End Section -->
	@yield('page-title')
	@yield('content')
	@include('layouts.footer')
</body>
</html>