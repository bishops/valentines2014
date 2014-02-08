@extends('layout.full')
@section('main')
@if(Session::has('message'))
	<div class="alert alert-danger">
		{{Session::get('message')}}
		{{{Session::forget('message')}}}
	</div>
@endif
<div class="jumbotron">
	<h1>Happy Valentine's Day</h1>
	<p>Ready to meet your most compatible Valentine's Day Match?</p>
	<a class="btn btn-primary btn-lg" href="{{url('/auth')}}">Login Now</a>
</div>
@stop
