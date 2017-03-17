<nav id="glavna-nav" class="navbar navbar-inverse">
    <div class="container-fluid" id="nav">
        <div class="navbar-header" id="logo">
            <ul class="nav navbar-nav">
                <li><a  href="{{ url('/') }}">Events</a></li>
                <li><a href="{{ url('/') }}">Search events</a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            @else
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hi
                        {{ Auth::user()->name }} </a></li>
                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            @endif
        </ul>
</nav>