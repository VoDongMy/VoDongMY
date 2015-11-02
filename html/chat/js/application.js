// This is a manifest file that'll be compiled into application.js, which will include all the files
// listed below.
//
// Any JavaScript/Coffee file within this directory, lib/assets/javascripts, vendor/assets/javascripts,
// or any plugin's vendor/assets/javascripts directory can be referenced here using a relative path.
//
// It's not advisable to add code directly here, but if you do, it'll appear at the bottom of the
// compiled file.
//
// Read Sprockets README (https://github.com/rails/sprockets#sprockets-directives) for details
// about supported directives.
//
//= require jquery
//= require jquery_ujs
//= require turbolinks
//= require_tree .

$(document).ready(function(){
	// Menu Mobile
	$(".button-collapse").sideNav({'edge': 'left'});

	// Popup Clean and Sign out
	$('.modal-trigger').leanModal();

	// More button about comment
	$(".action-commnent a").click(function(event){ 
		$(".post-commnent .form-group .form-group-inner-bottom").slideToggle(300);
		$(this).toggleClass("active");	
		event.preventdefault();	
	}); 
});
 