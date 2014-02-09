@extends('layout.index')
@section('main')
<div class="jumbotron">
	<h1>Questions Due: <strong>Wednesday 12pm </strong></h1>
	<p>Please fill out the questions below and bHarmony will find a you a perfect (medicore/almost random) match!</p>
</div>
<style>
	.radio{
		padding-left: 40px;
	}
	.error-form{
		color: red;
	}
</style>
<?php $nerrors = array(); $gerrors = array(); ?>
@if( $errors->count() != 0 )
<div class="alert">
	<ul>
		@foreach($errors->getMessages() as $error)
			<li><span class="error-form">{{$error[0]}}</span></li>
				<?php
					// preg_match('/question[0-9]*/', $error[0], $m, PREG_OFFSET_CAPTURE);
					preg_match('/question[0-9]*/', $error[0], $matches, PREG_OFFSET_CAPTURE, 3);
					if ( ! empty($matches) )
					{
						$matches = str_replace('question', '', $matches[0]);
						array_push($nerrors, $matches[0]);
					}else
					{
						if ( strpos($error[0], 'gender') !== false)
						{
							array_push($gerrors, 'gender');
						}
						if ( strpos($error[0], 'grade') !== false)
						{
							array_push($gerrors, 'grade');
						}
					}
				?>
		@endforeach
	</ul>
</div>
@endif
<form style="padding-left: 10px;" method="POST" action="{{url('questions')}}">
<h3>{{in_array('gender',$gerrors)? '<span class="error-form">Your Gender:</span>':'Your Gender:'}}</h3>
<select name="gender" id="">
	<option >Select Gender</option>
	<option value="1" {{Input::old('gender') == '1' ? 'selected':''}}>Male</option>
	<option value="0" {{Input::old('gender') == '0' ? 'selected':''}}>Female</option>
</select>
<h3>{{in_array('grade',$gerrors)? '<span class="error-form">Your Grade:</span>':'Your Grade:'}}</h3>
<select name="grade" id="">
	<option >Select Grade</option>
	<option value="12" {{Input::old('grade') == '12' ? 'selected':''}}>12</option>
	<option value="11" {{Input::old('grade') == '11' ? 'selected':''}}>11</option>
	<option value="10" {{Input::old('grade') == '10' ? 'selected':''}}>10</option>
	<option value="9" {{Input::old('grade') == '9' ? 'selected':''}}>9</option>
	<option value="8" {{Input::old('grade') == '8' ? 'selected':''}}>8</option>
	<option value="7" {{Input::old('grade') == '7' ? 'selected':''}}>7</option>
	<option value="6" {{Input::old('grade') == '6' ? 'selected':''}}>6</option>
</select>
@foreach ($questions as $key => $question)

	<h3>{{in_array(strval($question->id), $nerrors) ? '<span class="error-form">'.strval($key+1).": ".$question->prompt.'</span>':strval($key+1).": ".$question->prompt}}</h3>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="a" {{Input::old('question'.$question->id) == 'a' ? 'checked':''}} >
	    {{$question->answera}}
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="b" {{Input::old('question'.$question->id) == 'b' ? 'checked':''}} >
	    {{$question->answerb}}
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="c" {{Input::old('question'.$question->id) == 'c' ? 'checked':''}} >
	    {{$question->answerc}}
	  </label>
	</div>
	<div class="radio">
	  <label>
	    <input type="radio" name="question{{$question->id}}" id="question{{$question->id}}" value="d" {{Input::old('question'.$question->id) == 'd' ? 'checked':''}} >
	    {{$question->answerd}}
	  </label>
	</div>
@endforeach
<input style="margin-top: 15px; margin-left: 15px; " type="submit" class="btn btn-lg btn-block btn-primary" value="Find Your Valentine">
</form>
<br>
@stop
