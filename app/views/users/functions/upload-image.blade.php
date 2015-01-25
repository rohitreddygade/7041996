@extends('layouts.main')
@section('title')My Image
@stop
@section('content')
<center><h1>Upload a Image</h1>
</center>
<form class="login" method="post" action="{{URL::route('image-upload-post')}}">
<div class="field">
				<input  type="file" placeholder='file path' name="image"  >
				@if($errors->has('image'))
					{{$errors->first('image')}}
				@endif
			</div>
			<div class="submit">	
					<input type='submit' value="Search">
					{{Form::token()}}
			</div>
</from>
@stop
