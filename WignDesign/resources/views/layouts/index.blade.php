@extends('layouts.master')

@push('styles')
    <style>
        body {
            /*background: url("images/background/viggo/eksamen-tegning.jpg") no-repeat center center fixed;*/
            background: url("images/background/alexei/4school.jpg") no-repeat center center fixed;
            background-size: cover;
        }
    </style>
@endpush

@section('content')
    @include('components.index.search')
    @include('components.index.discovery')
@endsection