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
    <link rel="shortcut" href="{{ url('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('assets/img/favicon.png') }}" type="image/x-icon">

    {{-- SEO --}}
    <meta name="description" content="@yield('seo-desc')">
    <meta name="canonical" href=""> {{-- ini buat optimize page --}}
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('seo-desc')">
    <meta property="og:image" content="@yield('seo-img')">
</head>

<body class="@yield('bodyclass')">
    {{-- navbar --}}
    @yield('navbar')

    <div class="content @yield('addclass')">
        @yield('content')
    </div>
    <div class="content adm-mobile">
        @yield('admin-mobile')
    </div>

    @yield('other')

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script> --}}
    {{-- <script src="{{ url('assets/js/list.min.js') }}"></script> --}}
    <script src="{{ url('assets/js/app.js') }}"></script>
    <script src="{{ url('assets/js/sort-table.js') }}"></script>
</body>

</html>
