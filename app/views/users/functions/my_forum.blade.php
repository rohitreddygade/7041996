@extends('layouts.main')
@section('title')My Questions
@stop
@section('content')
<h1><center>{{$user->name}}</center></h1>
 <h2>My Questions</h2>
		@foreach ( $forums as $forum)
   			@if( $forum->user_id == $user->id)
   				<li>{{link_to_route('forum',$forum->title,array('username'=>$user->username,'id'=>$forum->id))}}</li>
   			@endif
		@endforeach
@stop