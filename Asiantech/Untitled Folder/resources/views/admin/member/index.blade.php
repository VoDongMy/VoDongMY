@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Member :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/member">{{ trans('cpanel.manage_member')}}</a>
            </li>
        </ul>
    </div>
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/member/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> {{ trans('cpanel.new_member')}}</a>
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
                        <span class="glyphicon glyphicon-tasks"></span>{{ trans('cpanel.list_member')}}
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">{{ trans('cpanel.no')}}</th>
                                <th width="18%">{{ trans('cpanel.avatar')}}</th>
                                <th>{{ trans('cpanel.avatar')}}</th>
                                <th width="18%">{{ trans('cpanel.action')}}</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            @if($list_member)
                                <?php $i = 1; ?>
                                @foreach($list_member as $member)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img alt="" class="media-object thumbnail mw100" src="{{ config('custom.path_view_member').$member->avatar }}"></td>
                                    <td>{{ $member->fullname }}</td>
                                    <td width="18%">
                                        <a class="button btn-alert btn btn-xs" href="/cpanel/member/{{ $member->id }}/update"> {{ trans('cpanel.update')}} </a>
                                        <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/member/{{ $member->id }}/delete')"> {{ trans('cpanel.update')}} </a>
                                    </td>
                                </tr>
                                <?php ++$i; ?>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">{{ trans('cpanel.no_data')}}</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot class="footer-menu">
                             <tr>
                                <th colspan="4">
                                <nav class="text-right">
                                    {!! $list_member->render() !!}
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
