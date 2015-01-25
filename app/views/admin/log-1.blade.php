@extends('layouts.main')
@section('title')Admin-Login
@stop
@section('page-title')<center><h1>Admin Login</h1></center>
@stop
@section('content')
<center><h2>Hi Welcome to Admin Login page</h2>

	<form method="post" action="{{URL::route('admin-login-chenk-post')}}">
	<div>
		<input  type="text" placeholder='Roll No' name="roll_no" {{(Input::old('roll_no') ? 'value="'.e(Input::old('roll_no')).'"' : '')}} >
		@if($errors->has('roll_no'))
			{{$errors->first('roll_no')}}
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
