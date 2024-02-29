<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>logindaftar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap" />
    <link rel="stylesheet" href="{{ asset('templete_login/assets/css/bs-theme-overrides.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('templete_login/assets/css/styles.css') }}" />
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body style="--bs-body-color: var(--bs-body-color); background: #F0F2F5">
    @yield('content')
    @stack('scripts')
</body>
</html>
