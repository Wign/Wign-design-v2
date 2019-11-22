@extends('templates.box')

@push('styles')
    @include('temp.backgroundImage')
@endpush

@section('leftSide')
    @include('organisms.auth.login')
@endsection

@section('rightSide')
    @include('organisms.auth.createUser')
@endsection
