@extends('layouts.main')
@section('title')Login
@stop
@section('page-title')<center><h1>Login</h1></center>
@stop
@section('content')
<center><h2>Hi Welcome to Login page</h2>

	<form method="post" action="{{URL::route('login-post')}}">
	<div>
		<input  type="text" placeholder='Email' name="email" {{(Input::old('email') ? 'value="'.e(Input::old('email')).'"' : '')}} >
		@if($errors->has('email'))
			{{$errors->first('email')}}
		@endif
	</div>
	<div>
		<input type='password' name='password' placeholder='Password'>
		@if($errors->has('password'))
			{{$errors->first('password')}}
		@endif
	</div>
	<div>	
			<input type='submit' value="login">
			{{Form::token()}}
	</div>
	<div>
			<input type="checkbox" name='remember' id="remember" checked="checked" >
			<label for='remember'>Keep me logged in</label>
	</div>
	{{link_to_route('forgot-password','forgot your password ')}}
</form>

<i class="column" class='File Code Outline icon'></i>

</center>
@stop
