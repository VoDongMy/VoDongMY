Page.about = function($) {
  var init = function() {
    wow = new WOW({
      animateClass: 'animated',
      offset: 10
    });
    wow.init();

  };
  return {
    init: init,
  };
}(jQuery);
