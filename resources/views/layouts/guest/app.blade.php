<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Jahitkan')</title>
    @include('layouts.guest.css')
</head>
<body>
    @include('layouts.guest.header')

    @yield('content')

    @include('layouts.guest.footer')
    @include('layouts.guest.js')
</body>
</html>
