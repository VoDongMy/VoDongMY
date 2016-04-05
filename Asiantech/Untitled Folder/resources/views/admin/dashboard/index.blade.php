@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Dashboard :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li class="active">
                <a href="/cpanel/dashboard">{{ trans('cpanel.dashboard')}}</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- dashboard tiles -->
<section id="content">
	<!-- dashboard tiles -->
	<div class="row">
		<div class="col-sm-3 col-xl-3">
			<div class="panel panel-tile text-center br-a br-grey">
				<div class="panel-body">
					<h1 class="fs30 mt5 mbn">{{186}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/staticpage">{{ trans('cpanel.static_pages')}}</a></span>
				</div>
		  </div>
		</div>
		<div class="col-sm-3 col-xl-3">
			<div class="panel panel-tile text-center br-a br-grey">
				<div class="panel-body">
					<h1 class="fs30 mt5 mbn">{{12}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/service">{{ trans('cpanel.services')}}</a></span>
				</div>
		  </div>
		</div>	
		<div class="col-sm-3 col-xl-3">
			<div class="panel panel-tile text-center br-a br-grey">
				<div class="panel-body">
					<h1 class="fs30 mt5 mbn">{{219}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/member">{{ trans('cpanel.members')}}</a></span>
				</div>
		  </div>
		</div>
		<div class="col-sm-3 col-xl-3">
			<div class="panel panel-tile text-center br-a br-grey">
				<div class="panel-body">
					<h1 class="fs30 mt5 mbn">{{36}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/contact">{{ trans('cpanel.contacts')}}</a></span>
				</div>
		  </div>
		</div>	
	</div>
</section>
<!-- End: .admin-panels -->
@endsection