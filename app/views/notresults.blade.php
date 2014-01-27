@extends('layout.index')
@section('main')
<div class="jumbotron">
	<h1>Results Coming Soon!</h1> 
	<h2> Check Back @ {{{date('g:ia \o\n n/j/y',strtotime($answer_reveal))}}}</h2>
</div>
@stop


