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
                <li><a class="p-2 no-underline" href="{{ Route::has('new') ? route('new') : '#' }}">@lang("nav.upload")</a></li>
                <li><a class="p-2 no-underline" href="{{ Route::has('ask') ? route('ask') : '#' }}">@lang("nav.requested")</a></li>
                <li><a class="p-2 no-underline" href="{{ Route::has('signs') ? route('signs') : '#' }}">@lang("nav.recent")</a></li>
                <li><a class="p-2 no-underline" href="{{ Route::has('sign') ? route('sign') : '#' }}">HJERTE (temp)</a></li>
                <li><a class="p-2 no-underline" href="{{ Route::has('about') ? route('about') : '#' }}">@lang("nav.about")</a></li>

                <!-- Authentication Links -->
                @guest
                    <li><a class="p-2 no-underline" href="{{ route('login') }}">@lang("nav.login")</a></li>
                    <!--<li><a class="inline-block py-2 px-4 no-underline" href="{{ route('register') }}">{{ __('Register') }}</a></li>-->
                @else
                    <li class=" relative">
                        <a id="navbarDropdown" class="p-2 no-underline inline-block w-0 h-0 ml-1 border-b-0 border-t border-r border-l" href="#" role="button" data-toggle="relative" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="absolute z-50 float-left hidden py-2 mt-1 text-base bg-white border border-gray-400 rounded" aria-labelledby="navbarDropdown">
                            <a class="block w-full py-1 px-6 font-normal text-gray-900 whitespace-no-wrap border-0" href="{{ route('logout') }}"
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
