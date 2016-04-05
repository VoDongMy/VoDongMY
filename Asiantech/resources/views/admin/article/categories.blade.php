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
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/category/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> New categories</a>
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
                        <span class="glyphicon glyphicon-tasks"></span>List categories
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Parent</th>
                                <th>Name</th>
                                <th>Is active</th>
                                <th width="18%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($listcategories) > 0)
                            <?php $i = 1; ?>
                            @foreach($listcategories as $category)
                                <?php
                                    $parent_id = $category->parent_id;
                                    $parentCategory = $CategoryDatas->where('category_blogs_id', $parent_id)->first();
                                    if ($parentCategory) {
                                        $parentName = $parentCategory->category_name;
                                    } else {
                                        $parentName = 'N/A';
                                    }
                                ?>
                                @foreach($category->CategoryData as $categorydata)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $parentName !!}</td>
                                        <td>{!! $categorydata->category_name !!}</td>
                                        <td>{!! $category->is_active == 1 ? 'Yes' : 'No' !!}</td>
                                        <td>
                                            <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/category/{{ $category->id }}/delete')"> Delete </a>
                                            <a class="button btn-alert btn btn-xs" href="/cpanel/category/{{ $category->id }}/update"> Update </a>
                                            @if($category->is_active == 1)
                                            <a class="button btn-warning btn btn-xs" href="/cpanel/category/{{ $category->id }}/disable"> Disable </a>
                                            @else
                                            <a class="button btn-success btn btn-xs" href="/cpanel/category/{{ $category->id }}/active"> Active </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php ++$i; ?> 
                                @endforeach                                    
                            @endforeach
                        @else
                            <tr>
                            <td colspan="5">No data</td>
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
