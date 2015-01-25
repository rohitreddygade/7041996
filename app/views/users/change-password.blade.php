@extends('layouts.main')
@section('title')Change-password
@stop
@section('page-title')<center><h1>Change Password</h1></center>
@stop
@section('content')
<center><h2>Hi Welcome to Change Password page</h2>

	<form method="post" action="{{URL::route('change_password_post')}}">
	<div>
		<input type='password' name='new_password' placeholder='New Password'>
		@if($errors->has('new_password'))
			{{$errors->first('new_password')}}
		@endif
	</div>
	<div>
		<input type='password' name='password_again' placeholder='New Password'>
		@if($errors->has('password_again'))
			{{$errors->first('password_again')}}
		@endif
	</div>
	<div> 
		<input type='password' name='current_password' placeholder='Current Password'>
		@if($errors->has('currnt_password'))
			{{$errors->first('current_password')}}
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


</center>
@stop
