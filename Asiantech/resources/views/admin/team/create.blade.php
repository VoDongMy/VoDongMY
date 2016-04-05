@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Teams :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/team">Manage team</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray-center">
{!! Form::open(array('url' => URL::to('cpanel/team/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate2', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> Add team</span>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                <div>
                    <div class="section row mb5">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            {!! Form::label('team_name', 'Team name', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field">
                                    {!! Form::text("team_name", '', array('class' => 'form-control', 'required')) !!}
                                </label>                                
                            </div>
                        </div>
                        <div class="col-md-12 mb20">
                            <div class="col-md-12">
                            {!! Form::label('description', 'Description', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12">
                                <label for="firstname" class="field">
                                    {!! Form::textarea('description', '', array('class' => 'gui-textarea br-light bg-light')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">
                        <span class="fa fa-picture-o"></span> Image gallery </span>
                    </div>
                    <div class="panel-body">
                        <div class="row feauture_image">
                            <a class="button btn-alert btn btn-sm ml10 mb10" id="file_input" data-jfiler-name="images" data-jfiler-extensions="jpg, jpeg, png, gif"> Add image </a>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> Save </button>
            <button class="button btn-danger btn btn-sm" type="reset"> Cancel </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection

