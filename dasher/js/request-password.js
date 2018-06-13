function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

$(document).off('click', '#requestPassword').on('click', '#requestPassword', function () {
  $('#sendCover').fadeIn();
  var isFormValid = 1;
  var emailValid = 0;

  $(".required").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = 0;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
      $('#sendCover').fadeOut();
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if(!isValidEmailAddress($('#email').val())) {
    isFormValid = 0;
    $('#sendCover').fadeOut();
    swal("Uh Oh!", "This does not seem to be an email address...", "error");
  }

  if(isFormValid == 1) {
        var data = new FormData();
        data.append('email', $('#email').val());
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/request-password.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://www.prodasher.com/error-500.php";
            }
            if(data == "complete") {
              emailValid = 1;
            }
            if(data == "wrongEmail") {
              emailValid = 2;
            }
          }
        }).done(continueRequest);

        function continueRequest() {
          if(emailValid == 1) {
            swal("Sent!", "Check your email, temporary password has been sent.", "success")
            .then((value) => {
              window.location.href = "https://dasher.prodasher.com/accountpending.php?code=verify";
            });
          }

          if(emailValid == 2) {
            $('#sendCover').fadeOut();
            swal("Uh Oh!", "Looks like this email doesn't exist...", "error");
          }
        }
      }
    });
