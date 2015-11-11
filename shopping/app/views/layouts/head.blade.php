<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>{{ (isset($web_title)) ? __($web_title) : __("MediaCenter - Responsive eCommerce Template") }}</title>
    <!-- Bootstrap Core CSS -->
    {{HTML::style("lib/css/bootstrap.min.css",array('rel'=>'stylesheet','type'=>'text/css'))}}
    <!-- Customizable CSS -->
    {{HTML::style("lib/css/main.css")}}
    {{HTML::style("lib/css/blue.css")}}
    {{HTML::style("lib/css/owl.carousel.css")}}
    {{HTML::style("lib/css/owl.transitions.css")}}
    {{HTML::style("lib/css/animate.min.css")}}
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Icons/Glyphs -->
    {{HTML::style("lib/css/font-awesome.min.css")}}
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('lib/images/favicon.ico') }}">
    <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
        {{HTML::script("lib/js/html5shiv.js")}}
        {{HTML::script("lib/js/respond.min.js")}}
    <![endif]-->
</head>