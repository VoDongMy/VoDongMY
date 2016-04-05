@extends('layouts.master')
@section('title') Offshore development :: @parent @stop
@section('content')
<main class="page_off">
    <div class="container_fluid x_scrollFadeIn" id="offshore">
        <div class="row_flex bg_off">
            <div class="col_flex off_us">
                @if($offshore_dev)
                @foreach($offshore_dev->pageDetails as $info_page)
                <div class="container_text">
                    <h2 class="title_name">
                        <div class="title_off">
                            <!-- <i class="icons_list">&nbsp;</i>What is offshore
                            <p class="text_development">development?</p> -->
                            <i class="icons_list">&nbsp;</i>{!! $info_page->page_title !!}
                        </div>
                    </h2>
                    <p class="advertisement">{!! $info_page->page_contents !!}</p>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col_flex">
                <div class="block_image">
                    <i class="img_introduce">&nbsp;</i>
                </div>
            </div>
        </div>
        <div class="headline arrow_up x_scrollFadeIn">
            <p class="text text_offshore">Offshore Development</p>
            <!-- <p class="text">Development</p>  -->
        </div>
    </div>
    <div class="container_information">
        <div class="row_flex section_package x_scrollFadeIn">
            <div class="col_flex information_us">
                @if($laboratory)
                @foreach($laboratory->pageDetails as $info_page)
                <div class="container_text line_content">
                    <h2 class="title_name">
                        <p class="title_us">
                            <i class="icons_clock">&nbsp;</i>{{ $info_page->page_title }}
                        </p>
                    </h2>
                    <p class="text_content">{!! $info_page->page_contents !!}</p>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col_flex information_us">
                @if($package)
                @foreach($package->pageDetails as $info_page)
                <div class="container_text">
                    <h2 class="title_name">
                        <p class="title_us">
                            <i class="icons_package">&nbsp;</i>{{ $info_page->page_title }}
                        </p>
                    </h2>
                    <p class="text_content">{!! $info_page->page_contents !!}</p>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="container_process" id="process">
        <div class="headline x_scrollFadeIn">
            <p class=" text text_message">The Development</p>
            <p class="text">Process</p>
        </div>
        <div class="content_process x_scrollFadeIn">
            <ul class="block_aplication">
                <li class="element arrow-left red">
                    <div class="block_element">
                        <div class="sup_element">
                            <div class="link">
                                <i class="icons_lorem1">&nbsp;</i>
                                <span class="text_element">{{ trans('offshore.process_step1') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="element arrow-left white">
                    <div class="block_element">
                        <div class="sup_element">
                            <div class="link">
                                <i class="icons_lorem2">&nbsp;</i>
                                <span class="text_element">{{ trans('offshore.process_step2') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="element arrow-bottom blue">
                    <div class="block_element">
                        <div class="sup_element">
                            <div class="link">
                                <i class="icons_lorem3">&nbsp;</i>
                                <span class="text_element">{{ trans('offshore.process_step3') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="element white"> 
                    <div class="block_element">
                        <div class="sup_element">
                            <div class="link">
                                <i class="icons_lorem6">&nbsp;</i>
                                <span class="text_element">{{ trans('offshore.process_step6') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="element arrow-right green">
                    <div class="block_element">
                        <div class="sup_element">
                            <div class="link">
                                <i class="icons_lorem5">&nbsp;</i>
                                <span class="text_element">{{ trans('offshore.process_step5') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="element arrow-right white">
                    <div class="block_element">
                        <div class="sup_element">
                            <div class="link">
                                <i class="icons_lorem4">&nbsp;</i>
                                <span class="text_element">{{ trans('offshore.process_step4') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="element yellow">
                    <div class="block_element">
                        <div class="sup_element">
                            <ul class="list_icons">
                                <li class="block_icons">
                                    <div class="link">
                                        <i class="icons_lorem10">&nbsp;</i>
                                    </div>
                                </li>
                                <li class="block_icons">
                                    <div class="link">
                                        <i class="icons_lorem9">&nbsp;</i>
                                    </div>
                                </li>
                                <li class="block_icons">
                                    <div class="link">
                                        <i class="icons_lorem8">&nbsp;</i>
                                    </div>
                                </li>
                                <li class="block_icons">
                                    <div class="link">
                                        <i class="icons_lorem7">&nbsp;</i>
                                    </div>
                                </li>
                            </ul>
                            <div class="link">
                                <span class="text_element">{{ trans('offshore.process_step7') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</main>
@stop
