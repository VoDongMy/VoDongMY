        <!-- BEGIN: PAGE SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/vendor/jquery/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>
        <!-- HighCharts Plugin -->
        <script src="{{ asset('admin/vendor/plugins/highcharts/highcharts.js') }}"></script>
        <!-- JvectorMap Plugin + US Map (more maps in plugin/assets folder) -->
        <script src="{{ asset('admin/vendor/plugins/jvectormap/jquery.jvectormap.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js') }}"></script> 
        
        <!-- FullCalendar Plugin + moment Dependency -->
        <script src="{{ asset('admin/vendor/plugins/fullcalendar/lib/moment.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
        
        <!-- FileUpload JS -->
        <script src="{{ asset('admin/vendor/plugins/fileupload/fileupload.js') }}"></script>
        <script src="{{ asset('admin/vendor/plugins/holder/holder.min.js') }}"></script>
        <!-- Datatables -->
        <script src="{{ asset('admin/vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
        
        <!-- Page Plugins -->
        <script src="{{ asset('admin/vendor/plugins/magnific/jquery.magnific-popup.js') }}"></script>

        <!-- Summernote Plugin -->
        <script src="{{ asset('admin/vendor/plugins/summernote/summernote.min.js') }}"></script>

        <!-- jQuery Validate Plugin-->
        <script src="{{ asset('admin/vendor/plugins/validate/jquery.validate.min.js') }}"></script>

        <!-- Multi upload -->
        <script src="{{ asset('admin/vendor/plugins/multiupload/jquery.filer.js') }}"></script>

        <!-- DateTime Plugin -->
        <script src="{{ asset('admin/vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

        <!-- Theme Javascript -->
        <script src="{{ asset('admin/assets/js/utility/utility.js') }}"></script>
        <script src="{{ asset('admin/assets/js/app/app.js') }}"></script>
        <script src="{{ asset('admin/assets/js/main.js') }}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                "use strict";
                // Init Demo JS  
                App.init();
                // Init Theme Core    
                Core.init();

                if ( $('.summernote').length ) {
                    $('.summernote').summernote({
                        height: 255, //set editable area's height
                        focus: false, //set focus editable area after Initialize summernote
                        oninit: function() {},
                        onChange: function(contents, $editable) {},
                    });
                }
                if ( $('.datetimepicker').length ) {
                    $('.datetimepicker').datepicker({
                    });
                }
                // Multi Upload
                if ( $('#file_input').length ) {
                    $('#file_input').filer({
                        showThumbs: true,
                        templates: {
                            box: '<ul class="jFiler-item-list"></ul>',
                            item: '<li class="jFiler-item col-md-3 mb10">\
                                        <div class="jFiler-item-container">\
                                            <div class="jFiler-item-inner">\
                                                <div class="jFiler-item-thumb">\
                                                    <div class="jFiler-item-status"></div>\
                                                    <div class="jFiler-item-info">\
                                                    <span class="jFiler-item-title"><b title="<?php echo '{{fi-name}}'; ?>"><?php echo '{{fi-name | limitTo: 25}}'; ?></b></span>\
                                                    </div>\
                                                    <?php echo '{{fi-image}}'; ?>\
                                                </div>\
                                                <div class="jFiler-item-assets jFiler-row">\
                                                    <ul class="list-inline pull-left">\
                                                        <li><span class="jFiler-item-others"><?php //echo '{{fi-icon}} {{fi-size2}}'; ?></span></li>\
                                                    </ul>\
                                                    <ul class="list-inline pull-right">\
                                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                                    </ul>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </li>',
                            itemAppend: '<li class="jFiler-item col-md-3 mb10">\
                                        <div class="jFiler-item-container">\
                                            <div class="jFiler-item-inner">\
                                                <div class="jFiler-item-thumb">\
                                                    <div class="jFiler-item-status"></div>\
                                                    <div class="jFiler-item-info">\
                                                    <span class="jFiler-item-title"><b title="<?php echo '{{fi-name}}'; ?>"><?php echo '{{fi-name | limitTo: 25}}'; ?></b></span>\
                                                    </div>\
                                                    <?php echo '{{fi-image}}'; ?>\
                                                </div>\
                                                <div class="jFiler-item-assets jFiler-row">\
                                                    <ul class="list-inline pull-left">\
                                                        <li><span class="jFiler-item-others"><?php //echo '{{fi-icon}} {{fi-size2}}'; ?></span></li>\
                                                    </ul>\
                                                    <ul class="list-inline pull-right">\
                                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                                    </ul>\
                                                    <input type="hidden" name="old_feauture_images[]" value="<?php echo '{{fi-name}}'; ?>">\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </li>',
                            progressBar: '<div class="bar"></div>',
                            itemAppendToEnd: true,
                            removeConfirmation: true,
                            _selectors: {
                                list: '.jFiler-item-list',
                                item: '.jFiler-item',
                                progressBar: '.bar',
                                remove: '.jFiler-item-trash-action',
                            }
                        },
                        addMore: true,
                        <?php
                        if (!isset($feauture_image)) {
                            $feauture_image = '';
                        } ?>
                        @if($feauture_image)
                        files: {!! $feauture_image !!}
                        @endif

                    });
                }


                if ( $('#file_input2').length ) {
                    $('#file_input2').filer({
                        showThumbs: true,
                        templates: {
                            box: '<ul class="jFiler-item-list"></ul>',
                            item: '<li class="jFiler-item col-md-3">\
                                        <div class="jFiler-item-container">\
                                            <div class="jFiler-item-inner">\
                                                <div class="jFiler-item-thumb">\
                                                    <div class="jFiler-item-status"></div>\
                                                    <div class="jFiler-item-info">\
                                                    <span class="jFiler-item-title"><b title="<?php echo '{{fi-name}}'; ?>"><?php echo '{{fi-name | limitTo: 25}}'; ?></b></span>\
                                                    </div>\
                                                    <?php echo '{{fi-image}}'; ?>\
                                                </div>\
                                                <div class="jFiler-item-assets jFiler-row">\
                                                    <ul class="list-inline pull-left">\
                                                        <li><span class="jFiler-item-others"><?php //echo '{{fi-icon}} {{fi-size2}}'; ?></span></li>\
                                                    </ul>\
                                                    <ul class="list-inline pull-right">\
                                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                                    </ul>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </li>',
                            itemAppend: '<li class="jFiler-item col-md-3 mb10">\
                                        <div class="jFiler-item-container">\
                                            <div class="jFiler-item-inner">\
                                                <div class="jFiler-item-thumb">\
                                                    <div class="jFiler-item-status"></div>\
                                                    <div class="jFiler-item-info">\
                                                    <span class="jFiler-item-title"><b title="<?php echo '{{fi-name}}'; ?>"><?php echo '{{fi-name | limitTo: 25}}'; ?></b></span>\
                                                    </div>\
                                                    <?php echo '{{fi-image}}'; ?>\
                                                </div>\
                                                <div class="jFiler-item-assets jFiler-row">\
                                                    <ul class="list-inline pull-left">\
                                                        <li><span class="jFiler-item-others"><?php //echo '{{fi-icon}} {{fi-size2}}'; ?></span></li>\
                                                    </ul>\
                                                    <ul class="list-inline pull-right">\
                                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                                    </ul>\
                                                    <input type="hidden" name="old_gallery_images[]" value="<?php echo '{{fi-name}}'; ?>">\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </li>',
                            progressBar: '<div class="bar"></div>',
                            itemAppendToEnd: true,
                            removeConfirmation: true,
                            _selectors: {
                                list: '.jFiler-item-list',
                                item: '.jFiler-item',
                                progressBar: '.bar',
                                remove: '.jFiler-item-trash-action',
                            }
                        },
                        addMore: true,
                        <?php
                        if (!isset($gallery)) {
                            $gallery = '';
                        } ?>
                        @if($gallery)
                        files: {!! $gallery !!}
                        @endif

                    });
                }

                if ( $('.form-validate').length ) {
                    $(".form-validate").validate({
                        errorClass: "state-error",
                        validClass: "state-success",
                        errorElement: "em",
                        rules: {
                            password: {
                                required: true,
                                minlength: 6
                            },
                            confirm_password: { 
                                equalTo: "#password" 
                            }
                        },
                        messages: {
                            password: {
                                required: "Password does not null.",
                                minlength: jQuery.validator.format("At least {0} characters required!")
                            },
                            confirm_password: {
                                required: "Password confirm is incorrect."
                            }
                        },
                        submitHandler: function() {
                            $.ajax({
                                type: 'post',
                                async: false,
                                url: '/cpanel/changepw',
                                data: $('form').serialize(),
                                success: function (response) {
                                    if(response === 'true'){
                                        console.log('Success');
                                        $('#panel-change-passwd-success').removeClass('hidden');
                                        $('#panel-change-password').addClass('hidden');
                                    }else{
                                         $('#label-alert').removeClass('hidden');
                                        return false;
                                    }
                                }
                            });
                        },
                        /* @validation highlighting + error placement  
                        ---------------------------------------------------- */

                        highlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function(error, element) {
                            if (element.is(":radio") || element.is(":checkbox")) {
                                element.closest('.option-group').after(error);
                            } else {
                                error.insertAfter(element.parent());
                            }
                        }
                    });
                }

                if($('.form-validate-user').length){
                    $(".form-validate-user").validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 6
                            },
                            email: { 
                                required: true,
                                email: true
                            },
                            password: {
                                required: true,
                                minlength: 6
                            },
                            confirm_password: { 
                                equalTo: "#password" 
                            },
                            role_id: {
                                required: true,
                            }
                        },
                        submitHandler: function() {
                            //Check email is duplicate and submit form save data
                            $.ajax({
                                type: 'post',
                                async: false,
                                url: $('.form-validate-user').attr('action'),
                                data: $('form').serialize(),
                                success: function (response) {
                                    if(response === 'true'){
                                        console.log('Success');
                                        
                                    }else{
                                         $('#label-alert').removeClass('hidden');
                                        return false;
                                    }
                                }
                            });
                        }
                    });
                }
                if ( $('.form-validate2').length ) {
                    $(".form-validate2").validate({
                        errorClass: "state-error",
                        validClass: "state-success",
                        errorElement: "em",
                        highlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                        },
                        unhighlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                        },
                        errorPlacement: function(error, element) {
                            if (element.is(":radio") || element.is(":checkbox")) {
                                element.closest('.option-group').after(error);
                            } else {
                                error.insertAfter(element.parent());
                            }
                        }
                    });
                }
                        
            });
        </script>
        