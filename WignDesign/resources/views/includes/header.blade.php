<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand py-2" href="{{ url('/') }}"><img src="../images/logo/wign-logo-colour.svg" class="wign-logo" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!--
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto text-small">
                <li><a class="nav-link" href="/new">@lang("nav.upload")</a></li>
                <li><a class="nav-link" href="/ask">@lang("nav.requested")</a></li>
                <li><a class="nav-link" href="/signs">@lang("nav.recent")</a></li>
                <li><a class="nav-link" href="{{ route('about') }}">@lang("nav.about")</a></li>

                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">@lang("nav.login")</a></li>
                    <!--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>-->
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li><a class="nav-link" href="#"><img src="../images/flag/da_DK.svg" class="header-flag" alt="Sprog: Dansk"></a></li>
            </ul>
        </div>
    </div>
</nav>