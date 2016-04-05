@extends('layouts.master')
@section('content')
<main>
    <div class="page_index">
        <section class="service">
            <div class="headline x_scrollFadeIn">
                <img src="{{ asset('assets/images/index/service_main.png') }}" class="image">
                <img src="{{ asset('assets/images/index/triangle.png') }}" class="triangle">
                <!-- <p class="text">{{ trans('index.innovation') }}</p> -->
            </div>
            <div class="service_content x_scrollFadeIn">
                <ul class="service_list">
                    <li class="service_item x_scrollFadeIn">
                        <a href="{{ URL::to( App::getLocale().'/service#web') }}" class="service_link">
                            <div class="service_image">
                                <div class="box1">
                                    <img src="{{ asset('assets/images/index/service1.png') }}" width="100%" height="100%" class="image">
                                </div>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                            <div class="content_detail">
                                <p class="name">{{ trans('main.web_smartphone_service') }}</p>
                                <div class="border"></div>
                                <p class="description">{{ trans('main.web_smartphone_service_description') }}</p>
                                <p class="more">
                                    <span class="icons_more"></span> {{ trans('main.more')}}
                                </p>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="service_item x_scrollFadeIn">
                        <a href="{{ URL::to( App::getLocale().'/service#applications') }}" class="service_link">
                            <div class="service_image">
                                <div class="box1">
                                    <img src="{{ asset('assets/images/index/service2.png') }}" width="100%" height="100%" class="image">
                                </div>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                            <div class="content_detail">
                                <p class="name">{{ trans('main.applications_service') }}</p>
                                <div class="border"></div>
                                <p class="description">{{ trans('main.applications_service_description') }}</p>
                                <p class="more">
                                    <span class="icons_more"></span> {{ trans('main.more')}}
                                </p>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="service_item x_scrollFadeIn">
                        <a href="{{ URL::to( App::getLocale().'/service#enterprise') }}" class="service_link">
                            <div class="service_image">
                                <div class="box1">
                                    <img src="{{ asset('assets/images/index/service3.png') }}" width="100%" height="100%" class="image">
                                </div>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                            <div class="content_detail">
                                <p class="name">{{ trans('main.enterprise_service') }}</p>
                                <div class="border"></div>
                                <p class="description">{{ trans('main.enterprise_service_description') }}</p>
                                <p class="more">
                                    <span class="icons_more"></span> {{ trans('main.more')}}
                                </p>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="service_item x_scrollFadeIn">
                        <a href="{{ URL::to( App::getLocale().'/service#internal') }}" class="service_link">
                            <div class="service_image">
                                <div class="box1">
                                    <img src="{{ asset('assets/images/index/service4.png') }}" width="100%" height="100%" class="image">
                                </div>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                            <div class="content_detail">
                                <p class="name">{{ trans('main.internal_service') }}</p>
                                <p class="sub_name">{{ '{ '.trans('service.e_commerce').' }' }}</p>
                                <div class="border"></div>
                                <p class="description">{{ trans('main.internal_service_description') }}</p>
                                <p class="more">
                                    <span class="icons_more"></span> {{ trans('main.more')}}
                                </p>
                                <div class="embay_border line_inner">
                                    <div class="line_top"></div>
                                    <div class="line_bottom"></div>
                                    <div class="line_right"></div>
                                    <div class="line_left"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="manifesto">
            <div class="headline x_scrollFadeIn">
                <i class="bg_manifesto">&nbsp;</i>
                <img src="{{ asset('assets/images/index/manifest_main.png') }}" class="image">
                <p class="text">{{ trans('index.the_asian_tech' )}}
                    <br><span class="em">{{ trans('index.manifesto') }}</span></p>
                <div class="form_button_more">
                    <a href="{{ URL::to( App::getLocale().'/about/') }}" class="link">{{ trans('index.more') }}</a>
                </div>
            </div>
            <div class="manifesto_content">
                <ul class="manifesto_list">
                    <li class="manifesto_item x_scrollFadeIn">
                        <div class="order arrow_up">
                            <p class="text number">01</p>
                        </div>
                        <div class="manifesto_link">
                            <img src="{{ asset('assets/images/index/manifesto1.png') }}" class="manifesto_image1">
                            <div class="content_detail">
                                <div class="content_text">
                                    <p class="name @if(App::getLocale() == 'jp') name_jp @endif">
                                        <i class="icons_list">&nbsp;</i>{{ trans('index.development_style') }}</p>
                                    <div class="slogan">
                                        <span class="slogan_text">
                                            <i class="icons_caret icon_comma1">&nbsp;</i>
                                            {{ trans('index.personal') }}
                                            <i class="icons_caret icon_comma2">&nbsp;</i>
                                        </span>
                                    </div>
                                    <p class="description">{{ trans('index.our_experienced_team') }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="manifesto_item x_scrollFadeIn">
                        <div class="order arrow_up">
                            <p class="text number">02</p>
                        </div>
                        <div class="manifesto_link">
                            <img src="{{ asset('assets/images/index/manifesto2.png') }}" class="manifesto_image2">
                            <div class="content_detail">
                                <div class="content_text">
                                    <p class="name @if(App::getLocale() == 'jp') name_jp @endif">
                                        <i class="icons_list">&nbsp;</i>{{ trans('index.oath_to_technology') }}</p>
                                    <div class="slogan">
                                        <span class="slogan_text">
                                            <i class="icons_caret icon_comma1">&nbsp;</i>
                                            {{ trans('index.made_japan') }}
                                            <i class="icons_caret icon_comma2">&nbsp;</i>
                                        </span>
                                    </div>
                                    <p class="description">{{ trans('index.our_vietnamese') }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="manifesto_item x_scrollFadeIn">
                        <div class="order arrow_up">
                            <p class="text number">03</p>
                        </div>
                        <div class="manifesto_link">
                            <img src="{{ asset('assets/images/index/manifesto3.png') }}" class="manifesto_image3">
                            <div class="content_detail">
                                <div class="content_text">
                                    <p class="name @if(App::getLocale() == 'jp') name_jp @endif">
                                        <i class="icons_list">&nbsp;</i>{{ trans('index.internal_program') }}</p>
                                    <div class="slogan">
                                        <span class="slogan_text">
                                            <i class="icons_caret icon_comma1">&nbsp;</i>
                                            {{ trans('index.a_dynamic') }}
                                            <i class="icons_caret icon_comma2">&nbsp;</i>
                                        </span>
                                    </div>
                                    <p class="description">{{ trans('index.we_see_a_direct') }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="client">
            <div class="headline x_scrollFadeIn">
                <p class="text">{{ trans('index.client') }}</p>
                <!-- <p class="sub_text">{{ trans('index.and_case_study') }}</p> -->
            </div>
            <div id="tabs">
                <!-- <ul>
                    <li>
                        <a href="#tabs_1" class="bg_line show_line"></a>
                    </li>
                    <li>
                        <a href="#tabs_2" class="bg_line2 show_line"></a>
                    </li>
                </ul> -->
                <div class="client_content x_scrollFadeIn" id="tabs_1">
                    <ul class="client_list">
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo15.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo14.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo13.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo12.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo11.png') }}" class="client_image">
                        </li>
                        <!-- <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo10.png') }}" class="client_image">
                        </li> -->
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo9.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo8.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo7.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo6.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo5.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo4.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo3.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo2.png') }}" class="client_image">
                        </li>
                        <li class="client_item">
                            <img src="{{ asset('assets/images/index/client_demo1.png') }}" class="client_image">
                        </li>
                    </ul>
                </div>
                <!-- <div class="client_content x_scrollFadeIn" id="tabs_2">
                </div> -->
            </div>
        </section>
        <section class="contact">
            <div class="container x_scrollFadeIn">
                <div class="title">
                    <i class="icons_mail">&nbsp;</i>
                    <h2 class="title_contact">{{ trans('contact.wish_contact') }}</h2>
                    <p class="title_description">{{ trans('contact.description_form_line_1') }}<br>{{ trans('contact.description_form_line_2') }}</p>
                </div>
                <!-- end title -->
                {!! Form::open(array('url' => URL::to(App::getLocale().'/contact/'), 'method' => 'post', 'files'=> true, 'class' => 'form_contact', 'role' => 'form')) !!}
                    <div class="form_group">
                        <div class="label">
                            <label class="form_label">{{ trans('contact.company_name') }}</label>
                        </div>
                        <div class="input_contact">
                            {!! Form::text("company_name", '', array('class' => 'form_input', 'id' => 'company_name') ) !!}
                            {!! Form::hidden("company_name_tip", trans('contact.company_name_tip'), array('id' => 'company_name_tip') ) !!}
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="label">
                            <label class="form_label">{{ trans('contact.name') }}</label>
                        </div>
                        <div class="input_contact">
                            {!! Form::text("name", '', array('class' => 'form_input', 'id' => 'name') ) !!}
                            {!! Form::hidden("name_tip", trans('contact.name_tip'), array('id' => 'name_tip') ) !!}
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="label">
                            <label class="form_label">{{ trans('contact.email') }}</label>
                        </div>
                        <div class="input_contact">
                            {!! Form::email("email", '', array('class' => 'form_input', 'id' => 'email') ) !!}
                            {!! Form::hidden("email_tip", trans('contact.email_tip'), array('id' => 'email_tip') ) !!}
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="label">
                            <label class="form_label">{{ trans('contact.attachment') }}</label>
                        </div>
                        <div class="attract_file input_contact">
                            <div class="fileUpload" id="fileUpload">
                                <img class="custom-span" id="img_attract" src="{{ asset('assets/images/thumbs/icons_attractment.png') }}" alt="attract">
                                <input id="uploadBtn" type="file" class="upload" />
                            </div>
                            <input id="uploadFile" placeholder="Questrial" disabled="disabled" />
                        </div>
                    </div>
                    <div class="form_group_comment">
                        <div class="label">
                            <label class="form_label">{{ trans('contact.comment') }}</label>
                        </div>
                        <div class="input_contact">
                            <textarea name="comment" class="form_input_comment" id="comment"></textarea>
                            {!! Form::hidden("comment_tip", trans('contact.comment_tip'), array('id' => 'comment_tip') ) !!}
                        </div>
                    </div>
                    <div class="form_button">
                        <div class="form_button_submit">
                            <a href="javascript:;" class="link btn_fancy" id="submit">{{ trans('contact.submit') }}</a>
                            <div class="modal-frame">
                                <div class="popup_1"></div>
                                <div class="modal">
                                    <div class="modal-inset">
                                        <div class="modal-body">
                                            <i class="icons_contact icon_popup"></i>
                                            <h3 class="name_popup">Complete</h3>
                                            <div class="border_popup">&nbsp;</div>
                                            <p class="title_popup">Your request has been sent.</p>
                                            <button class="button_close button popup_link">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_button_reset">
                            <a href="javascript:;" class="link" id="reset">{{ trans('contact.reset') }}</a>
                        </div>
                    </div>

                {!! Form::close() !!}
                <!-- end form -->
            </div>
        </section>
    </div>
</main>
@stop
