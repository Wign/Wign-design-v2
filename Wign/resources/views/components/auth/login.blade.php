<h4 class="uppercase m-0">@lang('text.welcome-back')</h4>
<h1 class="text-tyrisk-dark font-bold text-4xl">@lang('text.user.login')</h1>

<div class="w-3/5 mt-4">
    <button class="btn bg-facebook text-white hover:bg-facebook-dark w-full">
        <fa-icon :icon="['fab', 'facebook']" size="lg"></fa-icon>
        <span
                class="ml-2">@lang('text.user.loginFB')</span></button>
    <button class="btn bg-white hover:bg-gray-100 border border-gray-400 w-full mt-2">
        <fa-icon :icon="['fab', 'google']" size="lg"></fa-icon>
        <span class="ml-2">
                   {{ __('text.user.loginGO') }}
                </span>
    </button>

    <div class="my-4 text-center">
        <p class="text-center h4">
            - {{ __('word.or') }} -
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="mb-4">
            <label for="email">{{ __('text.user.email') }}</label>
            <input id="email"
                   type="email"
                   class="input input-default w-full mb-1{{ $errors->has('email') ? ' bg-red-700' : '' }}"
                   name="email"
                   value="{{ old('email') }}"
                   placeholder="{{ __('text.user.emailExample') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="mt-1 text-red-500">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
            @endif
        </div>

        <div class="mb-4">
            <label for="password">{{ __('text.user.password') }}</label>
            <input id="password"
                   type="password"
                   class="input input-default w-full mb-1{{ $errors->has('password') ? ' bg-red-dark' : '' }}"
                   name="password"
                   required>
            @if ($errors->has('password'))
                <span class="mt-1 text-red-500">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
            @endif
        </div>

        <button type="submit" class="btn btn-black w-full">
            {{ __('Login') }}
        </button>

        <a class="inline-block mt-2 hover:underline hover:text-gray-800"
           href="{{ route('password.request') }}">
            {{ __('text.user.passwordForgot') }}
        </a>

    </form>
</div>