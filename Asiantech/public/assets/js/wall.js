/*! CooprateSite - v0.0.0 ( 2015-10-15 ) -  */
(function (window) {


    'use strict';

    /*
     * namespace
     * ATCS = Asian Tech Cooperate Site
     */
    var ATCS = window.ATCS = {};
    var Widget = ATCS.Widget = {};
    var Util = ATCS.Util = {};
    var Page = ATCS.Page = {};
    var Route = ATCS.Route = {
        all: '.',
        off: '/off',
        about: '/about',
        outline: '/outline',
        team: '/team',
        top: '/index',
        contact: '/contact',
        service: '/service',
        service_detail: '^/service-detail\//^[A-Z0-9-_]+$/',
    };

    /*
     * on domContentLoaded
     */
    $(function () {
        /*
         * all
         */
        Util.dispatcher(Route.all, function () {
            Page.all.init();
        });
        /*
         * top
         */
        Util.dispatcher(Route.top, function () {
            console.log("top");
            Page.top.init();
        });

        Util.dispatcher(Route.home, function () {

        });

        Util.dispatcher(Route.about, function () {
            console.log('about');
            Page.about.init();
        });

        Util.dispatcher(Route.contact, function () {
            console.log('contact');
            Page.contact.init();
        });

        Util.dispatcher(Route.outline, function () {
            console.log('outline');
            Page.outline.init();
        });

        Util.dispatcher(Route.team, function () {
            console.log('team');
            Widget.dropdown.init();
        });

        Util.dispatcher(Route.service, function () {
            console.log('service');
            Page.service.init();
        });

        Util.dispatcher(Route.service_detail, function () {
            console.log('service_detail');
        });
        // dispatch
        var url = Util.url.removeFirstPath();
        Util.dispatcher(url);
    });


    Util.dispatcher = function (page, callback) {
        this.page_func = this.page_func || [];

        if (callback)
            return this.page_func.push([page, callback]);
        for (var i = 0, l = this.page_func.length; i < l; ++i) {
            var func = this.page_func[i];
            var match = page.match(func[0]);
            match && func[1](match);
        }
    };
    Util.string = (function () {

        return {
            /*
             * @param {String}
             * @return {String}
             */
            sprintf: function (format) {
                var regex = /(%d|%s){1}/,
                        args = [],
                        len = arguments.length;

                for (var i = 1; i < len; i++) {
                    args.push(arguments[i]);
                }

                len = args.length;
                var str = format;

                for (var i = 0; i < len; i++) {
                    str = str.replace(regex, args[i]);
                }

                return str;
            },
            /*
             * @param {String}
             * @return {String}
             */
            stripHTML: function (val) {
                var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;
                return val.replace(tags, '');
            },
            /*
             * @param {String/Number}
             * @param {Number}
             * @param {String}
             * @return {String}
             */
            leftPad: function (str, pad, spacer) {
                spacer = spacer || '0';
                pad = pad || 0;
                var target = '';
                for (var i = 0; i < pad; i++) {
                    target = target + spacer;
                }

                return (target + str).slice(-1 * pad);
            },
            /*
             * @param {Number}
             * @return {String}
             */
            csv: function (val) {
                return String(val).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
            }

        }

    })();

    Util.date = (function () {

        // 今日の日付を取得
        var today = function () {
            // Dateオブジェクトを生成
            var now = new Date();
            var y = now.getFullYear();
            var m = now.getMonth() + 1;
            var d = now.getDate();
            var h = now.getHours();
            var i = now.getMinutes();
            return y + '-' + m + '-' + d + '-' + h + '-' + i;
        };

        return {
            /*
             *
             */
            latest: {
                latestKey: 'latest',
                /*
                 * @return {Boolean}
                 * ローカルストレイジを使って最近アクセスしたのが今日かどうか判定
                 */
                isToday: function () {
                    var now = new Date(),
                            latest = new Date(Util.storage.get(this.latestKey)),
                            diffYear = now.getFullYear() === latest.getFullYear(),
                            diffMonth = (now.getMonth() + 1) === (latest.getMonth() + 1),
                            diffDate = now.getDate() === latest.getDate(),
                            diffHours = now.getHours() < 8; // バッチが十分に回りきったあとの時間がだいたい8時

                    if (diffYear && diffMonth && diffDate || diffHours) {
                        return true;
                    }
                    // if (diffHours) {
                    //   return true;
                    // }
                    return false;
                },
                /*
                 * @return {String} latestKey
                 */
                getLatestKey: function () {
                    return this.latestKey;
                }
            },
            today: today
        }
    })();

    Util.url = (function () {

        return {
            /*
             * @param {String} path
             * @param {Object} query
             */
            getQuery: function (path) {
                var query = {},
                        param = [],
                        tmp = [];

                if (!path || !/^\?.*=.*/.test(path)) {
                    return query;
                }
                ;

                path = path.substr(1);
                param = path.split(/&/g);

                _.each(param, function (item, index) {
                    tmp = item.split(/=/);
                    query[tmp[0]] = tmp[1];
                });

                return query;
            },
            getLastPath: function () {
                return location.pathname.split('/').pop();
            },
            removeFirstPath: function () {
                var _url = location.pathname;
                /* var _path = _url.split('/');
                 _path.splice(1, 1)
                 _url = _path.join('/');*/
                return _url;
            },
            concatPath: function (path1, path2) {
                var path1Flag = path1.substr(-1, 1) === '/' ? true : false,
                        path2Flag = path2.substr(0, 1) === '/' ? true : false,
                        concatPath = '';

                if (path1Flag === true && path2Flag === true) {
                    concatPath = path1 + path2.substr(1);
                } else if (path1Flag === true || path2Flag === true) {
                    concatPath = path1 + path2;
                } else {
                    concatPath = path1 + '/' + path2;
                }

                return concatPath;
            }

        };
    })();

    Util.fetch = function (options) {
        var env = MMS.Config.env,
                baseUrl = env.base_url,
                mId = env.m_id,
                mOwnerId = env.m_owner_id,
                userId = env.user_id,
                referer = env.referer,
                apiUrl = Util.url.concatPath(baseUrl, 'api/%s?'),
                $defer = $.Deferred(),
                query = {
                    m_id: mId,
                    m_owner_id: mOwnerId,
                    referer: referer
                },
        url = '';
        _.extend(query, options.params);

        // decide url.
        apiUrl = Util.string.sprintf(apiUrl, options.path);

        if (options.type === 'ranking' ||
                options.type === 'category' ||
                options.type === 'killer' ||
                options.type === 'topKiller') {
            _.extend(query, {user_id: userId});
        }

        if (options.type === 'notificationIncentive') {
            _.extend(query, {type: options.notiType});
        }
        if (options.type === 'viewHistory') {
            _.extend(query, {type: options.params});
        }

        url = apiUrl + $.param(query);
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: url,
            success: $defer.resolve,
            error: $defer.reject
        });

        return $defer.promise();
    };

    Util.dimension = (function (win, doc) {

        /**
         * 表示領域のサイズを取得する
         *
         * @return {Object}
         */
        function viewportSize() {
            return {
                width: win.innerWidth,
                height: win.innerHeight
            };
        }

        /**
         * スクロール量を取得する
         *
         * @return {Object}
         */
        function scrollPos() {
            return {
                left: win.pageXOffset || doc.documentElement.scrollLeft || doc.body.scrollLeft,
                top: win.pageYOffset || doc.documentElement.scrollTop || doc.body.scrollTop
            };
        }

        /**
         * 要素の表示領域内の絶対座標と，矩形の幅と高さを返す ( border-boxモデル )
         * getBoundingClientRectの実装が必要
         *
         * @param {Element} elm
         * @return {Object}
         */
        function elAbsRectPos(elm) {
            var rect = elm.getBoundingClientRect();

            return {
                top: rect.top,
                bottom: rect.bottom,
                left: rect.left,
                right: rect.right,
                width: rect.width || (rect.right - rect.left),
                height: rect.height || (rect.bottom - rect.top)
            };
        }

        /**
         * 要素の親要素との相対座標と，矩形の幅と高さを返す
         *
         * @param {Element} elm
         * @param {Element} [parent]
         * @return {Object}
         */
        function elRelRectPos(elm, parent) {
            var crit = elAbsRectPos(parent || elm.parentNode),
                    self = elAbsRectPos(elm);

            return {
                top: self.top - crit.top,
                bottom: crit.bottom - self.bottom,
                left: self.left - crit.left,
                right: crit.right - self.right
            };
        }

        /**
         * 要素を中央に配置する
         * デフォルトはviewportに対しての中央
         *
         * @param {Element} elm
         * @param {Element} [crit]
         */
        // @todo issue: ロジックの整理が必要
        function elCentering(elm, crit) {
            var self = elAbsRectPos(elm), from, to, xy = {},
                    pos = {}, fix = {}, relbase = false;

            function _isRelative(elm) {
                var e = elm, state;
                while (e = e.parentNode) {
                    // documentに突き当たったら終了
                    if (e === doc) {
                        return false;
                    }
                    state = elm.style.position;
                    if (state === 'absolute' || state === 'relative') {
                        return e;
                    }
                }
                return false;
            }

            // critがあって，スタイルのtop, leftと座標が異なれば相対基準をチェック
            xy.top = elm.style.top;
            xy.left = elm.style.left;

            if (crit && self.top !== xy.top && self.left !== xy.left) {
                relbase = _isRelative(elm);
            }

            // 相対基準がいるか？
            if (relbase !== false) {
                // 相対基準とcritは同一か？
                if (crit && crit === relbase) {
                    // 1.相対座標でfix
                    to = elAbsRectPos(crit);

                    pos.left = (to.width - self.width) / 2 + 'px';
                    pos.top = (to.height - self.height) / 2 + 'px';
                } else {
                    // 2.relbaseとcritの座標をあわせて，矩形サイズの比較から中央を算出する -> noteみる
                    to = elAbsRectPos(crit);
                    from = elAbsRectPos(relbase);

                    fix.top = to.top - from.top;
                    fix.left = to.left - from.left;

                    pos.left = (to.width - self.width) / 2 + fix.left + 'px';
                    pos.top = (to.height - self.height) / 2 + fix.top + 'px';
                }
            } else {
                // critはあるか？
                if (crit) {
                    // 3.単純に絶対座標同士でフィックス
                    to = elAbsRectPos(crit);

                    pos.left = (to.width - self.width) / 2 + to.left + 'px';
                    pos.top = (to.height - self.height) / 2 + to.top + 'px';
                } else {
                    // 4.単純にviewportの中央にする（スクロール位置でfix）
                    to = viewportSize();
                    fix = scrollPos();

                    pos.left = (to.width - self.width) / 2 + fix.left + 'px';
                    pos.top = (to.height - self.height) / 2 + fix.top + 'px';
                }
            }

            Object.keys(pos).forEach(function (prop) {
                elm.style[prop] = pos[prop];
            });
        }

        /**
         * 要素が範囲内にあるかどうか
         * @param {Object} $elm Element for check.
         * @param {Number} len Distance from window-bottom to top of $elm.
         * @return {Boolean}
         */
        function elIsOnRange($elm, len) {
            var win = $(window),
                    len = len || 0,
                    viewport = {
                        top: win.scrollTop()
                    };
            viewport.bottom = viewport.top + win.height();
            var bounds = $elm.offset();
            bounds.bottom = bounds.top + $elm.height();
            return !((viewport.bottom + len) < (bounds.top) || viewport.top > bounds.bottom);
        }

        return {
            viewportSize: viewportSize,
            scrollPos: scrollPos,
            elCentering: elCentering,
            elRelRectPos: elRelRectPos,
            elAbsRectPos: elAbsRectPos,
            elIsOnRange: elIsOnRange
        };

    })(window, document);

    Page.all = function ($) {
        var init = function () {
            Widget.header.init();
            Widget.lazyRender.init();
        };
        return {
            init: init,
        };
    }(jQuery);

    Page.top = function ($) {
        /*
         * 初期化処理
         */
        var init = function () {
            $("#tabs").tabs();
            $('#uploadBtn').change(function () {
                var filename = this.files[0].name;
                $('#uploadFile').val(filename);
                $('#fileUpload').css('background', '#f4f4f4');
                $('#img_attract').attr('src', '/assets/images/thumbs/attractment_focus.png');
                $('#reset').click(function () {
                    $('#uploadBtn').val('');
                    $('#uploadFile').val('');
                    $('#fileUpload').css('background', '');
                });
            });
            $("#focus1,#focus2,#focus3,#focus4").focusout(function () {
                var str1 = $(this).val();
                if (str1 != "") {
                    $(this).css('background-color', '#f4f4f4');
                }
                else {
                    $(this).removeAttr("style");
                }
            });


            $("#submit").click(function () {
                $(this).css('background-color', '#a29175');
            });

            $("#reset").click(function () {
                $(this).css('background-color', '#333333');
                $("#focus1,#focus2,#focus3,#focus4").val('');
                $("#focus1,#focus2,#focus3,#focus4").css('background-color', '#333333')
            });

        };

        return {
            init: init,
        };
    }(jQuery);

    Page.service = function ($) {
        /*
         * 初期化処理
         */
        var init = function () {
          /*set image width*/
          setWidthImage();
          $(window).resize(function () {
              setWidthImage();
          });
          function setWidthImage() {
              var img_width = $(window).outerWidth() / 2;
              $('.bxslider img').css("width", img_width);
          }
          $(document).ready(function () {
              $('.bxslider').bxSlider();
          });
          $('.service_list').each(function (index) {

              $('li:odd .about').addClass('post_before');
              $('li:even .about').addClass('post_after');
          })
          $('li:odd .service_image').addClass('left');
          $('li:even .service_image').addClass('right');
          jQuery('li:odd .bxslider').parent().addClass('bxslider_left');
          $('li:even .bxslider').parent().addClass('bxslider_right');
        };
      return {
          init: init,
      };
    }(jQuery);

    Page.outline = function ($) {
        /*
         * 初期化処理
         */
        var init = function () {
            google.maps.event.addDomListener(window, 'load', _render);
        };
        var _render = function () {
            // When the window has finished loading create our google map below
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 15,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(16.0756963, 108.2335242), // New York

                scrollwheel: false,
                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{"featureType": "landscape.man_made", "elementType": "geometry.fill", "stylers": [{"color": "#e7eaec"}]}, {"featureType": "landscape.natural", "elementType": "geometry.fill", "stylers": [{"color": "#e7eaeb"}]}, {"featureType": "poi", "elementType": "labels", "stylers": [{"visibility": "off"}]}, {"featureType": "poi.business", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "poi.government", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "poi.medical", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{"visibility": "off"}, {"color": "#c9d5ca"}]}, {"featureType": "poi.place_of_worship", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "poi.school", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "poi.sports_complex", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ddc6a2"}, {"saturation": "-50"}, {"lightness": "7"}]}, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#b59e74"}, {"visibility": "off"}]}, {"featureType": "road.arterial", "elementType": "geometry.stroke", "stylers": [{"visibility": "on"}, {"color": "#d7dbdc"}]}, {"featureType": "road.local", "elementType": "geometry.stroke", "stylers": [{"visibility": "on"}, {"color": "#d7dbdc"}]}, {"featureType": "transit.station", "elementType": "all", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "geometry.fill", "stylers": [{"color": "#abb9c1"}]}]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(16.0756963, 108.2335242),
                map: map,
                title: 'Snazzy!'
            });

        }
        return {
            init: init,
        };
    }(jQuery);

    Page.about = function ($) {
        var init = function () {
            wow = new WOW(
                    {
                        animateClass: 'animated',
                        offset: 10
                    }
            );
            wow.init();

        };
        return {
            init: init,
        };
    }(jQuery);

    Page.contact = function ($) {
        /*
         * 初期化処理
         */

        var init = function () {
            $('#uploadBtn').change(function () {
                var filename = this.files[0].name;
                $('#uploadFile').val(filename);
                $('#fileUpload').css('background', '#f4f4f4');
                $('#img_attract').attr('src', '/assets/images/thumbs/attractment_focus.png');
                $('#reset').click(function () {
                    $('#uploadBtn').val('');
                    $('#uploadFile').val('');
                    $('#fileUpload').css('background', '');
                });
            });
            $("#focus1,#focus2,#focus3,#focus4").focusout(function () {
                var str1 = $(this).val();
                if (str1 != "") {
                    $(this).css('background-color', '#f4f4f4');
                }
                else {
                    $(this).removeAttr("style");
                }
            });


            $("#submit").click(function () {
                $(this).css('background-color', '#a29175');
            });

            $("#reset").click(function () {
                $(this).css('background-color', '#333333');
                $("#focus1,#focus2,#focus3,#focus4").val('');
                $("#focus1,#focus2,#focus3,#focus4").css('background-color', '#333333')
            });

        };
        return {
            init: init,
        };
    }(jQuery);

    Widget.dropdown = function ($) {
        var $pulldown,
                $pulldown_trigger,
                $pulldown_target,
                openClass,
                animationClass,
                target_index,
                current_index,
                grid_count;



        var init = function () {
            $pulldown = $('.x_pulldown'),
                    $pulldown_trigger = $pulldown.find('.x_pulldown_trigger'),
                    $pulldown_target = $pulldown.find('.x_pulldown_target'),
                    openClass = 'open',
                    animationClass = 'animation';
            grid_count = 5;
            _bind();

        }

        var _bind = function () {
            $pulldown_trigger.on('click', function (e) {
                e.preventDefault();
                target_index = $pulldown_trigger.index(this);
                current_index = 0

                $pulldown.each(function (_i, _el) {
                    var _tr = $(_el);
                    if (_tr.hasClass(openClass)) {
                        current_index = $pulldown.index(this);
                    }
                });
                _scroll($(this));
                if ($pulldown.hasClass(openClass)) {

                    if (target_index != current_index && parseInt(target_index / grid_count, 10) === parseInt(current_index / grid_count, 10)) {
                        $pulldown.eq(current_index).removeClass(animationClass).removeClass(openClass);

                    } else if (target_index != current_index && parseInt(target_index / grid_count, 10) !== parseInt(current_index / grid_count, 10)) {
                        $pulldown.eq(current_index).removeClass(openClass);
                        $pulldown.eq(target_index).addClass(animationClass).removeClass(openClass);

                    }
                    if (!$(this).closest('.x_pulldown').hasClass(openClass)) {
                        $(this).closest('.x_pulldown').addClass(openClass);

                    } else {
                        $(this).closest('.x_pulldown').addClass(animationClass).removeClass(openClass);

                    }

                } else {
                    $pulldown.removeClass(animationClass);
                    var $parent = $(this).closest('.x_pulldown');
                    $parent.addClass(animationClass).toggleClass(openClass);

                }
            });
        }

        var _scroll = function ($_target) {
            var _speed = 500,
                    _space = 8
            if ($pulldown.hasClass(openClass) && parseInt(target_index / grid_count, 10) > parseInt(current_index / grid_count, 10)) {
                $('html, body').animate({
                    scrollTop: $_target.offset().top - _space - 520
                }, _speed);
            } else {
                $('html, body').animate({
                    scrollTop: $_target.offset().top - _space
                }, _speed);

            }

        }


        return {
            init: init
        }

    }(jQuery);
    Widget.header = function ($) {
        var $header,
                $anchor_trigger,
                animation_speed,
                openClass;

        var init = function () {
            console.log('');
            $header = $('.x_header'),
                    $anchor_trigger = $header.find('.x_anchor_trigger'),
                    animation_speed = 400;
            openClass = 'open';
            _bind();
        }

        var _bind = function () {
            $(window).on('load', function (e) {
                e.preventDefault();
                _loaded();
            });
            $anchor_trigger.hover(
                    function () {
                        _fadeIn($(this));
                    },
                    function () {
                        console.log('Aaaaaaaaaaa');
                    }
            );
        }

        var _fadeIn = function ($_target) {
            var $anchor = $_target.closest('.x_anchor')
            var $anchor_target = $anchor.find('.x_anchor_target');
            $header.find('.x_anchor_target').hide();
            $anchor_target.fadeIn(animation_speed);
            $anchor_target.addClass(openClass);
        }

        var _fadeOut = function ($_target) {
            var $anchor = $_target.closest('.x_anchor')
            var $anchor_target = $anchor.find('.x_anchor_target');
            $anchor_target.hide();
        }
        var _loaded = function () {
            $header.addClass('is_loaded');
        }



        return {
            init: init
        }

    }(jQuery);
    Widget.lazyRender = function ($) {

        var $scrollFadeIn,
                window_scroll_top;
        var init = function () {
            $scrollFadeIn = $('.x_scrollFadeIn');
            _animation();
            _bind();
        }

        var _bind = function () {
            $(window).scroll(function () {
                _animation();
            });
        }

        var _animation = function () {
            window_scroll_top = $(window).scrollTop();
            $scrollFadeIn.each(function () {
                if (window_scroll_top + window.innerHeight >= $(this).offset().top) {
                    $(this).addClass('in_view');
                }
            });
        }

        return {
            init: init
        }

    }(jQuery);
})(this);