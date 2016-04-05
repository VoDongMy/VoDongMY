/*
 * lazyRender
 */

Widget.lazyRender = function($) {

  var $scrollFadeIn,
      window_scroll_top;
  var init = function(){
    $scrollFadeIn = $('.x_scrollFadeIn');
    _animation();
    _bind();
  }

  var _bind = function(){
    $(window).scroll(function() {
      _animation();
    });
  }

  var _animation = function(){
    window_scroll_top = $(window).scrollTop();
    $scrollFadeIn.each(function(){
      if( window_scroll_top + window.innerHeight >= $(this).offset().top ){
        $(this).addClass('in_view');
      }
    });
  }

  return {
    init:init
  }

}(jQuery);