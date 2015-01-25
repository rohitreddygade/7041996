@extends('layouts.main')
@section('title')Admin-Login
@stop
@section('page-title')<center><h1>Admin Login</h1></center>
@stop
@section('content')
<center><h2>Hi Welcome to Admin Login page</h2>

	<form method="post" action="{{URL::route('index')}}">
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
	
</form>


</center>
@stop
