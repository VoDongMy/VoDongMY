@extends('layouts.master')
@section('title') About :: @parent @stop
@section('content') 
<main class="page_about">
    <div class="container_fluid" id="vision">
        <div class="row_flex bg_about x_scrollFadeIn">
            <div class="col_flex about_us">
                <div class="container_text">
                @if($about_service)
                    @foreach($about_service->pageDetails as $info_about_service)
                    <h2 class="title_name">
                        <span class="title_about">
                            <i class="icons_list">&nbsp;</i>{{ $info_about_service->page_title }}
                        </span>
                    </h2>
                    <p class="advertisement">
                    
                            {!! $info_about_service->page_contents !!}
                    </p>
                    @endforeach
                @endif
                </div>
            </div>
            <div class="col_flex">
                <div class="block_image">
                    <i class="img_introduce">&nbsp;</i>
                </div>
            </div>
        </div>
        <div class="headline arrow_up x_scrollFadeIn">
            <span class="text">About</span>
        </div>
    </div>
    <div class="container_explain x_scrollFadeIn" data-wow-delay="2s" id="why">
        <h2 class="text_explain">Why Vietnam?</h2>
        <p class="text_information">
            @if($why_vietnam)
                @foreach($why_vietnam->pageDetails as $info_why_vietnam)
                    {!! $info_why_vietnam->page_contents !!}
                @endforeach
            @endif
        </p>
    </div>
    <div class="container_ceo" id="ceo">
        <div class="headline x_scrollFadeIn">
            <p class=" text text_message">Message from the</p>
            <p class="text edit">CEO</p>
        </div>
        <div class="content_ceo x_scrollFadeIn" data-wow-delay="2s">
            <div class="block_img">
                <img class="img_ceo" src="{{ asset('assets/images/thumbs/img-man.png') }}" alt="ceo">
            </div>
            <div class="container_block">
                @if($message_ceo)
                    @foreach($message_ceo->pageDetails as $info_mesage_ceo)
                        {!! $info_mesage_ceo->page_contents !!}
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @if($list_histories)
    <div class="container_history" id="history">
        <div class="headline wow x_scrollFadeIn">
            <span class="text">History</span>
        </div>
        <div class="content_history">
            <ul class="timeline">
                @foreach($list_histories as $history)
                    @foreach($history->timelineDetails as $info_history)
                    <?php
                    $time_history = date('Y.m.d', strtotime($history->time_sheet));
                    ?>
                    <li class="relevant">
                        <div class="block_history wow fadeInRight" data-wow-delay="1s">
                            <p class="text_history">{{ $info_history->content }}</p>
                        </div>
                        <span class="number_history wow fadeInLeft" data-wow-delay="1s">{{ $time_history }}</span>
                    </li>
                    @endforeach
                @endforeach
                <!-- <li class="relevant">
                  <div class="block_history wow fadeInLeft" data-wow-delay="2s">
                    <p class="text_history">Company was born in Ho Chi Minh</p>
                  </div>
                  <span class="number_history wow fadeInRight" data-wow-delay="2s">2013.11.15</span>
                </li>
                <li class="relevant">
                  <div class="block_history wow fadeInRight" data-wow-delay="3s">
                    <p class="text_history">Move to Danang. Office on 3rd floor of Hoang’s house, 20 employees</p>
                  </div>
                  <span class="number_history wow fadeInLeft" data-wow-delay="3s">2014.4</span>
                </li>
                <li class="relevant">
                  <div class="block_history wow fadeInLeft" data-wow-delay="4s">
                    <p class="text_history">First project</p>
                  </div>
                  <span class="number_history wow fadeInRight" data-wow-delay="4s">2014.9</span>
                </li>
                <li class="relevant">
                  <div class="block_history wow fadeInRight" data-wow-delay="5s">
                    <p class="text_history">Indochina, 80 employees</p>
                  </div>
                  <span class="number_history wow fadeInLeft" data-wow-delay="5s">2014.11</span>
                </li>
                <li class="relevant">
                  <div class="block_history wow fadeInLeft" data-wow-delay="6s">
                    <p class="text_history">New office, 150 employees</p>
                  </div>
                  <span class="number_history wow fadeInRight" data-wow-delay="6s">2015.5</span>
                </li> -->
            </ul>
        </div>
    </div>
    @endif
</main>
@stop
