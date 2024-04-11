<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ $title ?? '' }}  E-Library</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo2.png')}}">
    @include('administrator.layouts.partials.style')
    @stack('styles')
</head>
<body>

    @yield('app')

    @include('administrator.layouts.partials.script')
    @stack('scripts')
</body>
</html>
