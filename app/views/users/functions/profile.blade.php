@extends('layouts.main')
@section('title'){{$user->username}}
@stop
@section('content')
<h1><center>My Profile</center></h1>
<h3>
<pre>
Username 	:{{$user->username}}<br>
Register  	:{{$user->Reg_No}}<br>
Email Id 	:{{$user->email}}<br>
Branch 	    	:{{$user->Branch}}<br>
Section     	:{{$user->section}}</pre>
</h3>

@stop