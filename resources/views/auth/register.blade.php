@extends('templates.box')

@push('styles')
    @include('temp.backgroundImage')
@endpush

@section('leftSide')
    <div class="lg:w-3/5 xl:w-1/2">
        <h1 class="text-tyrisk-dark font-bold text-5xl">{{ __('text.user.soon') }}</h1>
    </div>
@endsection

@section('rightSide')
    @include('organisms.auth.registerUser')
@endsection
