@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Services :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/groupuser">{{ trans('cpanel.group_user')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/groupuser/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> {{ trans('cpanel.add_group')}} </span>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                <div>
                    <div class="section row mb5">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            {!! Form::label('name', 'Group name', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field">
                                    {!! Form::text("name", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                    </label>
                                </label>                                
                            </div>
                        </div>
                    </div>
                    <div class="section row mb5">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            {!! Form::label('route_key', 'Key route', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field">
                                    {!! Form::text("route_key", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                    </label>
                                </label>                                
                            </div>
                        </div>
                    </div>
                    <div class="section row mb5">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            {!! Form::label('route_key', 'Key route', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field">
                                    {!! Form::text("route_key", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                    </label>
                                </label>                                
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> {{ trans('cpanel.save')}} </button>
            <button class="button btn-danger btn btn-sm" type="reset"> {{ trans('cpanel.cancel')}} </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection

