@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Dashboard :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li class="active">
                <a href="/cpanel/dashboard">Dashboard</a>
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
				<div class="panel-body bg-success light">
					<h1 class="fs30 mt5 mbn">{{$static_page}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/staticpage">STATIC PAGES</a></span>
				</div>
		  </div>
		</div>
		<div class="col-sm-3 col-xl-3">
			<div class="panel panel-tile text-center br-a br-grey">
				<div class="panel-body bg-primary dark">
					<h1 class="fs30 mt5 mbn">{{$services}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/service">SERVICES</a></span>
				</div>
		  </div>
		</div>	
		<div class="col-sm-3 col-xl-3">
			<div class="panel panel-tile text-center br-a br-grey">
				<div class="panel-body bg-warning dark">
					<h1 class="fs30 mt5 mbn">{{$members}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/member">MEMBERS</a></span>
				</div>
		  </div>
		</div>
		<div class="col-sm-3 col-xl-3">
			<div class="panel panel-tile text-center br-a br-grey">
				<div class="panel-body bg-alert light">
					<h1 class="fs30 mt5 mbn">{{$contacts}}</h1>
				</div>
				<div class="panel-footer br-t p12">
					<span class="fs11"><a href="/cpanel/contact">CONTACTS</a></span>
				</div>
		  </div>
		</div>	
	</div>
</section>
<!-- End: .admin-panels -->
@endsection
