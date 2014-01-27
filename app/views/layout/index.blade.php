<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    @yield('meta')
    <title>@yield('title')</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        /* not required for sticky footer; just pushes hero down a bit */
        .wrapper > .container {
            padding-top: 60px;
        }
    </style>
  </head>
  <body>
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
    <footer>
      <div class="container">
        <p>Bishop's Valentine's Day Matching Application - Produced by <a href="https://twitter.com/TheBrianAnglin">@theBrianAnglin</a> &amp; Graham Held
       @if(Auth::check())
        <span class="pull-right"><a href="{{url('/logout')}}">Logout</a></p>
       @endif
        </p>
      </div>
    </footer>
  </body>
</html>
