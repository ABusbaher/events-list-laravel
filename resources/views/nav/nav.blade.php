<nav id="glavna-nav" class="navbar navbar-inverse">
    <div class="container-fluid" id="nav">
        <div class="navbar-header" id="logo">
            <ul class="nav navbar-nav">
            @if(Auth::check())
                <!-----LINKOVI SAMO ZA ADMINISTRATORA------->
                @if(Auth::user()->isAdmin())
                    <li><a  href="{{ url('/admin/events') }}">FESTIVALI</a></li>
                    <li><a href="{{ url('/admin/users') }}">KORISNICI</a></li>
                @else
                <!-----LINK ZA SUBSCRIBERA------->
                    <li><a  href="{{ url('/events') }}">FESTIVALI</a></li>
               @endif
            @else
                  <!-----LINK ZA SVE------->
                 <li><a  href="{{ url('/events') }}">FESTIVALI</a></li>
            @endif

            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <!-----LINKOVI ZA NE PRIJAVLJENOG KORISNIKA------->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            @else
            <!-----LINKOVI ZA PRIJAVLJENOG KORISNIKA------->
                <li><a href="{!! Url::to('user',Auth::user()->id) !!}"><span class="glyphicon
                glyphicon-user"></span>Hi
                        {{ Auth::user()->name }} </a></li>
                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            @endif
        </ul>
</nav>