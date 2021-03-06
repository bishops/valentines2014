@extends('layout.header')
@section('header_main')
     <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li {{ Request::segment(1) == "" ? 'class="active"':'/'}}><a href="{{url('/')}}">Questions</a></li>
        <li {{ Request::segment(1) == "results" ? 'class="active"':''}}><a href="results">Results</a></li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li><a href="logout">Logout&nbsp;<span class="glyphicon glyphicon-off"></span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
@stop
