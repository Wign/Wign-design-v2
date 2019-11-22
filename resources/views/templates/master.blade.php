<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="relative min-h-full">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts?? Awesome?? -->

    <!-- Styles -->
    @include('templates.style')

    @hasSection('title')
        <title>@yield('title') | Wign</title>
    @else
        <title>Wign</title>
    @endif
</head>
<body class="mb-16 bg-summergreen-translucent-5">
<div id="app">
@include('organisms.header')

<main>
    <div>
        @yield('content')
    </div>
</main> <!-- #main -->

@include('organisms.footer')
</div>
<!-- Scripts -->
@include('templates.scripts')
</body>
</html>
