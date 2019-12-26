<h1 class="text-turkis-dark font-bold text-4xl">{{ __('text.user.passwordReset') }}</h1>

<div class="w-4/5 mt-4">
    <form method="POST" action="{{ route('password.email') }}">

        @csrf

        <div class="flex flex-wrap mb-4">
            <label for="email" class="w-1/5 px-4 py-2">{{ __('text.user.email') }}</label>

            <div class="w-3/5 px-4">
                <input id="email" type="email"
                       class="input input-default w-full{{ $errors->has('email') ? ' bg-red-dark' : '' }}"
                       name="email"
                       value="{{ old('email') }}"
                       required>

                @if ($errors->has('email'))
                    <span class="hidden mt-1 text-red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="flex flex-wrap">
            <div class="w-4/5 px-4">
                <button type="submit" class="btn btn-black w-full">
                    {{ __('text.user.passwordResetSend') }}
                </button>
            </div>
        </div>
    </form>
</div>
