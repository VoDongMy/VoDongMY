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
                        <span class="glyphicon glyphicon-tasks"></span>{{ trans('cpanel.details_message')}}
                    </div>
                </div>
                <div class="panel-body">
                    @if($info_message)
                    <!-- view message -->
                    <div class="message-view">
                        <!-- message header -->
                        <div class="message-header">
                            <div class="pull-right mt5 clearfix">
                                <span class="label bg-danger mr10">{{ $info_message->created_at }}</span>
                            </div>
                            <h4 class="mt15 mb5">Name: {{ $info_message->name }}</h4>
                            <small class="text-muted clearfix">Email: {{ $info_message->email }}</small>
                            <small class="text-muted clearfix">Company: {{ $info_message->company }}</small>
                        </div>
                        <hr class="mb15 mt15">
                        <!-- message body -->
                        <div class="message-body">{{ $info_message->comment }}</div>
                        <hr class="mb15 mt15">
                        <!-- message footer -->
                        <!-- <div class="message-footer">
                            <h4 class="mb25">
                                <span class="glyphicon glyphicon-paperclip mr10"></span> 3 Attachments -
                                <small> View Images | Download All</small>
                            </h4>
                            <div class="attachments mb10">
                                <img src="assets/img/stock/1.jpg" class="mw140 mr15">
                                <img src="assets/img/stock/2.jpg" class="responsive mw140 mr15">
                                <img src="assets/img/stock/3.jpg" class="responsive mw140">
                            </div>
                        </div> -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->            
@endsection
