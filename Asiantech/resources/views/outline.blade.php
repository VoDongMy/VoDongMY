@extends('layouts.master')
@section('title') Company Profile  :: @parent @stop
@section('content')
<main>
    <div class="outline">
        <div class="outline_container x_scrollFadeIn">
            <div class="outline_row">
                <div class="headline arrow_up">
                    <p class="text_company">{{ trans('outline.company') }}</p>
                    <p class="text_profile">Profile</p>
                </div>
                <div class="outline_profile">
                    <div class="content_left">
                        <i class="icons_message">&nbsp;</i>
                        <h3 class="caption">{{ trans('outline.profile') }}</h3>
                        <ul class="item">
                            <li>{{ trans('outline.company_name') }}</li>
                            <li>{{ trans('outline.date_of_foundation') }}</li>
                            <li>{{ trans('outline.capital') }}</li>
                            <li class="space">{{ trans('outline.location') }}</li>
                            <li>{{ trans('outline.no_employees') }}</li>
                            <li>URL</li>
                        </ul>
                        <ul class="descript">
                            <li>{{ trans('outline.asian_tech_inc') }}</li>
                            <li>{{ trans('outline.day') }}</li>
                            <li>25,000,000 JPY</li>
                            <li class="space_line">{{ trans('outline.address') }}</li>
                            <li>{{ trans('outline.no_employees_value') }}</li>
                            <li><a href="http://asiantech.vn">www.asiantech.vn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="outline_profile">
                    <div class="img">
                        <img src="{{ asset('assets/images/thumbs/content_1.png') }}" class="img">
                    </div>
                </div>
            </div>
        </div>
        <!-- end content1 -->
        <div class="outline_container2 x_scrollFadeIn">
            <div id="map"></div>
        </div>
        <!-- end content 2 -->
        <div class="outline_container">
            <ul class="photo_row_1 x_scrollFadeIn">
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_1.png') }}">
                    </figure>
                </li>
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_2.png') }}">
                    </figure>
                </li>
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_3.png') }}">
                    </figure>
                </li>
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_4.png') }}">
                    </figure>
                </li>
            </ul>
            <ul class="photo_row_2 x_scrollFadeIn">
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_5.png') }}">
                    </figure>
                </li>
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_6.png') }}">
                    </figure>
                </li>
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_7.png') }}">
                    </figure>
                </li>
                <li class="hover">
                    <figure>
                        <img src="{{ asset('assets/images/thumbs/img_8.png') }}">
                    </figure>
                </li>
            </ul>
        </div>
    </div>
</main>
@stop