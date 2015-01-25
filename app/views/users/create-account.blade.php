@extends('layouts.main')
@section('title')Create-Account
@stop
@section('page-title')<center><h1>Create Account</h1></center>
@stop
@section('content')
<center><h2>Hi Welcome to Create Account</h2></center>
	<form action="{{URL::route('create-account-post')}}" method="post">
		<div >

			<div >
				<input type="text" name="email" placeholder='Email'{{(Input::old('email') ? 'value="'.e(Input::old('email')).'"' : '')}}>
				@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
			</div>		
			<div >
				<input type="text" name="username" placeholder='Username' {{(Input::old('username') ? 'value="'.e(Input::old('username')).'"' : '')}} >
				@if($errors->has('username'))
					{{$errors->first('username')}}
				@endif
			</div>



			<div >
				<input type="password" name="password" placeholder='Password'>
				@if($errors->has('password'))
					{{$errors->first('password')}}
				@endif
			</div>

			<div >
				<input type="password" name="password_again" placeholder='Password'>
				@if($errors->has('password_again'))
					{{$errors->first('password_again')}}
				@endif
			</div>

			<div >
				<input type="text" name="reg_no" placeholder='Reg No' {{(Input::old('reg_no') ? 'value="'.e(Input::old('reg_no')).'"' : '')}} >
				@if($errors->has('reg_no'))
					{{$errors->first('reg_no')}}
				@endif
			</div>

			<div >
				<input type="text" name="branch" placeholder='Branch' {{(Input::old('branch') ? 'value="'.e(Input::old('branch')).'"' : '')}} >
				@if($errors->has('branch'))
					{{$errors->first('branch')}}
				@endif<!--Drop down-->
			</div>

			<div >
				<input type="text" name="section" placeholder='Section' {{(Input::old('section') ? 'value="'.e(Input::old('section')).'"' : '')}} >
				@if($errors->has('section'))
					{{$errors->first('section')}}
				@endif<!--Drop down-->
			</div>


			<div >
				<input type='submit' value="Create">
				{{Form::token()}}
			</div>

		</div>
	</form>
@stop