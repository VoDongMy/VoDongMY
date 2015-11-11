<!DOCTYPE html>
<html lang="en">
    @include('layouts.admin_head')
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        @include('layouts.admin_header')
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                @include('layouts.admin_sidebar')
            </aside>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        {{ (isset($content_header)) ? $content_header : "Not set content header" }}
                        <small>Control panel</small>
                    </h1>
                </section>
                @yield('admin_main')
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- add new calendar event modal -->
        {{HTML::script("lib/js/jquery-1.10.2.min.js")}}
        {{HTML::script("lib/js/bootstrap.min.js")}}
        {{HTML::script("lib/js/AdminLTE/app.js")}}
        @section('js')
        @show
    </body>
</html>
