@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Group user :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/groupuser">Group user</a>
            </li>
        </ul>
    </div>
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/groupuser/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> New group</a>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray tray-center">
    <div class="row">
        <div class="col-md-12">
            @if (session('status') == 'success')
            <div class="alert alert-micro alert-border-left alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check pr10"></i>
                <strong>{{session('msg')}}</strong>
            </div>
            @endif            
            @if (session('status') == 'fail')
            <div class="alert alert-sm alert-border-left alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-info pr10"></i>
                <strong>Error!</strong> {{session('msg')}}
            </div>
            @endif
            <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List group
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">No.</th>
                                <th width="17%">Group name</th>
                                <th>Description</th>
                                <th width="13%">Action</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            @if($roles)
                                <?php
                                $i = 1;
                                ?>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><a href="/cpanel/groupuser/{{ $role->id }}/update" >{{ $role->role_title }}</a></td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <a class="button btn-alert btn btn-xs" href="/cpanel/groupuser/{{ $role->id }}/update"> Update </a>
                                        <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/groupuser/{{ $role->id }}/delete')"> Delete </a>
                                    </td>
                                </tr>
                                <?php
                                ++$i;
                                ?>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->
@endsection
