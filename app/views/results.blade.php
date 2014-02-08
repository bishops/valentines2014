@extends('layout.index')
@section('main')
<!-- <div class="jumbotron">
	<h1>Results</h1>
</div> -->
<h1>Matches for {{$user->first_name}} {{$user->last_name}}, Class of {{$user->grad_year}}</h1>
<hr>
<h2>Upper School Matches</h2>
<br>
<ul id="upperschool" class="nav nav-tabs">
  <li data-gender="male" class="active"><a href="">Males</a></li>
  <li data-gender="female" ><a href="">Females</a></li>
</ul>
<br>
<table id="upperschool_male" class="table table-striped">
	<tbody>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Class Year</th>
		</tr>
		@foreach($user->jschool_matches->m as $key => $muser)
		<?php $muser = $matched_users->find($muser) ?>
		<tr>
			<td>{{$key+1}}</td>
			<td><a href="{{url('results/'.$muser->id)}}">{{$muser->first_name}} {{$muser->last_name}}</a></td>
			<td>{{$muser->grad_year}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<table id="upperschool_female" style="display:none;" class="table table-striped">
	<tbody>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Class Year</th>
		</tr>
		@foreach($user->jschool_matches->f as $key => $muser)
		<?php $muser = $matched_users->find($muser) ?>
		<tr>
			<td>{{$key+1}}</td>
			<td><a href="{{url('results/'.$muser->id)}}">{{$muser->first_name}} {{$muser->last_name}}</a></td>
			<td>{{$muser->grad_year}}</td>
		</tr>
		@endforeach
	</tbody>
</table>

<h2>Grade Matches</h2>
<br>
<ul id="grade" class="nav nav-tabs">
  <li data-gender="male" class="active"><a href="">Males</a></li>
  <li data-gender="female" ><a href="">Females</a></li>
</ul>
<br>
<table id="grade_male" class="table table-striped">
	<tbody>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Class Year</th>
		</tr>
		@foreach($user->jgrade_matches->m as $key => $muser)
		<?php $muser = $matched_users->find($muser) ?>
		<tr>
			<td>{{$key+1}}</td>
			<td><a href="{{url('results/'.$muser->id)}}">{{$muser->first_name}} {{$muser->last_name}}</a></td>
			<td>{{$muser->grad_year}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<table id="grade_female"  class="table table-striped">
	<tbody>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Class Year</th>
		</tr>
		@foreach($user->jgrade_matches->f as $key => $muser)
		<?php $muser = $matched_users->find($muser) ?>
		<tr>
			<td>{{$key+1}}</td>
			<td><a href="{{url('results/'.$muser->id)}}">{{$muser->first_name}} {{$muser->last_name}}</a></td>
			<td>{{$muser->grad_year}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="jumbotron alert alert-danger">
	<?php $nemesis = $matched_users->find($user->nemesis); ?>
	<h2 style="text-align: center; font-size: 45px; ">Nemesis: <strong><a href="{{url('results/'.$nemesis->id)}}">{{$nemesis->first_name}} {{$nemesis->last_name}}</a></strong></h2>
</div>
<!-- style="background-color: #FA3E57;" 
	color:white;
 -->
@stop
@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
	$(document).ready(function()
	{




		$("#upperschool > li > a").click(function()
		{
			if( ! $(this).hasClass("active"))
			{
				$(this).parent().addClass("active");
				$("#upperschool > li").not($(this).parent()).removeClass("active");
				$("#upperschool_"+$(this).parent().data('gender')).show();
				$("#upperschool_"+$("#upperschool > li").not($(this).parent()).data('gender')).hide();
			}
			return false;
		});
		$("#grade > li > a").click(function()
		{
			if( ! $(this).hasClass("active"))
			{
				$(this).parent().addClass("active");
				$("#grade > li").not($(this).parent()).removeClass("active");
				$("#grade_"+$(this).parent().data('gender')).show();
				$("#grade_"+$("#grade > li").not($(this).parent()).data('gender')).hide();
			}
			return false;
		});
		$("#upperschool > li:{{$user->gender == 0 ? 'first' : 'last'}} > a").trigger('click');
		$("#grade > li:{{$user->gender == 0 ? 'first' : 'last'}} > a").trigger('click');
	});
</script>
@stop
