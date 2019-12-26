@extends('templates.master')

@section('content')
    <div class="container mt-16 flex flex-wrap pb-6">
        <div class="w-full lg:w-3/5 p-10 bg-translucent-80">
            @yield('leftSide')
        </div>
        <div class="w-full lg:w-2/5 p-10{{ (isset($inverted) && $inverted) ? ' bg-turkis' : ' bg-white'}}">
            @yield('rightSide')
        </div>
    </div>
    @include('atoms.artist')
@endsection
