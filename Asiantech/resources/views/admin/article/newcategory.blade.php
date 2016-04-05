@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Category :: @parent @stop
@section('topbar')
<!-- Start: Topbar -->
<header id="topbar" class="ph10">
    <div class="topbar-left">
        <ul class="nav nav-list nav-list-topbar pull-left">
            <li>
                <a href="/cpanel/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <a href="/cpanel/category">Category</a>
            </li>
        </ul>
    </div>
</header>
<!-- End: Topbar -->
@endsection
@section('content')
<!-- begin: .tray-center -->

<div class="tray tray-center">
{!! Form::open(array('url' => URL::to('cpanel/category/create'), 'method' => 'post', 'files'=> true, 'class' => 'form-horizontal', 'role' => 'form')) !!}
    <!-- create new order panel -->
    <div class="panel mb50 mt5">
        <div class="panel-heading">
            <span class="panel-title hidden-xs"> Add New Category</span>
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
                                {!! Form::label('category_name', 'Category name', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="firstname" class="field prepend-icon">
                                    {!! Form::text("category_name[".$language->code."]", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>                                
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('category_content', 'Category Description', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt5">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("category_content[".$language->code."]", null, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Category Description')) !!}
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
                                {!! Form::label('category_name', 'Category name', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-6">
                                <label for="category_name" class="field prepend-icon">
                                    {!! Form::text("category_name[]", '', array('class' => 'form-control')) !!}
                                    <label class="field-icon" for="name2">
                                        <i class="fa fa-tag"></i>
                                    </label>
                                </label>
                            </div>
                            <div class="col-md-12 mt10">
                                {!! Form::label('category_content', 'Category Description', array('class' => 'form-control-static text-muted')) !!}
                            </div>
                            <div class="col-md-12 mt25">
                                <label class="field prepend-icon">
                                    {!! Form::textarea("category_content[]", null, array('class' => 'gui-textarea br-light bg-light summernote', 'placeholder' => 'Category Description')) !!}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
                    <div>
                        <div class="section row mb5">
                            <div class="col-md-6">
                                <label for="states" class="field select">
                                    <select id="parent_id" name="parent_id">
                                        <option value="">Select parent category</option> 
                                        @if (count($listcategories) > 0)
                                            @foreach($listcategories as $category)
                                                @foreach($category->CategoryData as $categorydata)                                                
                                                <option value="{!! $category->id !!}">{!! $categorydata->category_name !!}</option> 
                                                @endforeach
                                            @endforeach
                                        @endif
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
            <button class="button btn-primary btn btn-sm" type="submit"> Add </button>
            <button class="button btn-danger btn btn-sm" type="reset"> Cancel </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- end: .tray-center -->            
@endsection
