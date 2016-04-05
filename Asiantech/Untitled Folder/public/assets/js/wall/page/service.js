Page.service = function ($) {
  /*
    * 初期化処理
  */
  var init = function() {
    /*set image width*/
    setWidthImage();
    $( window ).resize(function() {
      setWidthImage();
    });
    function setWidthImage  () {
      var img_width = $( window ).outerWidth()/2;
      $('.bxslider img').css("width", img_width);
    }
    $(document).ready(function(){
      $('.bxslider').bxSlider();
    });
  };
  return {
    init: init,
  };
  
}(jQuery);
