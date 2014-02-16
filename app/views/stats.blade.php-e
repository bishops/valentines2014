@extends('layout.index')
@section('main')
<br>
<br>
<div class="jumbotron">
	<h1>Here are your stats!</h1> 
	<p>Question statistics from bHarmony</p>
</div>
<style>
	.red-span
	{
		color: #cc6157;
	}
	.green-span
	{
		color: #75b05e;
	}
	.blue-span
	{
		color: #4c8dc7;
	}
	.orange-span
	{
		color: #e8ae5a;
	}
	.larger-font
	{
		font-size: 15px;
	}
</style>
@foreach ($questions as $key => $question)
	<h3>{{strval($key+1).": ".$question->prompt}}</h3>
		<?php $nkey = $key+1; ?>
		<?php $total = intval($stats->$nkey->a) + intval($stats->$nkey->b) + intval($stats->$nkey->c) + intval($stats->$nkey->d);?>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="a" {{Input::old('question'.$question->id) == 'a' ? 'checked':''}} >
	    <span class="larger-font red-span">
	    	<strong>{{$question->answera}}</strong>
	    </span>
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="b" {{Input::old('question'.$question->id) == 'b' ? 'checked':''}} >
	   	<span class="larger-font green-span">
	    	<strong>{{$question->answerb}}</strong>
	    </span>
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="c" {{Input::old('question'.$question->id) == 'c' ? 'checked':''}} >
	    <span class="larger-font blue-span">
	   		<strong>{{$question->answerc}}</strong>
	   	</span>
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="d" {{Input::old('question'.$question->id) == 'd' ? 'checked':''}} >
	    <span class="larger-font orange-span">
	   		<strong>{{$question->answerd}}</strong>
	   	</span>
	  </label>
	</div>
	<div class="progress">
	  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{round(100*intval($stats->$nkey->a)/$total)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round(100*intval($stats->$nkey->a)/$total)}}%;">
	    {{round(100*intval($stats->$nkey->a)/$total)}}%
	  </div>
	  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{round(100*intval($stats->$nkey->b)/$total)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round(100*intval($stats->$nkey->b)/$total)}}%;">
	    {{round(100*intval($stats->$nkey->b)/$total)}}%
	  </div>
	  <div class="progress-bar" role="progressbar" aria-valuenow="{{round(100*intval($stats->$nkey->c)/$total)}}" aria-valuemin="0" aria-valuemax="100" style="width: {{round(100*intval($stats->$nkey->c)/$total)}}%;">
	    {{round(100*intval($stats->$nkey->c)/$total)}}%
	  </div>
	  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ 100 - round(100*intval($stats->$nkey->a)/$total) - round(100*intval($stats->$nkey->b)/$total) - round(100*intval($stats->$nkey->c)/$total) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ 100 - round(100*intval($stats->$nkey->a)/$total) - round(100*intval($stats->$nkey->b)/$total) - round(100*intval($stats->$nkey->c)/$total) }}%;">
	    {{ 100 - round(100*intval($stats->$nkey->a)/$total) - round(100*intval($stats->$nkey->b)/$total) - round(100*intval($stats->$nkey->c)/$total) }}%
	  </div>
	</div>

@endforeach
@stop
