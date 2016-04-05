@extends('layouts.master')
@section('title') Service  :: @parent @stop
@section('content') 
<main>
    <div class="service_page">
        @if($web_smartphone)
        <div class="banner_top">
            <div class="headline x_scrollFadeIn">
                <span class="text">{{ trans('service.services') }}</span>
            </div>
            <div class="service_title x_scrollFadeIn">{{ trans('service.web_smartphone') }}</div>
            <div class="verticle_line x_scrollFadeIn"><img src="{{ asset('assets/images/thumbs/verticle_line.png') }}" class="line_img" /></div>
            <div class="introduce x_scrollFadeIn">{{ trans('service.our_expert') }}</div>
            <div class="skill x_scrollFadeIn">PHP.Ruby,C,C#,C++, Java, Java script,Json, Ajex,JQUERY,HTML,CSS,Pascal,
                <br> Visual Basic, ASP.Net,Angularjs, XML, Linked Servers,
                <br> SSRS Reporting, Bush shell,CSS2,HTML5, CSS3, CSS3 Animation,
                <br> Semantic HTML, Bootstrap 2/3, Retina, SVG, Less, Sass, VB.Net</div>
        </div>
        <ul class="service_list">
        <?php
            $i = 1;
        ?>
        @foreach($web_smartphone as $web_service)
            @foreach($web_service->serviceDetails as $info_service)
            <?php
            $list_feauture_image = '';
            $array_feauture_image = array();
            $list_feauture_image = $service->getListImage($web_service->id, 'feauture_image');
            $path_view = config('custom.path_view_service');
            if (!$list_feauture_image) {
                $list_feauture_image = $service->getListImage($web_service->id, 'gallery');
                $path_view = config('custom.path_view_gallery_service');
            }
            $array_feauture_image = json_decode($list_feauture_image);

            ?>
            <li class="list_item x_scrollFadeIn">
                <a href="{{ URL::to($service->getURL($info_service->service_id, App::getLocale())) }}">
                    <div class="service_image">
                    @if($array_feauture_image)
                    <i class="service_img" style="background-image: url({{ $path_view.$array_feauture_image[0]->name }});">&nbsp;</i>
                    @endif
                    </div>
                    <div class="about ">
                        <p class="service_client"></p>
                        <p class="service_name">{{ $info_service->service_name }}</p>
                        <p class="service_horizontalline"><img src="{{ asset('assets/images/thumbs/horizontal_line.png') }}" class="horizontal_line" alt="" /></p>
                        <p class="service_description">{{ $info_service->description }}</p>
                        <div class="bd">
                            <div class="bdT"></div>
                            <div class="bdB"></div>
                            <div class="bdR"></div>
                            <div class="bdL"></div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        <?php
            ++$i;
        ?>
        @endforeach
        </ul>
        @endif
        @if($applications)
        <div class="application_enterprise application" id="applications">
            <div class="title">{{ trans('service.applications') }}</div>
            <div class="verticle_line"><img src="{{ asset('assets/images/thumbs/verticle_line.png') }}" class="line_img" /></div>
            <div class="introduce">{{ trans('service.we_here') }}</div>
            <div class="skill">C for Chip AVR, Android, Java, C, C++, Matlab,
                <br> Java for android, Scilab, LabView, .Net, MS SQL Server, MySQL, SQLite Swift</div>
        </div>
        <ul class="service_list">
        <?php
            $i = 1;
        ?>
        @foreach($applications as $application)
            @foreach($application->serviceDetails as $info_service)
            <?php
            $list_feauture_image = '';
            $array_feauture_image = array();
            $list_feauture_image = $service->getListImage($application->id, 'feauture_image');
            $path_view = config('custom.path_view_service');
            if (!$list_feauture_image) {
                $list_feauture_image = $service->getListImage($application->id, 'gallery');
                $path_view = config('custom.path_view_gallery_service');
            }
            $array_feauture_image = json_decode($list_feauture_image);

            ?>
            <li class="list_item x_scrollFadeIn">
                <a href="{{ URL::to($service->getURL($info_service->service_id, App::getLocale())) }}">
                    <div class="service_image">
                    @if($array_feauture_image)
                    <i class="service_img" style="background-image: url({{ $path_view.$array_feauture_image[0]->name }});">&nbsp;</i>
                    @endif
                    </div>
                    <div class="about ">
                        <p class="service_client"></p>
                        <p class="service_name">{{ $info_service->service_name }}</p>
                        <p class="service_horizontalline"><img src="{{ asset('assets/images/thumbs/horizontal_line.png') }}" class="horizontal_line" alt="" /></p>
                        <p class="service_description">{{ $info_service->description }}</p>
                        <div class="bd">
                            <div class="bdT"></div>
                            <div class="bdB"></div>
                            <div class="bdR"></div>
                            <div class="bdL"></div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        <?php
            ++$i;
        ?>
        @endforeach
        </ul>
        @endif
        </ul>
        <div class="cl"></div>
        @if($internal_service)
        <div class="internal_services x_scrollFadeIn" id="internal">
            <div class="internal_title">{{ trans('service.internal_services') }}</div>
            <div class="e_commerce">{{ '{ '.trans('service.e_commerce').' }' }}</div>
            <div class="verticle_line"><img src="{{ asset('assets/images/thumbs/verticle_line.png') }}" class="line_img" /></div>
            <div class="introduce">{{ trans('service.at_asianTech') }}</div>
        </div>
        <ul class="service_list">
        <?php
            $i = 1;
        ?>
        @foreach($internal_service as $internal)
            @foreach($internal->serviceDetails as $info_service)
            <?php
            $list_feauture_image = '';
            $array_feauture_image = array();
            $list_feauture_image = $service->getListImage($internal->id, 'feauture_image');
            $path_view = config('custom.path_view_service');
            if (!$list_feauture_image) {
                $list_feauture_image = $service->getListImage($internal->id, 'gallery');
                $path_view = config('custom.path_view_gallery_service');
            }
            $array_feauture_image = json_decode($list_feauture_image);

            ?>
            <li class="list_item x_scrollFadeIn">
                <a href="{{ URL::to($service->getURL($info_service->service_id, App::getLocale())) }}">
                    <div class="service_image">
                    @if($array_feauture_image)
                    <i class="service_img" style="background-image: url({{ $path_view.$array_feauture_image[0]->name }});">&nbsp;</i>
                    @endif
                    </div>
                    <div class="about">
                        <p class="service_client"></p>
                        <p class="service_name">{{ $info_service->service_name }}</p>
                        <p class="service_horizontalline"><img src="{{ asset('assets/images/thumbs/horizontal_line.png') }}" class="horizontal_line" alt="" /></p>
                        <p class="service_description">{{ $info_service->description }}</p>
                        <div class="bd">
                            <div class="bdT"></div>
                            <div class="bdB"></div>
                            <div class="bdR"></div>
                            <div class="bdL"></div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        <?php
            ++$i;
        ?>
        @endforeach
        </ul>
        @endif
        <div class="cl"></div>
        @if($enterprise_service)
        <div class="application_enterprise enterprise x_scrollFadeIn" id="enterprise">
            <div class="title">{{ trans('service.enterprise_services') }}</div>
            <div class="verticle_line"><img src="{{ asset('assets/images/thumbs/verticle_line.png') }}" class="line_img" /></div>
            <div class="introduce">{{ trans('service.for_companies') }}</div>
            <div class="skill">C for Chip AVR, Android, Java, C, C++, Matlab,
                <br> Java for android, Scilab, LabView, .Net, MS SQL Server, MySQL, SQLite Swift</div>
        </div>
        <ul class="service_list">
        <?php
            $i = 1;
        ?>
        @foreach($enterprise_service as $enterprise)
            @foreach($enterprise->serviceDetails as $info_service)
            <?php
            $list_feauture_image = '';
            $array_feauture_image = array();
            $list_feauture_image = $service->getListImage($enterprise->id, 'feauture_image');
            $path_view = config('custom.path_view_service');
            if (!$list_feauture_image) {
                $list_feauture_image = $service->getListImage($enterprise->id, 'gallery');
                $path_view = config('custom.path_view_gallery_service');
            }
            $array_feauture_image = json_decode($list_feauture_image);

            ?>
            <li class="list_item x_scrollFadeIn">
                <a href="{{ URL::to($service->getURL($info_service->service_id, App::getLocale())) }}">
                    <div class="service_image">
                    @if($array_feauture_image)
                    <i class="service_img" style="background-image: url({{ $path_view.$array_feauture_image[0]->name }});">&nbsp;</i>
                    @endif
                    </div>
                    <div class="about ">
                        <p class="service_client"></p>
                        <p class="service_name">{{ $info_service->service_name }}</p>
                        <p class="service_horizontalline"><img src="{{ asset('assets/images/thumbs/horizontal_line.png') }}" class="horizontal_line" alt="" /></p>
                        <p class="service_description">{{ $info_service->description }}</p>
                        <div class="bd">
                            <div class="bdT"></div>
                            <div class="bdB"></div>
                            <div class="bdR"></div>
                            <div class="bdL"></div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        <?php
            ++$i;
        ?>
        @endforeach
        </ul>
        @endif
        
    </div>
</div>
</main>
@stop
