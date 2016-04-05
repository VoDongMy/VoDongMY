<!DOCTYPE html>
<html lang="js">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="{{ trans('main.meta_tag') }}">
        <meta name="keywords" content="{{ trans('main.meta_tag') }}">
        <meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
        <meta property="og:image" content="http://asiantech.vn/assets/images/thumbs/img-development.png" />
        <meta property="og:description" content="We at AsianTech want to be at the forefront of the IT revolution in Vietnam. Our engineers work not only for professional and technological development, but also aspire to be part of an internationally expanding economy that is shaping the future of their country" />
        <title>@section('title') Asian Tech Co., Ltd. @show</title>
        <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
        @if(App::getLocale() == 'jp')
        <link rel="stylesheet" href="{{ asset('assets/css/jpstyle.css') }}" type="text/css">
        @endif
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
