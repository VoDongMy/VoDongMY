@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Timeline :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/timeline">Timeline</a>
            </li>
        </ul>
    </div>
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/timeline/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> New </a>
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
            {!! Form::open(array('url' => URL::to('cpanel/timeline/order'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
            <div class="panel panel-visible" id="spy1">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>List
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="4%">No.</th>
                                <th width="10%">Time</th>
                                <th>Description</th>
                                <th width="8%">Order</th>
                                <th width="8%">Action</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            @if (count($list_timeline) > 0)
                                <?php $i = 1; ?>
                                @foreach($list_timeline as $timeline)
                                    <?php
                                        $timeline_id = $timeline->id;
                                    ?>
                                    @foreach($timeline->timelineDetails as $info_timeline)
                                        <tr>
                                            <td class="text-center">{!! $i !!}</td>
                                            <td>{!! $timeline->time_sheet !!}</td>
                                            <td>{!! $info_timeline->content !!}</td>
                                            <td>
                                                <input class="form-control input-sm" type="text" value="{!! $timeline->order !!}" name="order[{{ $timeline_id }}]">
                                            </td>
                                            <td>
                                                <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/timeline/{{ $timeline_id }}/delete')"> Delete </a>
                                            </td>
                                        </tr>
                                        <?php ++$i; ?> 
                                    @endforeach                                    
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6">No data</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                             <tr>
                                <th colspan="3"></th>
                                <th colspan="2" class="text-right"><button title="" class="btn btn-success btn-sm fs12" type="submit" id="updateOrder">Update order</button></th>
                            </tr>                           
                        </tfoot>
                    </table>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- end: .tray-center -->
@endsection
