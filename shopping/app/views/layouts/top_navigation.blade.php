<nav class="top-bar animate-dropdown">
    <div class="container">
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul>
                <li>{{HTML::link('/',__('Home'))}}</li>
                <li><a href="faq.html">{{__('FAQ')}}</a></li>
                <li>{{HTML::link('/contact',__('Contact'))}}</li>
            </ul>
        </div><!-- /.col -->
        <div class="col-xs-12 col-sm-6 no-margin">
            <ul class="right">
                <li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#change-language">{{__('English')}}</a>
                    <ul class="dropdown-menu" role="menu" >
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{__('Vietnamese')}}</a></li>
                    </ul>
                </li>
                <li>{{HTML::link('/register',__('Register'))}}</li>
                <li>{{HTML::link('/register',__('Login'))}}</li>
            </ul>
        </div><!-- /.col -->
    </div><!-- /.container -->
</nav><!-- /.top-bar -->