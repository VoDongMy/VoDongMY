
<nav class="menu">
    <ul class="menu_list">
        <li class="menu_item x_anchor">
            <a href="{{ URL::to(App::getLocale().'/offshore-development') }}" class="menu_link  x_anchor_trigger">{{ trans('menu.offshore_development') }}</a>
            <ul class="menu_anchor_list x_zindex">
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/offshore-development#offshore') }}" class="menu_anchor_link">{{ trans('menu.what_is_offshore') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/offshore-development#process') }}" class="menu_anchor_link">{{ trans('menu.development_process') }}</a>
                </li>
            </ul>
        </li>
        <li class="menu_item x_anchor">
            <a href="{{ URL::to(App::getLocale().'/about') }}" class="menu_link  x_anchor_trigger">{{ trans('menu.about') }}</a>
            <ul class="menu_anchor_list x_zindex">
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/about#vision') }}" class="menu_anchor_link">{{ trans('menu.about_vision') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/about#why') }}" class="menu_anchor_link">{{ trans('menu.about_why') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/about#ceo') }}" class="menu_anchor_link">{{ trans('menu.about_ceo') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/about#history') }}" class="menu_anchor_link">{{ trans('menu.about_history') }}</a>
                </li>
            </ul>
        </li>
        <li class="menu_item x_anchor">
            <a href="{{ URL::to(App::getLocale().'/service') }}" class="menu_link  x_anchor_trigger">{{ trans('menu.services') }}</a>
            <ul class="menu_anchor_list x_zindex">
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/service#web') }}" class="menu_anchor_link">{{ trans('menu.services_web') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/service#applications') }}" class="menu_anchor_link">{{ trans('menu.services_application') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/service#enterprise') }}" class="menu_anchor_link">{{ trans('menu.services_enterprise') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/service#internal') }}" class="menu_anchor_link">{{ trans('menu.services_internal') }}</a>
                </li>
            </ul>
        </li>
        <li class="menu_item x_anchor">
            <a href="{{ URL::to(App::getLocale().'/team') }}" class="menu_link  x_anchor_trigger">{{ trans('menu.team') }}</a>
            <ul class="menu_anchor_list x_zindex">
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/team#teams') }}" class="menu_anchor_link">{{ trans('menu.team_teams') }}</a>
                </li>
                <li class="menu_anchor_item x_anchor_target">
                    <a href="{{ URL::to(App::getLocale().'/team#interview') }}" class="menu_anchor_link">{{ trans('menu.team_interview') }}</a>
                </li>
            </ul>
        </li>
        <li class="menu_item x_anchor">
            <a href="{{ URL::to(App::getLocale().'/contact') }}" class="menu_link">
                <i class="icons_contact">&nbsp;</i>
            </a>
        </li>
    </ul>
</nav>
