<nav class="relative py-2 px-4 pin-t bg-white">
    <div class="container mx-auto flex flex-row flex-wrap items-center justify-between">
        <a class="pt-1 pb-1 mr-4" href="{{ url('/') }}"><img src="{{asset('/images/logo/wign-logo-colour.svg')}}" class="wign-logo inline" alt="@lang("common.Wign.logo")"></a>

        {{-- To small screen; show navigation dropdown
        <button class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        --}}

        <div class="collapse flex-grow-0" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="flex flex-wrap text-xs">
                <li><a class="p-2 header-link" href="{{ Route::has('new') ? route('new') : '#' }}">@lang("nav.upload")</a></li>
                <li><a class="p-2 header-link" href="{{ Route::has('ask') ? route('ask') : '#' }}">@lang("nav.requested")</a></li>
                <li><a class="p-2 header-link" href="{{ Route::has('signs') ? route('signs') : '#' }}">@lang("nav.recent")</a></li>
                <li><a class="p-2 header-link" href="{{ Route::has('sign') ? route('sign') : '#' }}">HJERTE (temp)</a></li>
                <li><a class="p-2 header-link" href="{{ Route::has('about') ? route('about') : '#' }}">@lang("nav.about")</a></li>

                <!-- Authentication Links -->
                @guest
                    <li><a class="p-2 header-link" href="{{ route('login') }}">{{ __('nav.login') }})</a></li>
                    <li><a class="p-2 header-link" href="{{ route('register') }}">{{ __('nav.register') }}</a></li>
                @else
                    <li class="relative group">
                        <a class="p-2 header-link" href="#" role="button" data-toggle="relative" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <fa-icon :icon="['fas', 'angle-left']" class="group-hover:rotate-90ccw"></fa-icon>
                        </a>

                        <div class="invisible group-hover:visible absolute z-50 pt-1 mt-2 bg-white shadow-md" aria-labelledby="navbarDropdown" role="navigation">
                            <a class="block w-full py-1 px-6 whitespace-no-wrap hover:bg-gray-200" href="{{ route('register') }}">{{ __('nav.profile') }}</a>
                            <a class="block w-full py-1 px-6 whitespace-no-wrap hover:bg-gray-200" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li><a class="p-2 no-underline" href="#"><img src="{{asset('/images/flag/da_DK.svg')}}" class="header-flag inline" alt="Sprog: Dansk"></a></li>
            </ul>
        </div>
    </div>
</nav>
