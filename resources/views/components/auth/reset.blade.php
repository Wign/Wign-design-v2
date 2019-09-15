<h4 class="uppercase m-0">{{ __('text.user.passwordReset') }}</h4>

<div class="w-3/5 mt-4">
    <form method="POST" action="{{ route('password.request') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4 flex flex-wrap">
            <label for="email"
                   class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="md:w-1/2 pr-4 pl-4">
                <input id="email" type="email"
                       class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded{{ $errors->has('email') ? ' bg-red-dark' : '' }}" name="email"
                       value="{{ $email ?? old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="hidden mt-1 text-red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="mb-4 flex flex-wrap">
            <label for="password"
                   class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-right">{{ __('Password') }}</label>

            <div class="md:w-1/2 pr-4 pl-4">
                <input id="password" type="password"
                       class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded{{ $errors->has('password') ? ' bg-red-dark' : '' }}"
                       name="password" required>

                @if ($errors->has('password'))
                    <span class="hidden mt-1 text-red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="mb-4 flex flex-wrap">
            <label for="password-confirm"
                   class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal text-md-right">{{ __('Confirm Password') }}</label>

            <div class="md:w-1/2 pr-4 pl-4">
                <input id="password-confirm" type="password"
                       class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-grey-darker border border-grey rounded{{ $errors->has('password_confirmation') ? ' bg-red-dark' : '' }}"
                       name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="hidden mt-1 text-red">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="mb-4 flex flex-wrap mb-0">
            <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                <button type="submit" role="button" class="btn btn-black w-full">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>