<!DOCTYPE html>
<html lang="js">
    <head>
        <meta charset="utf-8">
        <title>@section('title') Asian Tech Co., Ltd. @show</title>
        <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    </head>
    <body>
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="{{ asset('assets/js/libs.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wall.js') }}"></script>
    </body>
</html>
