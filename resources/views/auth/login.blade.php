@extends('layouts.box')

@push('styles')
    @include('temp.backgroundImage')
@endpush

@section('leftSide')
    @include('components.auth.login')
@endsection

@section('rightSide')
    @include('components.auth.createUser')
@endsection
