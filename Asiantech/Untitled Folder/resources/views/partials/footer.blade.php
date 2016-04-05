<footer class="footer">
    <div class="container">
        <div class="above">
            <a href="/<?php echo App::getLocale(); ?>/index" class="logo">
                <img src="{{ asset('assets/images/thumbs/logo_footer.png') }}" alt="asiantech">
            </a>
            <nav>
                <ul class="menu">
                    <li class="menu_list">
                        <a href="{{ URL::to(App::getLocale().'/offshore-development') }}">OFFSHORE DEVELOPMENT</a>
                    </li>
                    <li class="menu_list">
                        <a href="{{ URL::to(App::getLocale().'/about') }}">ABOUT</a>
                    </li>
                    <li class="menu_list">
                        <a href="{{ URL::to(App::getLocale().'/service') }}">SERVICES</a>
                    </li>
                    <li class="menu_list">
                        <a href="{{ URL::to(App::getLocale().'/team') }}">TEAM</a>
                    </li>
                </ul>
            </nav>
            <ul class="icon_footer">
                <li class="icon_footer_list">
                    <a href="{{ URL::to(App::getLocale().'/contact') }}">
                        <i class="icons_mail">&nbsp;</i>
                    </a>
                </li>
                <li class="icon_footer_list">
                    <a href="https://www.facebook.com/asiantech.vn" target="_blank">
                        <i class="icons_facebook">&nbsp;</i>
                    </a>
                </li>
            </ul>
        </div>
        <!--end above-->
        <div class="below">
            <ul class="about_us">
                <li class="about_us_list">
                    <a href="{{ URL::to(App::getLocale().'/outline') }}">Company Profile</a>
                </li>
                <li class="about_us_list">
                    <a href="{{ URL::to(App::getLocale().'/privacy-policy') }}">Privacy Policy</a>
                </li>
            </ul>
            <div class="copyright">
                <p>Copyright Asian Tech Co., Ltd. 2015</p>
            </div>
        </div>
        <!--end below-->
    </div>
</footer>
