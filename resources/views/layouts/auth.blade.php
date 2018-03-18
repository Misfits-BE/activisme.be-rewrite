<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="uft-8">
        <meta name="author" content="ActivismeBE">

        <title> {{ config('app.name') }} - @yield('title') </title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/auth.css') }}">
    </head>

    <body class="my-login-page">
        @yield('content')

        {{-- Scripts --}}
        <script src="{{ asset('js/auth.js') }}"></script>
    </body>
</html>