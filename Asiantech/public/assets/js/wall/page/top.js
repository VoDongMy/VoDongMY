Page.top = function($) {
  /*
   * 初期化処理
   */
  var init = function() {
    $("#tabs").tabs();
    $('#uploadBtn').change(function() {
      var filename = this.files[0].name;
      $('#uploadFile').val(filename);
      $('#fileUpload').css('background', '#f4f4f4');
      $('#img_attract').attr('src', '../images/thumbs/attractment_focus.png');
      $('#reset').click(function() {
        $('#uploadBtn').val('');
        $('#uploadFile').val('');
        $('#fileUpload').css('background', '');
      });
    });
    $("#focus1,#focus2,#focus3,#focus4").focusout(function() {
      var str1 = $(this).val();
      if (str1 != "") {
        $(this).css('background-color', '#f4f4f4');
      } else {
        $(this).removeAttr("style");
      }
    });
    $("#submit").click(function() {
      $(this).css('background-color', '#a29175');
    });
    $("#reset").click(function() {
      $(this).css('background-color', '#333333');
      $("#focus1,#focus2,#focus3,#focus4").val('');
      $("#focus1,#focus2,#focus3,#focus4").css('background-color', '#333333')
      $('#img_attract').attr('src', '../images/thumbs/icons_attractment.png');
      $('#reset').css('background', '');
    });
  };
  return {
    init: init,
  };
}(jQuery);
