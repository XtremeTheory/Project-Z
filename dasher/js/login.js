$(document).off('click', '#dasherSignup').on('click', '#dasherSignup', function () {
  window.location.href = "https://dasher.prodasher.com/application/";
});

$(document).off('click', '#loginSubmit').on('click', '#loginSubmit', function () {
  var isFormValid = 1;
  var loginValid = 0;

  $(".required").each(function() {
    if ($.trim($(this).val()).length == 0) {
      $(this).addClass("is-invalid");
      isFormValid = 0;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if(isFormValid == 1) {
        var data = new FormData();
        data.append('username', $('#username').val());
        data.append('password', $('#password').val());
        $.ajax({
          type: "POST",
          contentType: false,
          processData: false,
          cache: false,
          url: 'php/verify-login.php',
          data: data,
          success: function(data) {
            if(data == "servfailure") {
              window.location.href = "https://www.prodasher.com/error-500.php";
            }
            if(data == "complete") {
              var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

                for (i = 0; i < sURLVariables.length; i++) {
                  sParameterName = sURLVariables[i].split('=');

                  if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                  }
                }
              };

              var plocation = getUrlParameter('location');

              if(plocation != "" && typeof plocation != 'undefined') {
                window.location.href = "https://dasher.prodasher.com" + plocation;
              } else {
                window.location.href = "https://dasher.prodasher.com/";
              }
            }
            if(data == "wrongUser") {
              swal("Uh Oh!", "Looks like this username doesn't exist...", "error");
            }
            if(data == "noDasher") {
              swal({
                title: "<i>Uh Oh!</i>",
                html: "Doesn't look like you're a Dasher yet.<br>Report to Mission Control.",
                confirmButtonText: "Roger That",
              });
            }
            if(data == "wrongPass") {
              swal("Uh Oh!", "Looks like a wrong password was typed...", "error");
            }
            if(data == "changePass") {
              window.location.href = "https://www.prodasher.com/new-password.php";
            }
            if(data == "accountLocked") {
              window.location.href = "https://dasher.prodasher.com/error-locked.php";
            }
          }
        });
      }
    });
