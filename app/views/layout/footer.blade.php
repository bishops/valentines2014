	<footer>
      <div class="container">
        <p>bHarmony by <a href="https://twitter.com/TheBrianAnglin">@TheBrianAnglin</a>
       @if(Auth::check())
        <span class="pull-right"><a href="{{url('/logout')}}">Logout</a></p>
       @endif
        </p>
      </div>
    </footer>
