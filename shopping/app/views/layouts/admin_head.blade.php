<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{HTML::style("lib/css/bootstrap.min.css")}}
    {{HTML::style("lib/css/font-awesome.min.css")}}
    <!-- Ionicons -->
    {{HTML::style("lib/css/admin/ionicons.css")}}
    <!-- Theme style -->
    {{HTML::style("lib/css/admin/AdminLTE.css")}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      {{HTML::script("lib/js/html5shiv.js")}}
      {{HTML::script("lib/js/respond.min.js")}}
    <![endif]-->
    @section('css')
    @show
    <script type="text/javascript">
        var base = '{{ URL::to("/") }}';
    </script>
</head>