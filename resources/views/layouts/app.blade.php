<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bantara</title>
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
    <script src="https://kit.fontawesome.com/364218679d.js" crossorigin="anonymous"></script>
    @stack('styles')
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    @include('sweetalert::alert')

    <div id="app">
        <x-sidebar />
        <div id="main">
            <x-header />
            @yield('content')
            <x-footer />
        </div>
    </div>

    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
    @stack('scripts')
</body>

</html>
