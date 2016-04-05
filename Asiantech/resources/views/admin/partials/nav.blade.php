    <!-- Start: Sidebar Menu -->
<?php
    $RouteName = Route::current()->getName();
    $ModuleName = '';
    if ($RouteName) {
        $arrRoute = explode('.', $RouteName);
        if (count($arrRoute) > 2) {
            $ModuleName = $arrRoute[1];
        }
    }
    $list_access = $info_user->hasAccess();
    $array_access = array();
    foreach ($list_access as $key => $value) {
        $array = explode('_', $value);
        if (!in_array($array[0], $array_access)) {
            $array_access[] = $array[0];
        }
    }
?>
    <ul class="nav sidebar-menu">
        <li class="sidebar-label pt20">Menu</li>
        <li>
            <a href="/cpanel/dashboard">
                <span class="glyphicon glyphicon-home"></span>
                <span class="sidebar-title">Dashboard</span>
            </a>
        </li>
        @if(in_array('staticpage', $array_access))
        <li @if ($ModuleName == 'staticpage')class="active" @endif>
            <a href="/cpanel/staticpage">
                <span class="glyphicon glyphicon-book"></span>
                <span class="sidebar-title"> Static page </span>
            </a>
        </li>
        @endif
        @if(in_array('service', $array_access))
        <li @if ($ModuleName == 'service')class="active" @endif>
            <a href="/cpanel/service">
                <span class="fa fa-flash"></span>
                <span class="sidebar-title"> Services </span>
            </a>
        </li>
        @endif
        @if(in_array('timeline', $array_access))
        <li @if ($ModuleName == 'timeline')class="active" @endif>
            <a href="/cpanel/timeline">
                <span class="fa fa-clock-o"></span>
                <span class="sidebar-title"> Timeline </span>
            </a>
        </li>
        @endif
        @if(in_array('team', $array_access))
        <li>
            <a href="/cpanel/team">
                <span class="fa fa-group"></span>
                <span class="sidebar-title"> Team </span>
            </a>
        </li>
        @endif
        @if(in_array('member', $array_access))
        <li>
            <a href="/cpanel/member">
                <span class="glyphicon glyphicon-user"></span>
                <span class="sidebar-title"> Member </span>
            </a>
        </li>
        @endif
        @if(in_array('contact', $array_access))
        <li>
            <a href="/cpanel/contact">
                <span class="fa fa-envelope"></span>
                <span class="sidebar-title"> Contact </span>
            </a>
        </li>        
        @endif
        @if(in_array('config', $array_access) || in_array('groupuser', $array_access) || in_array('user', $array_access))
        <li class="sidebar-label pt15"> Administrator </li>
        @if(in_array('groupuser', $array_access)) 
        <li>
            <a href="/cpanel/groupuser">
                <span class="fa fa-users"></span>
                <span class="sidebar-title"> Group user </span>
            </a>
        </li>
        @endif
        @if(in_array('user', $array_access))
        <li>
            <a href="/cpanel/user">
                <span class="glyphicon glyphicon-user"></span>
                <span class="sidebar-title"> User </span>
            </a>
        </li>
        @endif
        @if(in_array('config', $array_access))
        <li>
            <a class="accordion-toggle @if (in_array($ModuleName, array('languages'))) menu-open @endif" href="#">
                <span class="glyphicon glyphicon-fire"></span>
                <span class="sidebar-title"> Setting </span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li @if ($ModuleName == 'languages')class="active" @endif>
                    <a href="/cpanel/languages">
                        <span class="glyphicon glyphicon-book"></span> Languages </a>
                </li>
                <!-- <li @if ($ModuleName == 'translate')class="active" @endif>
                    <a href="/cpanel/translate">
                        <span class="glyphicon glyphicon-modal-window"></span> Translate </a>
                </li> -->
            </ul>
        </li>
        @endif
        @endif
    </ul>
    <!-- End: Sidebar Menu -->
