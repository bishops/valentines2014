@extends('layout.index')
@section('main')
<!-- <div class="jumbotron"> -->
	<h1>Questions</h1>
<!-- </div> -->
<style>
	.radio{
		padding-left: 40px;
	}
</style>
<form style="padding-left: 10px;" action="">
@foreach ($questions as $question)
	<h3>{{$question->prompt}}</h3>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="a" >
	    {{$question->answera}}
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="b" >
	    {{$question->answerb}}
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="c" >
	    {{$question->answerc}}
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="d" >
	    {{$question->answerd}}
	  </label>
	</div>
@endforeach
<input style="margin-top: 15px; margin-left: 15px; " type="submit" class="btn btn-lg btn-block btn-danger" value="Find Your Valentine">
</form>
@stop
