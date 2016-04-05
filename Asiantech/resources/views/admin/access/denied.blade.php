@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Access denied :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
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
            <div class="alert alert-micro alert-border-left alert-danger alert-dismissable">
                <i class="fa fa-trophy pr10"></i>
                <strong>Access denied!</strong> You do not have permissions to access this page. If you think you should have access contact an administrator.
            </div>
        </div>
    </div>
</div>
<!-- end: .tray-center -->
@endsection
