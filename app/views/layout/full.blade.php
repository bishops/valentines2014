<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    @yield('meta')
    @include('layout.all_meta')
    <title>@yield('title')</title>
    @include('layout.ga')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @include('layout.style.bootstrapoverrides')
        .navbar-default .navbar-nav>.active>a
        {
          border-bottom: 2px solid #ff95e3;
        }
        .navbar-nav>li>a
        {
          padding-bottom: 26px;
          padding-top: 25px;
        }
        .navbar-nav>li>a:hover
        {
          border-bottom: 2px solid #ff95e3;
        }
        body {
            height: 100%;
            background:none transparent;
        }
        html { 
          background: url({{asset('img/lgbg.jpg')}}) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        footer {
            color: #666;
            background: #222;
            padding: 17px 0 18px 0;
            border-top: 1px solid #000;
        }
        footer a {
            color: #999;
        }
        footer a:hover {
            color: #efefef;
        }
        .wrapper {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin: 0 auto -63px;
        }
        .push {
            height: 63px;
        }
        /* not required for sticky footer; just pushes hero down a bit */
        .wrapper > .container {
            /*padding-top: 60px;*/
        }
        .jumbotron{
          background-color: rgba(238, 238, 238, .75);
        }
        
    </style>
  </head>
  <body>
    <nav class="navbar" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="{{asset('img/white_logo.png')}}" alt=""></a>
        </div>
        @yield('header_main')
      </div><!-- /.container-fluid -->
    </nav>
    <div class="wrapper">
      <div class="container">
        @section('main')
        <header class="hero-unit">
          <h1>Twitter&rsquo;s Bootstrap with Ryan Fait&rsquo;s Sticky Footer</h1>
          <p>It's really <strong>not</strong> that hard, y&rsquo;know. Check out the source code and <abbr title="Cascading Style Sheets">CSS</abbr> of this web page for how to do it yourself.</p>
        </header>
        @show
      </div>
      <div class="push"><!--//--></div>
    </div>
  </body>
</html>
