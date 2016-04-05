/*
 * dropdown
 */

Widget.dropdown = function($) {
  var $pulldown,
      $pulldown_trigger,
      $pulldown_target,
      openClass,
      animationClass,
      target_index,
      current_index,
      grid_count;
      


  var init = function(){
    $pulldown = $('.x_pulldown'),
    $pulldown_trigger = $pulldown.find('.x_pulldown_trigger'),
    $pulldown_target = $pulldown.find('.x_pulldown_target'),
    openClass = 'open',
    animationClass = 'animation';
    grid_count = 5;
    _bind();

  }

  var _bind = function(){
    $pulldown_trigger.on('click', function(e) {
      e.preventDefault();
      target_index = $pulldown_trigger.index(this);
      current_index = 0
      
      $pulldown.each(function(_i, _el) {
        var _tr = $(_el);
        if(_tr.hasClass(openClass)){
          current_index = $pulldown.index(this);
        }
      });
      _scroll($(this));
      if($pulldown.hasClass(openClass)){

        if (target_index != current_index && parseInt(target_index / grid_count, 10) === parseInt(current_index / grid_count, 10)) {
          $pulldown.eq(current_index).removeClass(animationClass).removeClass(openClass);

        }else if(target_index != current_index && parseInt(target_index / grid_count, 10) !== parseInt(current_index / grid_count, 10)) {
          $pulldown.eq(current_index).removeClass(openClass);
          $pulldown.eq(target_index).addClass(animationClass).removeClass(openClass);

        }
        if (!$(this).closest('.x_pulldown').hasClass(openClass)) {
          $(this).closest('.x_pulldown').addClass(openClass);

        }else{
          $(this).closest('.x_pulldown').addClass(animationClass).removeClass(openClass);

        }
        
      }else{
        $pulldown.removeClass(animationClass);
        var $parent = $(this).closest('.x_pulldown');
        $parent.addClass(animationClass).toggleClass(openClass);

      }
    });
  }

  var _scroll = function( $_target){
    var _speed = 500,
        _space = 8
    if($pulldown.hasClass(openClass) && parseInt(target_index / grid_count, 10) > parseInt(current_index / grid_count, 10)){
      $('html, body').animate({
        scrollTop: $_target.offset().top - _space - 520
      }, _speed);
    }else{
      $('html, body').animate({
        scrollTop: $_target.offset().top - _space
      }, _speed);

    }
    
  }


  return {
    init:init
  }

}(jQuery);