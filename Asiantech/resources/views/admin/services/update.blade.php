@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Services :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/service">Manage service</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/service/update'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate2', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> Update Service </span>
            <ul class="nav panel-tabs-border panel-tabs">

            @if (count($languages) > 0)
                <?php $i = 1; ?>
                @foreach ($languages->all() as $language)
                <li {!! $i == 1 ? 'class="active"' : '' !!}>
                    <a href="#tab_{!! $i !!}" data-toggle="tab">{!! $language->language_name !!}</a>
                </li>
                <?php ++$i; ?>
                @endforeach
            @else
                <li class="active">
                    <a href="#tab1" data-toggle="tab">Language default</a>
                </li>
            @endif  
            
            </ul>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                @if (count($languages) > 0)
                    <?php $i = 1; ?>
                    @foreach ($languages->all() as $language)
                    <?php
                        $info_service = $service_details->where('service_id', '=', $service_id)
                                                   ->where('language_code', '=', $language->code)
                                                   ->first();
                    ?>
                    <div id="tab_{!! $i !!}" class="tab-pane {!! $i == 1 ? 'active' : '' !!}">

                        <div class="section row">
                            <div class="col-md-12 mt10">
                                {!! Form::label('service_name', 'Service name', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field">
                                    {!! Form::text("service_name[".$language->code."]", $info_service->service_name, array('class' => 'form-control', 'required')) !!}
                                </label>                                
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('description', 'Short description', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field">
                                    {!! Form::textarea("description[".$language->code."]", $info_service->description, array('class' => 'gui-textarea br-light bg-light')) !!}
                                </label>
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('content', 'Content of service', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field">
                                    {!! Form::textarea("content[".$language->code."]", $info_service->content, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Post contents')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php ++$i; ?>
                    @endforeach
                @else
                    <div id="tab1" class="tab-pane active">

                        <div class="section row">
                            <div class="col-md-12 mt10">
                                {!! Form::label('page_title', 'Page title', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field prepend-icon">
                                    {!! Form::text("page_title[]", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>                                
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('page_contents', 'Page contents', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("page_contents[]", null, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Page contents')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
                    <div>
                        <div class="section row mb5">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    {!! Form::label('service_type', 'Service type', array('class' => 'form-control-static text-muted')) !!}
                                </div>
                                <div class="col-xs-6">
                                    <label for="name1" class="select">
                                        {!! Form::select('service_type', ['1' => 'Web services', '2' => 'Smartphone Applications', '3' => 'Enterprise Services', '4' => 'Internal Services'], $info_Service->properties) !!}
                                        <i class="arrow"></i>
                                    </label>
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="col-md-12">
                                {!! Form::label('service_url', 'Service url', array('class' => 'form-control-static text-muted')) !!}
                                </div>
                                <div class="col-md-6">
                                    <label for="firstname" class="field">
                                        {!! Form::text("service_url", $info_Service->service_url, array('class' => 'form-control')) !!}
                                        <label class="field-icon" for="name2">
                                        </label>
                                    </label>                                
                                </div>
                            </div>
                            <div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                    {!! Form::label('app_url_ios', 'App url ios', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label for="firstname" class="field prepend-icon">
                                            {!! Form::text("app_url_ios", $info_Service->app_url_ios, array('class' => 'form-control')) !!}
                                            <label class="field-icon" for="name2">
                                                <i class="fa fa-apple"></i>
                                            </label>
                                        </label>                                
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                    {!! Form::label('app_url_android', 'App url android', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label for="firstname" class="field prepend-icon">
                                            {!! Form::text("app_url_android", $info_Service->app_url_android, array('class' => 'form-control')) !!}
                                            <label class="field-icon" for="name2">
                                                <i class="fa fa-android"></i>
                                            </label>
                                        </label>                                
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                    {!! Form::label('app_url_windows', 'App url windows', array('class' => 'form-control-static text-muted')) !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label for="firstname" class="field prepend-icon">
                                            {!! Form::text("app_url_windows", $info_Service->app_url_windows, array('class' => 'form-control')) !!}
                                            <label class="field-icon" for="name2">
                                                <i class="fa fa-windows"></i>
                                            </label>
                                        </label>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>         
            </div>
            <div class="col-md-12 mt25">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">
                        <span class="fa fa-picture-o"></span> List feauture images </span>
                    </div>
                    <div class="panel-body">
                        <div class="row feauture_image">
                            <a class="button btn-alert btn btn-sm ml10 mb10" id="file_input" data-jfiler-name="feauture_image" data-jfiler-extensions="jpg, jpeg, png, gif"> Add image </a>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">
                        <span class="fa fa-picture-o"></span> Service gallery </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <a class="button btn-alert btn btn-sm ml10 mb10" id="file_input2" data-jfiler-name="gallery" data-jfiler-extensions="jpg, jpeg, png, gif"> Add image </a>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <div class="panel-footer text-right">
            {!! Form::hidden('service_id', $service_id) !!}
            <button class="button btn-primary btn btn-sm" type="submit"> Save </button>
            <button class="button btn-danger btn btn-sm" type="reset"> Cancel </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection
