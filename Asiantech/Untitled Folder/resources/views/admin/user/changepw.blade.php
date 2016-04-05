@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Change password :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="#">{{ trans('cpanel.user_setting')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray tray-center hidden" id="panel-change-passwd-success">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-widget newsletter-widget">
                <div class="panel-heading">
                    <span class="panel-title"> {{ trans('cpanel.notification')}}</span>
                </div>
                <div class="panel-body bg-light dark pb25">
                    <p class="mb15">{{ trans('cpanel_user_setting.pw_changed')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tray tray-center" id="panel-change-password">
{!! Form::open(array('url' => URL::to('cpanel/changepw'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">{{ trans('cpanel.change_password')}}</span>
        </div>
        <div class="panel-body">

            <div class="alert alert-micro alert-border-left alert-danger alert-dismissable hidden" id="label-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check pr10"></i>
                <strong>False: </strong> {{ trans('cpanel_user_setting.current_pw_incorrect')}}
            </div>

            <label class="col-md-2 text-right mt10" for="crpassword">{{ trans('cpanel.current_password')}}</label>
            <div class="col-md-10 ph30">
                <div class="form-group">
                    <div class="bs-component">
                        <div class="input-group">
                            {!! Form::password("crpassword", array('class' => 'form-control', 'placeholder' => 'Current password', 'id' => 'crpassword')) !!}
                        </div>
                    </div>
                </div>
            </div>
            <label class="col-md-2 text-right mt10" for="password">{{ trans('cpanel.new_password')}}</label>
            <div class="col-md-10 ph30">
                <div class="form-group">
                    <div class="bs-component">
                        <div class="input-group">
                            {!! Form::password("password", array('class' => 'form-control', 'placeholder' => 'New password', 'id' => 'password', 'minlength' => '6')) !!}
                        </div>
                    </div>
                </div>
            </div>
            <label class="col-md-2 text-right mt10" for="confirm_password">{{ trans('cpanel.confirm_new_password')}}</label>
            <div class="col-md-10 ph30">
                <div class="form-group">
                    <div class="bs-component">
                        <div class="input-group">
                            {!! Form::password("confirm_password", array('class' => 'form-control', 'placeholder' => 'Confirm password', 'id' => 'confirm_password', 'minlength' => '6', 'equalTo' => '#password')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit" id="btn-changepw"> {{ trans('cpanel.change')}} </button>
            <button class="button btn-danger btn btn-sm" type="reset"> {{ trans('cpanel.cancel')}} </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection

