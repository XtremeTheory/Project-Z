$(document).off('click', '#ver-submit').on('click', '#ver-submit', function () {
  console.log("Updating password...");
  $('#sendCover').fadeIn();
  var isFormValid = true;
  var user = $('#username').val();
  var vcode = $('#vcode').val();
  var pass = $('#pass').val();
  var verpass = $('#verpass').val();

  $(".required").each(function() {
    if ($.trim($(this).val()).length == 0) {
      isFormValid = false;
      swal("Uh Oh!", "Looks like some things are missing...", "error");
      $('#sendCover').fadeOut();
      $(this).addClass("is-invalid");
    }
  });

  if($('#pass').val().length < 8) {
    isFormValid = false;
    swal("Uh Oh!", "Password should be at least 8 characters long.", "error");
    $('#sendCover').fadeOut();
    $('#pass').addClass("is-invalid");
  }

  if(pass !== verpass) {
    isFormValid = false;
    swal("Uh Oh!", "Looks like your passwords don't match.", "error");
    $('#sendCover').fadeOut();
    $('#verpass').addClass("is-invalid");
  }

  if(isFormValid) {
    $.ajax({
      type: "POST",
      cache: false,
      url: 'php/updatepassword.php',
      data: {user: user, vcode: vcode, pass: pass},
      success: function(data) {
        console.log(data);
        if(data == "finished") {
          swal("Success!", "Your password has been updated. Try logging in again.", "success")
          .then((value) => {
            window.location.href = "https://dasher.prodasher.com/login.php";
          });
        }

        if(data == "wrongUser") {
          swal("Uh Oh!", "This username does not exist.", "error");
          $('#sendCover').fadeOut();
          $('#username').addClass("is-invalid");
        }

        if(data == "wrongVcode") {
          swal("Uh Oh!", "Verification code is incorrect.", "error");
          $('#sendCover').fadeOut();
          $('#vcode').addClass("is-invalid");
        }
      }
    });
  }
});
