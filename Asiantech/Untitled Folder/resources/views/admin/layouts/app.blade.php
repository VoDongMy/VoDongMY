<!DOCTYPE html>
<html>
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta name="author" content="nguyenvq@asiantech.vn">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@section('title') - AsianTech Inc. @show</title>
        @section('meta_keywords')
        <meta name="keywords" content=""/>
        @show @section('meta_author')
        <meta name="author" content="PHP Team"/>
        @show @section('meta_description')
        <meta name="description" content=""/>
        @show

        <!-- Font CSS (Via CDN) -->
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
        <!-- Theme CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/skin/default_skin/css/theme.css') }}">
        <!-- Admin Forms CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/admin-tools/admin-forms/css/admin-forms.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
         <![endif]-->
        @yield('styles')
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/assets/img/favicon.ico') }}">
    </head>
    @yield('body')

    @yield('nav')

    @yield('content')

    @yield('footer')

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>