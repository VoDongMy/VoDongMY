/*
 * header
 */

Widget.header = function($) {
  var $header,
      $anchor_trigger,
      animation_speed,
      openClass;

  var init = function(){

    $header = $('.x_header'),
    $anchor_trigger = $header.find('.x_anchor_trigger'),
    animation_speed = 400;
    openClass = 'open';
    _bind();
  }

  var _bind = function(){
    $(window).on('load', function(e) {
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

  var _fadeIn = function($_target){
    var $anchor = $_target.closest('.x_anchor')
    var $anchor_target = $anchor.find('.x_anchor_target');
    $header.find('.x_anchor_target').hide();
    $anchor_target.fadeIn(animation_speed);
    $anchor_target.addClass(openClass);
  }

  var _fadeOut = function($_target){
    var $anchor = $_target.closest('.x_anchor')
    var $anchor_target = $anchor.find('.x_anchor_target');
    $anchor_target.hide();
  }
  var _loaded = function(){
   $header.addClass('is_loaded');
  }



  return {
    init:init
  }

}(jQuery);