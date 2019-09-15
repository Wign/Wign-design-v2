@extends('layouts.master')

@push('styles')
    @include('temp.backgroundImage')
@endpush

@section('content')
    @include('components.index.search')
    @include('includes.artist')
    @include('components.index.discovery')
@endsection