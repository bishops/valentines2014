<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    @yield('meta')
    <title>@yield('title')</title>
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
        /*
        html, body {
            height: 100%;
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
        */

/*        footer {
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
        html, body, .container, .content {
            height: 100%;
        }
         
        .container, .content {
            position: relative;
        }*/
  </style>
  <!--<style>
        .proper-content {
            padding-top: 15px; /* >= navbar height */
        }
         
        .wrapper {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            margin: 0 auto -150px; /* same as the footer */
        }
         
        .push {
            height: 66px; /* same as the footer */
        }
        .footer-wrapper {
            position: relative;
            height: 66px;
        }
    </style>-->
  </head>
  <body>
    @if(Auth::check())
      @include('layout.header_logged_in') 
    @else
      @include('layout.header_no_login')
    @endif
    <div class="container">
     <div class="content">
        <div class="wrapper">
          <div class="proper-content">
              @section('main')
              <header class="hero-unit">
                <h1>Twitter&rsquo;s Bootstrap with Ryan Fait&rsquo;s Sticky Footer</h1>
                <p>It's really <strong>not</strong> that hard, y&rsquo;know. Check out the source code and <abbr title="Cascading Style Sheets">CSS</abbr> of this web page for how to do it yourself.</p>
              </header>
              @show
            </div>
            <div class="push"><!--//--></div>
          </div>
        </div>
      </div>
      <hr>
        <footer>
          <div class="container">
            <p>bHarmony by <a href="https://twitter.com/TheBrianAnglin">@TheBrianAnglin</a>
            @if(Auth::check())
             <span class="pull-right"><a href="{{url('/logout')}}">Logout</a></p>
             @endif
              </p>
          </div>
        </footer>
    </div>
    @yield('scripts')
  </body>
</html>
