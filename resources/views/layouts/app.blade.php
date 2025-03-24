<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Guardian Vids')</title>
    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/moderation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/useruploads.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editupload.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body>
    <x-banner />

    <main>
        @yield('content')
    </main>

</body>
</html>
