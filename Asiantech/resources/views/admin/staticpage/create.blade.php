@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') New page :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/staticpage">Static pages</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray-center">
{!! Form::open(array('url' => URL::to('cpanel/staticpage/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal form-validate2', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> Add New Page</span>
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
                @if (count($languages) > 0)
                    <?php $i = 1; ?>
                    @foreach ($languages->all() as $language)

                    <div id="tab_{!! $i !!}" class="tab-pane {!! $i == 1 ? 'active' : '' !!}">

                        <div class="section row">
                            <div class="col-md-12 mt10">
                                {!! Form::label('page_title', 'Page title', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field">
                                    {!! Form::text("page_title[".$language->code."]", '', array('class' => 'form-control', 'required')) !!}
                                </label>
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('page_contents', 'Page contents', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("page_contents[".$language->code."]", null, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Post contents')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php ++$i; ?>
                    @endforeach
                @else
                    <div id="tab1" class="tab-pane active">

                        <div class="section row">
                            <div class="col-md-12 mt10">
                                {!! Form::label('page_title', 'Page title', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field prepend-icon">
                                    {!! Form::text("page_title[]", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('page_contents', 'Page contents', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("page_contents[]", null, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Page contents')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
                <div>
                    <div class="section row mb5">
                        <div class="col-md-12 mt10">
                            {!! Form::label('properties', 'Select block for display', array('class' => 'form-control-static text-muted')) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="states" class="field select">
                                <select name="properties">
                                    {!! $option_template !!}
                                </select>
                                <i class="arrow"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="button btn-primary btn btn-sm" type="submit"> Add </button>
            <button class="button btn-danger btn btn-sm" type="reset"> Cancel </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->
@endsection
<!--Validate-->
<script type="text/javascript">
jQuery(document).ready(function() {

});
</script>