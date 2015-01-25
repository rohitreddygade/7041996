@extends('layouts.main')
@section('title'){{$forum->tags}}
@stop
@section('content')
<h1><center>{{$forum->title}}</center></h1>
 <h2>BY:  {{$user->username}}</h2>
 <center>
 	{{$forum->details}}
 </center>
 <h2>Posted On:{{$forum->created_at}}</h2>
<form class="login" method="post" action="http://localhost:8000/{{$user->username}}/{{$forum->title}}/comment">

			<div class="field">
				@if($errors->has('answer'))
					{{$errors->first('answer')}}<br>
				@endif
				<textarea  rows="12" cols="90" placeholder='My Answer.....' name="comment"  >
				</textarea>
			</div>
			<div class="submit">	
					<input type='submit' value="Submit">
					{{Form::token()}}
			</div>
			
		</form>
		@foreach ($comments as $comment)
   			@if($comment->forum_id == $forum->id)
   				{{$comment->user_name}} Says:<br>
   				<p>{{$comment->comment}}</p>
   			@endif
		@endforeach
@stop