    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top navbar-shadow">
        <div class="navbar-branding">
            <a class="navbar-brand" href="dashboard.html">
                <b>AsianTech</b> Admin
            </a>
            <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown menu-merge">
                <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
                    <span class="hidden-xs pl15">Welcome, {{ $info_user->name }} </span>
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
                <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                    <li class="list-group-item">
                        <a href="/cpanel/changepw" class="animated animated-short fadeInUp">
                            <span class="fa fa-gear"></span> Change password </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/cpanel/logout" class="animated animated-short fadeInUp">
                            <span class="fa fa-power-off pr5"></span>  Logout </a>
                    </li>
                    <li class="dropdown-footer"></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- End: Header -->

    