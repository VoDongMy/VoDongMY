@extends('layouts.master')
@section('main')
    <main id="contact-us" class="inner-bottom-md">
        <section class="google-map map-holder">
            <div id="map" class="map center"></div>
            <form role="form" class="get-direction">
                <div class="container">
                    <div class="row">
                        <div class="center-block col-lg-10">
                            <div class="input-group">
                                <input type="text" class="le-input input-lg form-control" placeholder="Enter Your Starting Point">
                                <span class="input-group-btn">
                                    <button class="btn btn-lg le-button" type="button">Get Directions</button>
                                </span> 
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </div>
            </form>
        </section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="section leave-a-message">
                        <h2 class="bordered">{{__('Leave a Message')}}</h2>
                        <p>Maecenas dolor elit, semper a sem sed, pulvinar molestie lacus. Aliquam dignissim, elit non mattis ultrices, neque odio ultricies tellus, eu porttitor nisl ipsum eu massa.</p>
                        <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post" >
                            <div class="row field-row">
                                <div class="col-xs-12 col-sm-6">
                                    <label>{{__('Your Name')}}*</label>
                                    <input class="le-input" >
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <label>{{__('Your Email')}}*</label>
                                    <input class="le-input" >
                                </div>
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>{{__('Subject')}}</label>
                                <input type="text" class="le-input">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>{{__('Your Message')}}</label>
                                <textarea rows="8" class="le-input"></textarea>
                            </div><!-- /.field-row -->
                            <div class="buttons-holder">
                                <button type="submit" class="le-button huge">{{__('Send Message')}}</button>
                            </div><!-- /.buttons-holder -->
                        </form><!-- /.contact-form -->
                    </section><!-- /.leave-a-message -->
                </div><!-- /.col -->
                <div class="col-md-4">
                    <section class="our-store section inner-left-xs">
                        <h2 class="bordered">{{__('Our Store')}}</h2>
                        <address>
                            17 Princess Road <br/>
                            London, Greater London <br/>
                            NW1 8JR, UK
                        </address>
                        <h3>{{__('Hours of Operation')}}</h3>
                        <ul class="list-unstyled operation-hours">
                            <li class="clearfix">
                                <span class="day">{{__('Monday')}}:</span>
                                <span class="pull-right hours">12-6 PM</span>
                            </li>
                            <li class="clearfix">
                                <span class="day">{{__('Tuesday')}}:</span>
                                <span class="pull-right hours">12-6 PM</span>
                            </li>
                            <li class="clearfix">
                                <span class="day">{{__('Wednesday')}}:</span>
                                <span class="pull-right hours">12-6 PM</span>
                            </li>
                            <li class="clearfix">
                                <span class="day">{{__('Thursday')}}:</span>
                                <span class="pull-right hours">12-6 PM</span>
                            </li>
                            <li class="clearfix">
                                <span class="day">{{__('Friday')}}:</span>
                                <span class="pull-right hours">12-6 PM</span>
                            </li>
                            <li class="clearfix">
                                <span class="day">{{__('Saturday')}}:</span>
                                <span class="pull-right hours">12-6 PM</span>
                            </li>
                            <li class="clearfix">
                                <span class="day">{{__('Sunday')}}</span>
                                <span class="pull-right hours">{{__('Closed')}}</span>
                            </li>
                        </ul>
                        <h3>{{__('Career')}}</h3>
                        <p>If you're interested in employment opportunities at MediaCenter, please email us: <a href="mailto:contact@yourstore.com">contact@yourstore.com</a></p>
                    </section><!-- /.our-store -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>
@stop
@section('js')
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(16.056490, 108.202358)
            };
            var map = new google.maps.Map(document.getElementById('map'),mapOptions);
            var marker = new google.maps.Marker({
                    map:map,
                    draggable:false,
                    animation: google.maps.Animation.DROP,
                    position: new google.maps.LatLng(16.056490, 108.202358)
                });
            // google.maps.event.addListener(marker, 'click', toggleBounce);
        }
        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&AIzaSyCnChslACeXHQd9LdniFksMBxMoUxGyBOg&'+'callback=initialize';
            document.body.appendChild(script);
        }
        window.onload = loadScript;
    </script>
@stop