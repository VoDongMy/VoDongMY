<!DOCTYPE html>
<html class="bg-black">
    @include('layouts.admin_head')
    <body class="bg-black">
        <div class="form-box" id="login-box">
            @if(Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade in no-margin" role="alert">
                <button class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{Session::get('error')}}</strong>
            </div>
            <br>
            @endif
            <div class="header">Sign In</div>
            {{Form::open(array('url'=>URL::route('admin.login'),'method'=>'post'))}}
                <div class="body bg-gray">
                    <div class="form-group">
                        {{Form::text('email',null,array('class'=>'form-control','placeholder'=>'User ID','required'=>''))}}
                    </div>
                    <div class="form-group">
                        {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password','required'=>''))}}
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<input type="checkbox" name="remember_me"/> Remember me--}}
                    {{--</div>--}}
                </div>
                <div class="footer">
                    {{Form::submit('Sign me in',array('class'=>'btn bg-olive btn-block'))}}
                    {{--<p><a href="#">I forgot my password</a></p>--}}
                    {{--<a href="register.html" class="text-center">Register a new membership</a>--}}
                </div>
            {{Form::close()}}
            {{--<div class="margin text-center">--}}
                {{--<span>Sign in using social networks</span>--}}
                {{--<br/>--}}
                {{--<button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>--}}
                {{--<button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>--}}
                {{--<button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>--}}
            {{--</div>--}}
        </div>
        {{HTML::script("lib/js/jquery-1.10.2.min.js")}}
        {{HTML::script("lib/js/bootstrap.min.js")}}
    </body>
</html>