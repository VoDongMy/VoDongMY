@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Languages :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/languages">Languages</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="col-md-12">
    <!-- Input Fields -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Add new language</span>
        </div>
        {!! Form::open(array('url' => URL::to('cpanel/languages/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
        <!-- <form class="form-horizontal" role="form"> -->
            <div class="panel-body">                            
                <div class="form-group">
                    {!! Form::label('lang', 'Select Languages', array('class' => 'col-lg-3 control-label')) !!}
                    <div class="col-lg-8">
                         {!! Form::select('lang', $listLang, '', array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group mb25">
                    {!! Form::label('is_default', 'Default Languages', array('class' => 'col-lg-3 control-label')) !!}
                    <div class="col-md-9">
                        <label class="checkbox-inline mr10">
                            {!! Form::checkbox('is_default', 1) !!}Yes
                        </label>
                    </div>
                </div>            
            </div>
            <div class="panel-footer text-right">
                <button class="button btn-primary btn btn-sm" type="submit"> Add </button>
                <button class="button btn-danger btn btn-sm" type="reset"> Cancel </button>
            </div>
        <!-- </form> -->
        {!! Form::close() !!}
    </div>
</div>
<!-- end: .tray-center -->            
@endsection
