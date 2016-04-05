<!DOCTYPE html>
<html>
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <title>@section('title') - AsianTech Inc. @show</title>
        <meta name="author" content="PHP Team">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @include('admin.partials.css')

    </head>

    <body class="dashboard-page sb-l-o sb-r-c datatables-page ui-buttons-page admin-modals-page">
        <!-- Start: Main -->
        <div id="main">
            @include('admin.partials.head')
            <!-- Start: Sidebar -->
            <aside id="sidebar_left" class="nano nano-light affix has-scrollbar sidebar-default sidebar-light light">
                <div class="sidebar-left-content nano-content">
                    @include('admin.partials.nav')
                    <!-- include(nav) -->
                </div>
            </aside>
            <!-- End: Sidebar Left -->
            <section id="content_wrapper">
                <!-- Start: Topbar -->
                @yield('topbar')
                <!-- End: Topbar -->
                <!-- Begin: Content -->
                <section id="content">
                @yield('content')
                </section>
                <!-- End: Content -->

                <!-- Begin: Page Footer -->
                <footer id="content-footer" class="affix">
                    <div class="row">
                        <div class="col-xs-6">
                            <span class="footer-legal">© 2015 AsianTech Inc</span>
                        </div>
                        
                    </div>
                </footer>
                <!-- End: Page Footer -->

            </section>
            <!-- End: Content-Wrapper -->
        </div>
        <!-- End: Main -->
        <div id="modal-panel" class="popup-basic bg-none mfp-with-anim mfp-hide">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-icon">
                        <i class="fa fa-pencil"></i>
                    </span>
                    <span class="panel-title"> Confirm your action.</span>
                </div>
                <div class="panel-body">
                    <p>Are you sure delete this record? If you click yes button. This record will not restore. </p>
                </div>
                <div class="panel-footer text-right">
                    <a class="btn btn-danger" href="" id="btnYes">Yes</a>
                </div>
            </div>
        </div>
        @include('admin.partials.js')
    </body>
</html>
