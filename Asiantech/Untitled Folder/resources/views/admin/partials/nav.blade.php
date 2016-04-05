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
?>
    <ul class="nav sidebar-menu">
        <li class="sidebar-label pt20">{{ trans('cpanel.menu')}}</li>
        <li>
            <a href="/cpanel/dashboard">
                <span class="glyphicon glyphicon-home"></span>
                <span class="sidebar-title">{{ trans('cpanel.dashboard')}}</span>
            </a>
        </li>
        <!-- <li @if ($ModuleName == 'member')class="active" @endif>
            <a href="/cpanel/member">
                <span class="glyphicon glyphicon-user"></span>
                <span class="sidebar-title"> {{ trans('cpanel.member')}} </span>
            </a>
        </li>
        <li @if ($ModuleName == 'contact')class="active" @endif>
            <a href="/cpanel/contact">
                <span class="fa fa-envelope"></span>
                <span class="sidebar-title"> {{ trans('cpanel.contact')}} </span>
            </a>
        </li>  -->       
        <li class="sidebar-label pt15"> {{ trans('cpanel.administrator')}} </li> 
        <li>
            <a href="/cpanel/groupuser">
                <span class="fa fa-users"></span>
                <span class="sidebar-title"> {{ trans('cpanel.group_user')}} </span>
            </a>
        </li>
        <li>
            <a href="/cpanel/user">
                <span class="glyphicon glyphicon-user"></span>
                <span class="sidebar-title"> {{ trans('cpanel.user')}} </span>
            </a>
        </li>
        <li>
            <a class="accordion-toggle @if (in_array($ModuleName, array('languages'))) menu-open @endif" href="#">
                <span class="glyphicon glyphicon-fire"></span>
                <span class="sidebar-title"> {{ trans('cpanel.setting')}} </span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li @if ($ModuleName == 'languages')class="active" @endif>
                    <a href="/cpanel/languages">
                        <span class="glyphicon glyphicon-book"></span> {{ trans('cpanel.languages')}} </a>
                </li>
                <!-- <li @if ($ModuleName == 'translate')class="active" @endif>
                    <a href="/cpanel/translate">
                        <span class="glyphicon glyphicon-modal-window"></span> Translate </a>
                </li> -->
                <li @if ($ModuleName == 'config')class="active" @endif>
                    <a href="/cpanel/config">
                        <span class="fa fa-cogs"></span> Configuration</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- End: Sidebar Menu -->
