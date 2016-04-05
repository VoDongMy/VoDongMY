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
                <a href="/cpanel/timeline">Manage timeline</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/timeline/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate2', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> Add New</span>
            <ul class="nav panel-tabs-border panel-tabs">

            @if (count($languages) > 0)
                <?php $i = 1; ?>
                @foreach ($languages->all() as $language)
                <li {!! $i == 1 ? 'class="active"' : '' !!}>
                    <a href="#tab_{!! $i !!}" data-toggle="tab">{!! $language->language_name !!}</a>
                </li>
                <?php ++$i; ?>
                @endforeach
            @else
                <li class="active">
                    <a href="#tab1" data-toggle="tab">Language default</a>
                </li>
            @endif  
            
            </ul>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                <div class="form-group mt10">
                    {!! Form::label('time_sheet', 'Date', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-3">
                        <label for="time_sheet" class="field">
                            {!! Form::text("time_sheet", '', array('class' => 'form-control datetimepicker', 'required')) !!}
                        </label>
                    </div>
                </div>

                @if (count($languages) > 0)
                    <?php $i = 1; ?>
                    @foreach ($languages->all() as $language)
                    <div id="tab_{!! $i !!}" class="tab-pane {!! $i == 1 ? 'active' : '' !!}">
                        <div class="form-group mt10">
                            <label class="col-md-3 control-label" for="datetimepicker1">Content</label>
                            <div class="col-md-8">
                                <label for="content" class="field">
                                    {!! Form::textarea("content[".$language->code."]", null, array('class' => 'gui-textarea br-light bg-light', 'required')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php ++$i; ?>
                    @endforeach
                @else
                    <div id="tab_{!! $i !!}" class="tab-pane {!! $i == 1 ? 'active' : '' !!}">
                        <div class="form-group mt10">
                            <label class="col-md-3 control-label" for="datetimepicker1">Content</label>
                            <div class="col-md-8">
                                {!! Form::textarea("content[]", null, array('class' => 'gui-textarea br-light bg-light ')) !!}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> Save </button>
            <button class="button btn-danger btn btn-sm" type="reset"> Cancel </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection
