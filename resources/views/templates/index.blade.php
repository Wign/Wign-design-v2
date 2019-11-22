@extends('templates.master')

@push('styles')
    @include('temp.backgroundImage')
@endpush

@section('content')
    @include('organisms.search')
    @include('atoms.artist')
    @include('organisms.discovery')
@endsection
