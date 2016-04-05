@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Update post :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/post">Posts</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/post/update'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> Update Post</span>
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
                    <a href="#tab1" data-toggle="tab">language default</a>
                </li>
            @endif  
            
            </ul>
        </div>
        <div class="panel-body p20 pb10">
            <div class="tab-content pn br-n admin-form">
                @if (count($languages) > 0)
                    <?php $i = 1; ?>
                    @foreach ($languages->all() as $language)
                    <?php
                        $info_post_data = $post_data->where('post_id', '=', $post_id)
                                                   ->where('language_code', '=', $language->code)
                                                   ->first();
                    ?>
                    <div id="tab_{!! $i !!}" class="tab-pane {!! $i == 1 ? 'active' : '' !!}">

                        <div class="section row">
                            <div class="col-md-12 mt10">
                                {!! Form::label('post_title', 'Post title', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field prepend-icon">
                                    {!! Form::text("post_title[".$language->code."]", $info_post_data->post_title, array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>                                
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('post_descriptions', 'Post Description', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("post_descriptions[".$language->code."]", $info_post_data->post_descriptions, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Post Description')) !!}
                                </label>
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('post_contents', 'Post contents', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("post_contents[".$language->code."]", $info_post_data->post_contents, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Post contents')) !!}
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
                                {!! Form::label('post_title', 'Post title', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field prepend-icon">
                                    {!! Form::text("post_title[]", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>                                
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('post_descriptions', 'Post Description', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("post_descriptions[]", null, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Post Description')) !!}
                                </label>
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('post_contents', 'Post contents', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("post_contents[]", null, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Post contents')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
                    <div>
                        <div class="section row mb5">
                            <div class="col-md-6">
                                <label for="states" class="field select">
                                    <select id="category_id" name="category_id">
                                        <option value="">Select category</option> 
                                        {!! $select_category !!}
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <div class="section hidden-xs">
                                    <label class="field prepend-icon file">
                                        <span class="button">Choose File</span>
                                        {!! Form::file('feauture_image', array('class' => 'gui-file', 'onChange' => "document.getElementById('uploader').value = this.value;")) !!}
                                        {!! Form::text("uploader", '', array('class' => 'gui-input', 'id' => 'uploader', 'placeholder' => 'Select feauture image')) !!}
                                        <label class="field-icon">
                                            <i class="fa fa-upload"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>              
            </div>
        </div>
        <div class="panel-footer text-right">
            {!! Form::hidden('post_id', $post_id) !!}
            <button class="button btn-primary btn btn-sm" type="submit"> Update </button>
            <button class="button btn-danger btn btn-sm" type="reset"> Cancel </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection
