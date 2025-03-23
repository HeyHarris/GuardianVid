<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Guardian Vids')</title>
    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
</head>
<body>
    <x-banner />

    <main>
        @yield('content')
    </main>

</body>
</html>
