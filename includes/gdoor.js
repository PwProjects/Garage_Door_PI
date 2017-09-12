/*! GDoor JS | (c) 2017 PwProjects */
$(document).on('pageinit', '#login_page', function() {
	$('#information').popup({
		history: false,
		positionTo: '#username'
	});
	$(document).on('click', '#submit', function() {
		$('#submit').attr('disabled', true);
		update_storage();
		$.ajax({
			url:		'includes/server.php',
			type:		'post',
			dataType:	'json',
			data: {
				action:		'login_user',
				username:	$('#username').val(),
				password:	$('#password').val()
			},
			beforeSend: function() {
				$('#submit').attr('disabled', true);
				$('#login_header').removeClass('login-err').addClass('login-bar');
				$('#login_text').text('Validating');
				$.mobile.loading('show');
			},
			complete: function() {
				$.mobile.loading('hide');
				$('#submit').attr('disabled', false);
			},
			success: function(result) {
				if(result.status) {
					window.location.replace(result.url);
				} else {
					$('#login_text').text('Login Failed');
					$('#login_header').removeClass('login-bar').addClass('login-err');
				}
			},
			error: function (request,error) {
				$('#login_text').text('Network Error');
				$('#login_header').removeClass('login-bar').addClass('login-err');
			}
		});
		return false;
	});
});
$(function apply_storage() {
	if(localStorage.remember && localStorage.remember != '') {
		$('#remember').attr('checked', true).checkboxradio("refresh");
		$('#username').val(localStorage.username);
		$('#password').val(localStorage.password);
	} else {
		$('#remember').prop('checked', false).checkboxradio("refresh");
		$('#username').val('');
		$('#password').val('');
	}
});
function update_storage() {
	if ($('#remember').is(':checked')) {
		localStorage.username = $('#username').val();
		localStorage.password = $('#password').val();
		localStorage.remember = $('#remember').val();
	} else {
		localStorage.username = '';
		localStorage.password = '';
		localStorage.remember = '';
	}
}

$(document).on('pageinit', '#main_page', function(){
	$('#popup').popup({
		history: false,
		positionTo: '#single-door'
	});
	$(document).on('click', '#sign_out', function() {
		$('#logout_form').submit();
	});
	$(document).on('click', '.door_func', function() {
		var button_el = $(this);
		var operation = $(button_el).attr('id');
		var prev_text = $(button_el).text();
		$.ajax({
			url:		'includes/server.php',
			type:		'post',
			dataType:	'json',
			data: {
				action:		'door_functions',
				button:		operation
			},
			beforeSend: function() {
				$('.door_func').attr('disabled', true);
				$(button_el).text('Activating');
				$.mobile.loading('show');
			},
			complete: function() {
				$(button_el).text(prev_text);
				$('.door_func').attr('disabled', false);
				$.mobile.loading('hide');
			},
			success: function(result) {
				if(!result.status) {
					$('#popup').html(result.message).popup('open', {transition:'slide'});
				}
			},
			error: function (request,error) {
				var message = '<h3>Network Error</h3><p>There was no response from the server.</p>';
				$('#popup').html(message).popup('open', {transition:'slide'});
			}
		});
		return false;
	});
});
$(function() {
	$('body').css('visibility', 'visible');
});
