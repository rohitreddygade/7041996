@extends('layouts.main')
@section('title') forgot-password
@stop
@section('page-title')<center><h1>Forgot Password</h1></center>
@stop
@section('content')
<center><h2>Hi Welcome to Forgot password page</h2>


		<form class="login" method="post" action="{{URL::route('forgot-password-post')}}">

			<div class="field">
				<input  type="email" placeholder='Email ID' name="emails"  >
				@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
			</div>
			<div class="submit">	
					<input type='submit' value="Search">
					{{Form::token()}}
			</div>
			
		</form>

</center>
@stop
