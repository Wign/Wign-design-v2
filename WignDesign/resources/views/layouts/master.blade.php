<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts?? Awesome?? -->

    <!-- Styles -->
    @include('includes.style')

    @hasSection('title')
        <title>@yield('title') | Wign</title>
    @else
        <title>Wign</title>
    @endif
</head>
<body>
    @include('includes.header')
    <main class="container" id="main">
        @yield('content')
    </main> <!-- #main -->

    @include('includes.footer')
<!-- Scripts -->
@include('includes.scripts')
</body>
</html>