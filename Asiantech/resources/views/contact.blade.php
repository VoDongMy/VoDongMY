@extends('layouts.master')
@section('content')
<main class="contact">
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
</main>
@stop