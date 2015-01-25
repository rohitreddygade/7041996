@extends('layouts.main')
@section('title'){{$group->tag_name}}
@stop
@section('content')
	@foreach($forums as $forum)

		@if($forum->tags == $group->tag_name)
			@foreach($users as $user)
				@if($forum->user_id == $user->id)
					{{link_to_route('forum',$forum->title,array('username' =>$user->username,'id'=> $forum->id))}}<br>
				@endif
			@endforeach
		@endif
	@endforeach
@stop