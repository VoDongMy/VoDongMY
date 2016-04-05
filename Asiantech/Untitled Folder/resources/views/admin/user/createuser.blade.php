@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') New user :: @parent @stop
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
<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/user/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate-user', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel">
    <div class="panel-heading">
        <span class="panel-title">{{ trans('cpanel.add_new_user')}}</span>
    </div>
    <div class="panel-body">
        {!! Form::open(array('url' => URL::to('cpanel/user/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate-user', 'role' => 'form')) !!}
            <div class="alert alert-micro alert-border-left alert-danger alert-dismissable hidden" id="label-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check pr10"></i>
                <strong>False: </strong> This email already exist.
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="name">{{ trans('cpanel.fullname')}}</label>
                <div class="col-md-8">
                    {!! Form::text("name", '', array('class' => 'form-control pull-right', 'placeholder' => 'Fullname', 'id' => 'name')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Email</label>
                <div class="col-md-8">
                    {!! Form::text("email", '', array('class' => 'form-control pull-right', 'placeholder' => 'Email', 'id' => 'email')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="password">{{ trans('cpanel.password')}}</label>
                <div class="col-md-8">
                    {!! Form::password("password", array('class' => 'form-control pull-right', 'placeholder' => 'Password', 'id' => 'password')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="confirm_password">{{ trans('cpanel.confirm_password')}}</label>
                <div class="col-md-8">
                    {!! Form::password("confirm_password", array('class' => 'form-control pull-right', 'placeholder' => 'Confirm password', 'id' => 'confirm_password')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="daterangepicker1">{{ trans('cpanel.group_user')}}</label>
                <div class="col-md-8">
                    <select id="role_id" name="role_id" class="form-control">
                        <option value="">{{ trans('cpanel.select_group_user')}}</option> 
                        {!! $list_role !!}
                    </select>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> {{ trans('cpanel.submit')}} </button>
            <button class="button btn-danger btn btn-sm" type="reset"> {{ trans('cpanel.cancel')}} </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection

