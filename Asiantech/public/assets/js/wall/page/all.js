Page.all = function ($) {
	var init = function() {
		Widget.header.init();
	    Widget.lazyRender.init();
	};
	return {
		init: init,
	};
}(jQuery);
