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
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/team/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> New team</a>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->
<div class="tray-center">
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
            <div class="panel panel-visible mb40" id="spy1">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List teams
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="18%">Avatar</th>
                                <th>Team name</th>
                                <th>Description</th>
                                <th width="18%">Action</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            @if($list_teams)
                                <?php $i = 1; ?>
                                @foreach($list_teams as $info_team)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img alt="" class="media-object thumbnail mw200" src="{{ $team->getAvatar($info_team->id) }}"></td>
                                    <td>{{ $info_team->team_name }}</td>
                                    <td>{{ $info_team->description }}</td>
                                    <td width="18%">
                                        <a class="button btn-alert btn btn-xs" href="/cpanel/team/{{ $info_team->id }}/update"> Update </a>
                                        <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/team/{{ $info_team->id }}/delete')"> Delete </a>
                                    </td>
                                </tr>  
                                <?php ++$i; ?>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="4">No data</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot class="footer-menu">
                             <tr>
                                <th colspan="5">
                                <nav class="text-right">
                                    {!! $list_teams->render() !!}
                                </nav>
                                </th>
                            </tr>                           
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->            
@endsection
