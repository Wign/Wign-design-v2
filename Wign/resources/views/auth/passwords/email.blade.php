@extends('layouts.box', ['inverted' => true])

@push('styles')
    @include('temp.backgroundImage')
@endpush

@section('leftSide')
    @include('components.auth.email')
@endsection

@section('rightSide')
    <fa-icon :icon="['fas', 'home']" size="10x" class="mx-auto block text-white"></fa-icon>
@endsection
