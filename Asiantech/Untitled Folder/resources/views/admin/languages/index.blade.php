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
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/languages/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> New language</a>
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
                        <span class="glyphicon glyphicon-tasks"></span>List Languages
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Is default</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($datas) > 0)
                            <?php $i = 1; ?>
                            @foreach ($datas->all() as $data)
                            <tr>
                                <td>{!! $i !!}</td>
                                <td>{!! $data->code !!}</td>
                                <td>{!! $data->language_name !!}</td>
                                <td>{!! $data->is_default == 1 ? 'Yes' : 'No' !!}</td>
                                <td>
                                    <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/languages/{!! $data->id !!}/delete')"> Delete </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        @else
                            <tr>
                            <td colspan="5">No data</td>
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
