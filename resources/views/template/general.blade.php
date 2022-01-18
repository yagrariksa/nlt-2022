<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Style --}}
    <link rel="stylesheet" href="{{ url('assets/scss/app.css') }}">

    {{-- Favicon --}}
    {{-- <link rel="shortcut icon" href="{{ url('assets/img/favicon.png') }}" type="image/x-icon"> --}}
</head>

<body>
    {{-- navbar --}}
    @yield('navbar')

    <div class="content">
        @yield('content')
    </div>

    @yield('other')

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>
