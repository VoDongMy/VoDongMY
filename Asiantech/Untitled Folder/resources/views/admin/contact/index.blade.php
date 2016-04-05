@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Contact :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
            <li class="active">
                <a href="/cpanel/contact">{{ trans('cpanel.manage_message')}}</a>
            </li>
        </ul>
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
                        <span class="glyphicon glyphicon-tasks"></span>{{ trans('cpanel.list_contact')}}
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%">{{ trans('cpanel.no')}}</th>
                                <th>{{ trans('cpanel.from_name')}}</th>
                                <th>{{ trans('cpanel.email')}}</th>
                                <th width="15%">{{ trans('cpanel.date_submit')}}</th>
                                <th width="12%">{{ trans('cpanel.action')}}</th>
                            </tr>
                        </thead> 
                        <tbody> 
                            @if($list_contact)
                                <?php $i = 1; ?>
                                @foreach($list_contact as $contact)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                    <td>
                                        <a class="button btn-info btn btn-xs" href="/cpanel/contact/{{ $contact->id }}/show"> {{ trans('cpanel.view')}} </a>
                                        <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/contact/{{ $contact->id }}/delete')"> {{ trans('cpanel.delete')}} </a>
                                    </td>
                                </tr>  
                                <?php $i++; ?>
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
