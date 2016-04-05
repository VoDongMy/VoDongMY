@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Group user :: @parent @stop
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
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/groupuser/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> {{ trans('cpanel.new_group')}}</a>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray tray-center">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>{{ trans('cpanel.list_group')}}
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">{{ trans('cpanel.no')}}</th>
                                <th width="10%">{{ trans('cpanel.group_name')}}</th>
                                <th>{{ trans('cpanel.description')}}</th>
                                <th width="8%">{{ trans('cpanel.action')}}</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            
                            <tr>
                                <td colspan="4">{{ trans('cpanel.no_data')}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->
@endsection
