@extends('layouts.box')

@section('leftSide')
    @include('components.auth.login')
@endsection

@section('rightSide')
    @include('components.auth.createUser')
@endsection