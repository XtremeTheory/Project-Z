$(document).ready(function(){
	'use strict';

	function isValidEmailAddress(emailAddress) {
	  var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	  return pattern.test(emailAddress);
	}

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
		var theID = ".hb-" + $(this).attr('id');
		$(theID).text("");
	});

	$(document).off('click', '#registerSubmit').on('click', '#registerSubmit', function () {
		$('.hb-agreeTerms').text("");
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
			} else {
				if(!isValidEmailAddress($('#email').val())) {
					isFormValid = 0;
					$("#email").addClass("is-invalid");
					$('.hb-email').text("This email is not a valid email address. Please try a different one.");
					$("#email").val("");
				}
			}

			if ($.trim($('#username').val()).length == 0) {
				$('#username').addClass("is-invalid");
				$('.hb-username').text("Username missing.");
				isFormValid = 0;
			}

			if ($.trim($('#password').val()).length == 0) {
				$('#password').addClass("is-invalid");
				$('.hb-password').text("Password missing.");
				isFormValid = 0;
			}

			if ($.trim($('#vpassword').val()).length == 0) {
				$('#vpassword').addClass("is-invalid");
				$('.hb-vpassword').text("Please confirm password.");
				isFormValid = 0;
			}

			if($('#password').val() != $('#vpassword').val()) {
				$('#vpassword').addClass("is-invalid");
				$('.hb-vpassword').text("Passwords do not match.");
				isFormValid = 0;
			}

			if ($.trim($('#actcode').val()).length == 0) {
				$('#actcode').addClass("is-invalid");
				$('.hb-actcode').text("Activation code is required.");
				isFormValid = 0;
			}

			if (!$("#agreeTerms").is(":checked")) {
				$('#agreeTerms').css('outline-color', 'red');
				$('#agreeTerms').css('outline-style', 'solid');
				$('#agreeTerms').css('outline-width', 'thin');
				$('.hb-agreeTerms').text("Please accept the Terms and Conditions.");
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
						url: 'php/register-submit.php',
						data: data,
						success: function(data) {
							console.log(data);
							if(data == "servfailure") {
								window.location.href = "https://admin.prodasher.com/error-500.php";
							}
							if(data == "complete") {
								window.location.href = "https://admin.prodasher.com/login.php";
							}
							if(data == "userExist") {
								swal("Uh Oh!", "Looks like this username already exist...", "error");
								$("#username").addClass("is-invalid");
							}
							if(data == "emailExist") {
								swal("Uh Oh!", "Looks like this email already exist...", "error");
								$("#email").addClass("is-invalid");
							}
							if(data == "wrongAct") {
								swal("Uh Oh!", "Looks like this is the wrong activation code...", "error");
								$("#actcode").addClass("is-invalid");
							}
						}
					});
				} else {
					swal("Uh Oh!", "Looks like some inputs need your attention...", "error");
				}
			});
});
