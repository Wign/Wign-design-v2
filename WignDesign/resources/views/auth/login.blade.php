@extends('layouts.box')

@push('styles')
    <style>
        body {
            /*background: url("images/background/viggo/eksamen-tegning.jpg") no-repeat center center fixed;*/
            background: url("images/background/alexei/4school.jpg") no-repeat center center fixed;
            background-size: cover;
        }
    </style>
@endpush

@section('leftSide')
    <div class="p-5">
        <p class="text-uppercase m-0">@lang('text.welcome-back')</p>
        <h1 class="text-secondary font-weight-bold">@lang('text.user.login')</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"
                                   name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('rightSide')
    <div class="p-5">
        <p class="text-uppercase m-0">@lang('text.user.new')</p>
        <h1 class="text-secondary font-weight-bold">@lang('text.user.create')</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Roges enim Aristonem, bonane ei videantur haec:
            vacuitas doloris, divitiae, valitudo; Qualem igitur hominem natura inchoavit? Easdemne res? Nihilo magis.
            Summus dolor plures dies manere non potest? Duo Reges: constructio interrete.
        </p>
        <p>
            Non enim, si omnia non sequebatur, idcirco non erat ortus illinc. Ego quoque, inquit, didicerim libentius si
            quid attuleris, quam te reprehenderim. Res tota, Torquate, non doctorum hominum, velle post mortem epulis
            celebrari memoriam sui nominis. Quam ob rem tandem, inquit, non satisfacit? Quis non odit sordidos, vanos,
            leves, futtiles? Ex quo, id quod omnes expetunt, beate vivendi ratio inveniri et comparari potest. Quamquam
            in hac divisione rem ipsam prorsus probo, elegantiam desidero. Idemque diviserunt naturam hominis in animum
            et corpus.
        </p>
        <button type="button" class="btn btn-dark rounded-0 w-100">@lang('text.user.create')</button>
    </div>
@endsection