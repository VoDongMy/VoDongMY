function changeLanguage(current_language, change_to){
	var curent_url = window.location.href;
	var change_to_url = curent_url.replace("/"+current_language, "/"+change_to);
	console.log(change_to_url);
	window.location = change_to_url;
}

$(document).ready(function(){
	$('.form_contact').on('submit', function (e) {
		e.preventDefault();
		var action_url = $('.form_contact').attr('action');
		$.ajax({
			type: 'post',
			url: action_url,
			data: $('form').serialize(),
			success: function () {
				$('.name_popup').html('Complete');
				$('.title_popup').html('Your request has been sent.');
				var $modal;
			    $modal = $('.modal-frame');
			    $modal.removeClass('state-leave').addClass('state-appear');
				$('.form_contact').find("input[type=text], textarea, input[type=email]").val("");
				$('.button_close').on('click', function(){
					$('#company_name').focus();
				})
			}
		});
	});

	$("#submit").on('click', function(e){
		// Validate form complete input
		var $modal;
		$modal = $('.modal-frame');

		if($('#company_name').val() == ''){
			$('.name_popup').html('Error');
			$('.title_popup').html($('#company_name_tip').val());
			$modal.removeClass('state-leave').addClass('state-appear');
			$('.button_close').on('click', function(){
				$('#company_name').focus();
			})
			return false;
		}
		if($('#name').val() == ''){
			$('.name_popup').html('Error');
			$('.title_popup').html($('#name_tip').val());
			$modal.removeClass('state-leave').addClass('state-appear');
			$('.button_close').on('click', function(){
				$('#name').focus();
			})
			return false;
		}
		var email = $('#email').val();
		if(validateEmail(email) === false){
			$('.name_popup').html('Error');
			$('.title_popup').html($('#email_tip').val());
			$modal.removeClass('state-leave').addClass('state-appear');
			$('.button_close').on('click', function(){
				$('#email').focus();
			})
			return false;
		}
		if($('#comment').val() == ''){
			$('.name_popup').html('Error');
			$('.title_popup').html($('#comment_tip').val());
			$modal.removeClass('state-leave').addClass('state-appear');
			$('.button_close').on('click', function(){
				$('#comment').focus();
			})
			return false;
		}

		$('.form_contact').submit();
	});
	

	$("#reset").on('click', function(){
		$('.form_contact').find("input[type=text], textarea, input[type=email]").val("");
	});

	$('.button_close, .popup_1').on('click', function(event) {
		var $modal;
	    $modal = $('.modal-frame');
		$modal.removeClass('state-appear');
		event.preventDefault();
		return false;
    });
});

function validateEmail(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test(email);
}
