<?php
captureIP('recover-password.php');
verifyAuth("1","new-password.php"); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Set your new password for your account.">
  <title>Set New Password - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="assets/css/google-font.css" rel="stylesheet">
  <link href="assets/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <style>
  .is-invalid {
      border-color: #19b9e7 !important;
      background-color: #BD362F !important;
      color: #FFFFFF !important;
    }

    .is-invalid::-webkit-input-placeholder { /* Chrome/Opera/Safari */
      color: white !important;
    }
    .is-invalid::-moz-placeholder { /* Firefox 19+ */
      color: white !important;
    }
    .is-invalid:-ms-input-placeholder { /* IE 10+ */
      color: white !important;
    }
    .is-invalid:-moz-placeholder { /* Firefox 18- */
      color: white !important;
    }
    .bg {
      background:url(assets/img/password.jpg) no-repeat center center;
      background-repeat:no-repeat;
      background-attachment:fixed;
      background-position:center center;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover; position:fixed;
      width:100%;
      height:100%;
      left:0px;
      top:0px;
      z-index:-1;
    }
  </style>
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-overlay-menu 1-column menu-expanded blank-page" data-open="click" data-menu="vertical-overlay-menu" data-col="1-column">
  <div class="bg"></div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="app-assets/images/logo/logo-dark.png" alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Input your new password.</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control form-control-lg input-lg required" id="dob" placeholder="Your Birthday">
                        <div class="form-control-position">
                          <i class="ft-calendar"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg required" id="password" placeholder="New Password">
                        <div class="form-control-position">
                          <i class="ft-shield"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg required" id="cPassword" placeholder="Confirm New Password">
                        <div class="form-control-position">
                          <i class="ft-shield"></i>
                        </div>
                      </fieldset>
                      <button type="button" id="changePassword" class="btn btn-outline-info btn-lg btn-block"><i class="ft-edit-3"></i> Change Password</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer border-0">
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- BEGIN VENDOR JS-->
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script>
  //Any input field that has red error box will be cleared once clicked on and autocomplete turned off.
  $(document).off('focus', 'input').on('focus', 'input', function () {
    $(this).removeClass('is-invalid');
    $(this).attr('autocomplete', 'off');
  });
  //END

  var x = 2;
  $(document).off('click', '#changePassword').on('click', '#changePassword', function () {
    var isFormValid = 1;
    var passValid = 0;
    if(x <= 0) {
      $.ajax({
        type: "POST",
        contentType: false,
        processData: false,
        cache: false,
        url: 'php/lock-account.php',
        success: function(data) {
          if(data == "servfailure") {
            window.location.href = "https://admin.prodasher.com/error-500.php";
          }
          if(data == "complete") {
            window.location.href = "https://admin.prodasher.com/error-locked.php";
          }
        }
      });
    }
    //Checks each field is not empty.
    $(".required").each(function() {
      if ($.trim($(this).val()).length == 0) {
        $(this).addClass("is-invalid");
        isFormValid = 0;
        swal("Uh Oh!", "Looks like some things are missing...", "error");
      } else {
        $(this).removeClass("is-invalid");
      }
    });

    if($('#password').val() != $('#cPassword').val()) {
      $('#password').addClass("is-invalid");
      $('#cPassword').addClass("is-invalid");
      isFormValid = 0;
      swal("Uh Oh!", "Looks like the passwords don't match...", "error");
    }

    //Form is valid, continue progress.
    if(isFormValid == 1) {
      //Checks if email exists.
          var data = new FormData();
          data.append('password', $('#password').val());
          data.append('dob', $('#dob').val());
          data.append('attempts', x);
          $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: 'php/change-password.php',
            data: data,
            success: function(data) {
              console.log(data);
              if(data == "servfailure") {
                window.location.href = "https://admin.prodasher.com/error-500.php";
              }
              if(data == "complete") {
                passValid = 1;
              }
              if(data == "wrongDOB") {
                passValid = 2;
              }
              if(data == "maxTimes") {
                passValid = 3;
              }
            }
          }).done(continueRequest);

          function continueRequest() {
            if(passValid == 1) {
              swal("Success!","Your password has successfully been changed!.","success")
              .then((value) => {
                window.location.href = "https://admin.prodasher.com/dashboard-main.php";
              });
            }

            if(passValid == 2) {
              if(x == 1) {
                daWord = "attempt";
              } else {
                daWord = "attempts";
              }
              swal("Uh Oh!", "Looks like the birthday is incorrect... " + x + " more " + daWord + ".", "error");
              x--;
            }

            if(passValid == 3) {
              $.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                cache: false,
                url: 'php/lock-account.php',
                success: function(data) {
                  if(data == "servfailure") {
                    window.location.href = "https://admin.prodasher.com/error-500.php";
                  }
                  if(data == "complete") {
                    window.location.href = "https://admin.prodasher.com/error-locked.php";
                  }
                }
              });
            }
          }
        }
      });
    </script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
