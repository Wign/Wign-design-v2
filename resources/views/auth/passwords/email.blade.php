@extends('templates.box', ['inverted' => true])

@push('styles')
    @include('temp.backgroundImage')
@endpush

@section('leftSide')
    @include('organisms.auth.email')
@endsection

@section('rightSide')
    <fa-icon :icon="['fas', 'home']" size="10x" class="mx-auto block text-white"></fa-icon>
@endsection
