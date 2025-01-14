<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('themes/css/styles.css') }}">
    @stack('css')
</head>

<body class="sb-nav-fixed">
    <div id="app">
        @include('layouts.partials.topbar')
        <div id="layoutSidenav">
            @include('layouts.partials.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @include('layouts.partials.title')
                        @yield('content')
                    </div>
                </main>
                @include('layouts.partials.footer')
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('themes/js/scripts.js') }}"></script>

    @stack('scripts')

</body>

</html>
