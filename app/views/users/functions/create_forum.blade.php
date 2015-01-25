@extends('layouts.main')
@section('title')My Question
@stop
@section('content')
<h1><center>Ask Question</center></h1>
<center>
		<form action="{{URL::route('create_forum-post')}}" method="post">
		<div >

			<div >@if($errors->has('title'))
					{{$errors->first('title')}}
				@endif<br>
				<input type="text" name="title" placeholder='title'{{(Input::old('title') ? 'value="'.e(Input::old('title')).'"' : '')}}>
				
			</div>		
			<div >
				@if($errors->has('details'))
					{{$errors->first('details')}}
				@endif<br>
				<textarea name="details"  rows="12" cols="30" {{(Input::old('details') ? 'value="'.e(Input::old('details')).'"' : '')}} >
			</textarea>
			</div>

			<div >
				Subject:
				<select name="subject" >
				  <option >PVHR</option>
				  <option >CHEMISTRy</option>
				  <option >DS</option>
				  <option >MATHS-II</option>
				</select>
			</div>


			<div >
				<input type='submit' value="Ask">
				{{Form::token()}}
			</div>

		</div>
	</form>
</center>
@stop