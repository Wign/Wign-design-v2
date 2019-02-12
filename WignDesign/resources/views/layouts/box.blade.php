@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-7 bg-translucent">
                @yield('leftSide')
            </div>
            <div class="col-lg-5 bg-white">
                @yield('rightSide')
            </div>
        </div>
    </div>
@endsection