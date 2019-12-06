@extends('templates.master')

@section('content')
    <div class="container mt-20 mb-5">
        <div class="flex flex-wrap">
            <article class="w-full">
                @yield('plainContent')
            </article>
        </div>
    </div>
@endsection
