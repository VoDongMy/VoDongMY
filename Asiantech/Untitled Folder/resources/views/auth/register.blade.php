@extends('admin.layouts.app')
@section('title') Login @parent @stop
@section('body')
<body class="external-page sb-l-c sb-r-c">
    @stop

    @section('content')
    <div id="main">
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">
            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas></canvas>
            </div>
            <!-- Begin: Content -->
            <section id="content">
                <div class="admin-form theme-info" id="login1">
                    <div class="panel panel-info mt7 br-n">
                        <div class="panel-heading heading-border bg-white">
                            <div class="section row mn">
                                <h2 class="media-heading">Sign in</h2>
                            </div>
                        </div>
                        <!-- end .form-header section -->
                        <!--  <form method="post" action="/" id="contact"> -->
                        {!! Form::open(array('url' => URL::to('admin/register'), 'method' => 'post', 'files'=> true)) !!}
                        <div class="panel-body bg-light p20">
                            <div class="row">
                                <div class="col-sm-12">
                                    @if (count($errors) > 0) 
                                        @foreach ($errors->all() as $error) 
                                        <div class="alert alert-micro alert-border-left alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="fa fa-check pr10"></i>
                                            {{ $error }}
                                        </div>
                                        @endforeach 
                                    @endif   
                                    <div class="section">
                                        {!! Form::label('name', 'Name', array('class' => 'field-label text-muted fs18 mb10')) !!}
                                        <label for="username" class="field prepend-icon">
                                            {!! Form::text('name', '', array('class' => 'gui-input', 'placeholder' => 'Enter your name')) !!}
                                            <label for="username" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <div class="section">
                                        {!! Form::label('email', 'Email', array('class' => 'field-label text-muted fs18 mb10')) !!}
                                        <label for="username" class="field prepend-icon">
                                            {!! Form::text('email', '', array('class' => 'gui-input', 'placeholder' => 'Enter email')) !!}
                                            <label for="email" class="field-icon">
                                                <i class="fa fa-user"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->

                                    <div class="section">
                                        {!! Form::label('password', 'Password', array('class' => 'field-label text-muted fs18 mb10')) !!}
                                        <label for="password" class="field prepend-icon">
                                            {!! Form::password('password', array('class' => 'gui-input', 'placeholder' => 'Enter password')) !!}
                                            <label for="password" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                    <div class="section">
                                        {!! Form::label('password', 'Password', array('class' => 'field-label text-muted fs18 mb10')) !!}
                                        <label for="password" class="field prepend-icon">
                                            {!! Form::password('password_confirmation', array('class' => 'gui-input', 'placeholder' => 'Enter password confirm')) !!}
                                            <label for="password_confirmation" class="field-icon">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                        </label>
                                    </div>
                                    <!-- end section -->
                                </div>
                            </div>
                        </div>
                        <!-- end .form-body section -->
                        <div class="panel-footer clearfix p10 ph15">
                            <button type="submit" class="button btn-primary mr10 pull-right">Sign In</button>
                        </div>
                        <!-- end .form-footer section -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
            <!-- End: Content -->
        </section>
        <!-- End: Content-Wrapper -->
    </div>
    @endsection
