@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Change password :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="#">User setting</a>
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
            <div class="panel panel-widget newsletter-widget">
                <div class="panel-heading">
                    <span class="panel-title"> Notification</span>
                </div>
                <div class="panel-body bg-light dark pb25">
                    <p class="mb15">Your password has been change success.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->            
@endsection
