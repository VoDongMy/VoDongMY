@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Configuration website :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/config">{{ trans('cpanel.configuration_website')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/config'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <!-- create new order panel -->
    @if (session('status'))
    <div class="alert alert-micro alert-border-left alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-check pr10"></i>
        <strong>Configuration updated!</strong>
    </div>
    @endif
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs">{{ trans('cpanel.configuration_website')}}</span>
            <ul class="nav panel-tabs-border panel-tabs">

                <li class="active">
                    <a href="#tab1" data-toggle="tab">{{ trans('cpanel.generate_config')}}</a>
                </li>
                <li>
                    <a href="#tab2" data-toggle="tab">{{ trans('cpanel.email_config')}}</a>
                </li>
            </ul>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                <div id="tab1" class="tab-pane active">
                    <div class="tab-block mb25">
                        <ul class="nav tabs-left tabs-border">
                            <li class="active">
                                <a href="#tab14_1" data-toggle="tab">{{ trans('cpanel.home_page')}}</a>
                            </li>
                            <li>
                                <a href="#tab14_2" data-toggle="tab">{{ trans('cpanel.offshore_development_page')}}</a>
                            </li>
                            <li>
                                <a href="#tab14_3" data-toggle="tab">{{ trans('cpanel.about_page')}}</a>
                            </li>
                            <li>
                                <a href="#tab14_4" data-toggle="tab">{{ trans('cpanel.services_page')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab14_1" class="tab-pane active">
                                <div class="col-md-12 mb20">
                                    <h4> 
                                        Config static page for home page.
                                    </h4>
                                </div>      
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('privacy_policy', 'Page privacy policy', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            <select name="privacy_policy">
                                            {!! $pages->selectBoxPage($array_properties ? $array_properties['privacy_policy'] : '') !!}
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div> 
                            </div>
                            <div id="tab14_2" class="tab-pane">
                                <div class="col-md-12 mb20">
                                    <h4> 
                                        Config static page for Offshore development page.
                                    </h4>
                                </div>      
                                
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('offshore_dev', 'Block What is offshore development?', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            <select name="offshore_dev">
                                            {!! $pages->selectBoxPage($array_properties ? $array_properties['offshore_dev'] : '') !!}
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('laboratory', 'Block Laboratory', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            <select name="laboratory">
                                            {!! $pages->selectBoxPage($array_properties ? $array_properties['laboratory'] : '') !!}
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('package', 'Block Package', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            <select name="package">
                                            {!! $pages->selectBoxPage($array_properties ? $array_properties['package'] : '') !!}
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div> 
                            </div>
                            <div id="tab14_3" class="tab-pane">
                                <div class="col-md-12 mb20">
                                    <h4> 
                                        Config static page for about page.
                                    </h4>
                                </div>      
                                
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('block_about', 'Block About', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            <select name="block_about">
                                            {!! $pages->selectBoxPage($array_properties ? $array_properties['block_about'] : '') !!}
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('why_vietnam', 'Block Why Vietnam?', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            <select name="why_vietnam">
                                            {!! $pages->selectBoxPage($array_properties ? $array_properties['why_vietnam'] : '') !!}
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('message_ceo', 'Block Message from CEO', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            <select name="message_ceo">
                                            {!! $pages->selectBoxPage($array_properties ? $array_properties['message_ceo'] : '') !!}
                                            </select>
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div> 
                            </div>
                            <div id="tab14_4" class="tab-pane">
                                <div class="col-md-12 mb20">
                                    <h4> 
                                        Config service category for service page.
                                    </h4>
                                </div>      
                                
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('web_service', 'Block Web service', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            {!! Form::select('web_service', ['1' => 'Web services', '2' => 'Smartphone Applications', '3' => 'Enterprise Services', '4' => 'Internal Services'], $array_properties ? $array_properties['web_service'] : '') !!}
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('application', 'Block Smartphone Applications', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            {!! Form::select('application', ['1' => 'Web services', '2' => 'Smartphone Applications', '3' => 'Enterprise Services', '4' => 'Internal Services'], $array_properties ? $array_properties['application'] : '') !!}
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('enterprise', 'Block Enterprise Services', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            {!! Form::select('enterprise', ['1' => 'Web services', '2' => 'Smartphone Applications', '3' => 'Enterprise Services', '4' => 'Internal Services'], $array_properties ? $array_properties['enterprise'] : '') !!}
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb20">
                                    <div class="col-md-3">
                                        {!! Form::label('internal', 'Internal Services', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="name1" class="select">
                                            {!! Form::select('internal', ['1' => 'Web services', '2' => 'Smartphone Applications', '3' => 'Enterprise Services', '4' => 'Internal Services'], $array_properties ? $array_properties['internal'] : '') !!}
                                            <i class="arrow"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab-pane">
                    <div class="col-md-10 ph30">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">SMTP Server</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-globe"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="SMTP Server" name="smtp_server" value="{{$array_properties ? $array_properties['smtp_server'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">SMTP Port</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-export"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="SMTP Port" name="smtp_port" value="{{$array_properties ? $array_properties['smtp_port'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">SMTP Username</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="SMTP Username" name="smtp_username" value="{{$array_properties ? $array_properties['smtp_username'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">SMTP Password</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="SMTP Password" name="smtp_password" value="{{$array_properties ? $array_properties['smtp_password'] : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email received</label>
                            <div class="bs-component">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </span>
                                    <input class="form-control" type="text" placeholder="Email received" name="email_received" value="{{$array_properties ? $array_properties['email_received'] : ''}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            {!! Form::hidden('config_id', $config_id) !!}
            <button class="button btn-primary btn btn-sm" type="submit"> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection
