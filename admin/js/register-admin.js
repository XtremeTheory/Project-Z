$(document).ready(function(){
	'use strict';

	// Remember checkbox
	if($('.chk-remember').length){
		$('.chk-remember').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
		});
	}

	$('#birthday').mask('99/99/9999');

	$(document).off('focus', 'input').on('focus', 'input', function () {
		$(this).removeClass('is-invalid');
		$(this).attr('autocomplete', 'off');
	});

	$(document).off('click', '#registerSubmit').on('click', '#registerSubmit', function () {
		var isFormValid = 1;
		var loginValid = 0;
		//Checks each field is not empty.
			if ($.trim($('#fname').val()).length == 0) {
				$('#fname').addClass("is-invalid");
				$('.hb-fname').text("First name missing.");
				isFormValid = 0;
			}

			if ($.trim($('#lname').val()).length == 0) {
				$('#lname').addClass("is-invalid");
				$('.hb-lname').text("Last name missing.");
				isFormValid = 0;
			}

			if ($.trim($('#birthday').val()).length == 0) {
				$('#birthday').addClass("is-invalid");
				$('.hb-birthday').text("Birthday missing.");
				isFormValid = 0;
			}

			if ($.trim($('#email').val()).length == 0) {
				$('#email').addClass("is-invalid");
				$('.hb-email').text("Email missing.");
				isFormValid = 0;
			}

			if ($.trim($('#username').val()).length == 0) {
				$('#username').addClass("is-invalid");
				$('.hb-user').text("Username missing.");
				isFormValid = 0;
			}

			if ($.trim($('#password').val()).length == 0) {
				$('#password').addClass("is-invalid");
				$('.hb-pass').text("Password missing.");
				isFormValid = 0;
			}

			if ($.trim($('#vpassword').val()).length == 0) {
				$('#vpassword').addClass("is-invalid");
				$('.hb-vpass').text("Please confirm password.");
				isFormValid = 0;
			}

			if ($.trim($('#actcode').val()).length == 0) {
				$('#actcode').addClass("is-invalid");
				$('.hb-acode').text("Activation code is required.");
				isFormValid = 0;
			}

		//Form is valid, continue progress.
		if(isFormValid == 1) {
			//Checks username and password.
					var data = new FormData();
					data.append('fname', $('#fname').val());
					data.append('lname', $('#lname').val());
					data.append('email', $('#email').val());
					data.append('birthday', $('#birthday').val());
					data.append('username', $('#username').val());
					data.append('password', $('#password').val());
					data.append('actcode', $('#actcode').val());
					$.ajax({
						type: "POST",
						contentType: false,
						processData: false,
						cache: false,
						url: 'php/register-admin.php',
						data: data,
						success: function(data) {
							console.log(data);
							if(data == "servfailure") {
								window.location.href = "https://admin.prodasher.com/error-500.php";
							}
							if(data == "complete") {
								window.location.href = "https://admin.prodasher.com/dashboard-main.php";
							}
							if(data == "userExist") {
								swal("Uh Oh!", "Looks like this username already exist...", "error");
							}
							if(data == "emailExist") {
								swal("Uh Oh!", "Looks like this email already exist...", "error");
							}
						}
					});
				} else {
					swal("Uh Oh!", "Looks like some inputs need your attention...", "error");
				}
			});
});
