@extends('layouts.master')
@section('content')
<main>
    @if($info_service)
    <div class="service_subpage">
        <div class="post x_scrollFadeIn">
            <?php
            // Get list gallery
            $list_feauture_image = $service->getListImage($info_service->id, 'feauture_image');
            $array_feauture_image = json_decode($list_feauture_image);
            ?>
            <div class="post_image">
                @if($list_feauture_image)
                <img src="{{ config('custom.path_view_service').$array_feauture_image[0]->name }}" class="post_img" />
                @endif
            </div>
            @foreach($info_service->serviceDetails as $info)
            <div class="post_content">
                <p class="client">CLIENT :</p>
                <p class="post_title">{{ $info->service_name }}</p>
                <p class="horizontal"><img src="{{ asset('assets/images/thumbs/horizontal_line.png') }}" /></p>
                <p class="post_des">{{ $info->content }}</p>
                <p class="post_intro">{{ $info->description }}</p>
                <p class="url">
                    <a href="{{ $info_service->service_url }}" target="_blank">{{ $info_service->service_url }}</a>
                    <a href="{{ $info_service->app_url_android }}"><i class="icons_icon2">&nbsp;</i></a>
                    <a href="{{ $info_service->app_url_ios }}"><i class="icons_icon1">&nbsp;</i></a>
                </p>
            </div>
            @endforeach
        </div>
        <?php
        // Get list gallery
        $list_gallery = $service->getListImage($info_service->id, 'gallery');
        $array_gallery = json_decode($list_gallery);
        ?>
        @if($list_gallery)
        <div class="subpage_images">
            @foreach($array_gallery as $images)
                <img src="{{ config('custom.path_view_gallery_service').$images->name }}" alt="barneys1" class="barneys1 x_scrollFadeIn" />
            @endforeach
        </div>
        @endif
        <p class="back_application">
            <br>
            <br> <a href="{{ URL::previous() }}">{{ trans('service_subpage.back') }}</a></p>
    </div>
    @endif
</main>
@stop