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
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/service/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> New service </a>
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
            <div class="panel panel-visible mb50" id="spy1">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List service
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover footable footable-loaded" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Service type</th>
                                <th>Service name</th>
                                <th>Is Active</th>
                                <th>Date created</th>
                                <th width="18%">Action</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            @if (count($list_services) > 0)
                                <?php $i = 1; ?>
                                @foreach($list_services as $service)
                                    <?php
                                        $service_id = $service->id;
                                    ?>
                                    @foreach($service->serviceDetails as $info_service)
                                        <tr>
                                            <td>{!! $i !!}</td>
                                            <td>
                                            @if($service->properties == 1)
                                                Web Services
                                            @elseif($service->properties == 2)
                                                Smartphone Applications
                                            @elseif($service->properties == 3)
                                                Enterprise Services
                                            @elseif($service->properties == 4)
                                                Internal Services
                                            @else
                                                N/A
                                            @endif
                                            </td>
                                            <td>{!! $info_service->service_name !!}</td>
                                            <td>{!! $service->is_active == 1 ? 'Yes' : 'No' !!}</td>
                                            <td>{!! $info_service->created_at !!}</td>
                                            <td>
                                                <a class="button btn-alert btn btn-xs" href="/cpanel/service/{{ $service_id }}/update"> Update </a>
                                                @if($service->is_active == 1)
                                                <a class="button btn-warning btn btn-xs" href="/cpanel/service/{{ $service_id }}/disable"> Disable </a>
                                                @else
                                                <a class="button btn-success btn btn-xs" href="/cpanel/service/{{ $service_id }}/active"> Active </a>
                                                @endif
                                                <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/service/{{ $service_id }}/delete')"> Delete </a>
                                            </td>
                                        </tr>
                                        <?php ++$i; ?> 
                                    @endforeach                                    
                                @endforeach
                            @else
                            <tr>
                                <td colspan="5">No data</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot class="footer-menu">
                             <tr>
                                <th colspan="6">
                                <nav class="text-right">
                                    {!! $list_services->render() !!}
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
