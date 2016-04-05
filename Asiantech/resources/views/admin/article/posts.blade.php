@extends('admin.layouts.model')
{{-- Web site Title --}}
@section('title') Post :: @parent @stop
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
    <div class="topbar-right hidden-xs hidden-sm">
        <a href="/cpanel/post/create" class="btn btn-default btn-sm fw600 ml10">
            <span class="fa fa-plus pr5"></span> New posts</a>
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
                        <span class="glyphicon glyphicon-tasks"></span>List post
                    </div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Is active</th>
                                <th>Date created</th>
                                <th width="18%">Action</th>
                            </tr>
                        </thead> 
                        <tbody>
                        @if (count($list_post) > 0)
                            <?php $i = 1; ?>
                            @foreach($list_post as $post)
                                <?php
                                    $category_id = $post->category_id;
                                    $post_id = $post->id;
                                    // Get name of category via default language
                                    $info_category = $category_data->where('category_blogs_id', '=', $category_id)
                                                                  ->where('language_code', '=', $app_language->getDefaultLanguage())
                                                                  ->first();
                                ?>
                                @foreach($post->PostData as $data_post)
                                    <tr>
                                        <td>{!! $i !!}</td>
                                        <td>{!! $data_post->post_title !!}</td>
                                        <td>{!! $info_category->category_name !!}</td>
                                        <td>{!! $post->is_active == 1 ? 'Yes' : 'No' !!}</td>
                                        <td>{!! $post->created_at !!}</td>
                                        <td>
                                            <a class="button btn-danger btn btn-xs" href="javascript:;" onclick="showConfirm('/cpanel/post/{{ $post_id }}/delete')"> Delete </a>
                                            <a class="button btn-alert btn btn-xs" href="/cpanel/post/{{ $post_id }}/update"> Update </a>
                                            @if($post->is_active == 1)
                                            <a class="button btn-warning btn btn-xs" href="/cpanel/post/{{ $post_id }}/disable"> Disable </a>
                                            @else
                                            <a class="button btn-success btn btn-xs" href="/cpanel/post/{{ $post_id }}/active"> Active </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php ++$i; ?> 
                                @endforeach                                    
                            @endforeach
                        @else
                            <tr>
                            <td colspan="6">No data</td>
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
