@extends('layouts.master')
@foreach($info_service->serviceDetails as $info)
@section('title') {{$info->service_name}} :: @parent @stop
@endforeach
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
                <p class="client">PROJECT :</p>
                <p class="post_title">{{ $info->service_name }}</p>
                <p class="horizontal"><img src="{{ asset('assets/images/thumbs/horizontal_line.png') }}" /></p>
                <p class="post_des">{{ $info->content }}</p>
                <p class="post_intro">{{ $info->description }}</p>
                <p class="url">
                    @if($info_service->service_url)
                    <?php
                    $url = $info_service->service_url;
                    if (!preg_match('~^(?:f|ht)tps?://~i', $url)) {
                        $url = 'http://'.$url;
                    }
                    ?>
                    <a href="{{ $url }}" target="_blank">{{ $info_service->service_url }}</a>
                    @endif
                    @if($info_service->app_url_android)
                    <a href="{{ $info_service->app_url_android }}" target="_blank"><i class="icons_icon2">&nbsp;</i></a>
                    @endif
                    @if($info_service->app_url_ios)
                    <a href="{{ $info_service->app_url_ios }}" target="_blank"><i class="icons_icon1">&nbsp;</i></a>
                    @endif
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
            <ul>
            @foreach($array_gallery as $images)
                <li><img src="{{ config('custom.path_view_gallery_service').$images->name }}" alt="barneys1" class="barneys1 x_scrollFadeIn" /></li>
            @endforeach
            </ul>
        </div>
        @endif
        <p class="back_application">
            <br>
            <br> <a href="{{ URL::previous() }}">{{ trans('service_subpage.back') }}</a></p>
    </div>
    @endif
</main>
@stop