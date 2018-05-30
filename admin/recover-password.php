<?php
captureIP('recover-password.php'); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Recover your lost password.">
  <title>Forgot Password - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
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
</head>
<body class="vertical-layout vertical-overlay-menu 1-column menu-expanded fixed-navbar blank-page" data-open="click" data-menu="vertical-overlay-menu" data-col="1-column">
  <div class="bg"></div>
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="/">
              <img class="brand-logo" alt="modern admin logo" src="app-assets/images/logo/logo.png">
              <h3 class="brand-text">Pro Dasher</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link mr-2 nav-link-label" onclick="window.history.go(-1); return false;"><i class="ficon ft-arrow-left"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-2 nav-link-label" href="index.php"><i class="ficon ft-home"></i></a>
            </li>
            <li class="dropdown nav-item">
              <a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-help-circle"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <?php require 'php/left-menu.php'; ?>
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
                    <h3 class="brand-text">Pro Dasher</h3>
                  </div>
                  <h6 class="text-center font-small-3">
                    <span>We will send you a link to reset password.</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control form-control-lg input-lg required" id="email" placeholder="Your Email Address">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                      </fieldset>
                      <button type="button" id="requestPassword" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i> Recover Password</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer border-0">
                  <p class="float-sm-left text-center"><a href="login.php" class="card-link">Login</a></p>
                  <p class="float-sm-right text-center">New to Pro Dasher? <a href="register-admin.php" class="card-link">Create Account</a></p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script>
  //Any input field that has red error box will be cleared once clicked on and autocomplete turned off.
  $(document).off('focus', 'input').on('focus', 'input', function () {
    $(this).removeClass('is-invalid');
    $(this).attr('autocomplete', 'off');
  });
  //END

  $(document).off('click', '#requestPassword').on('click', '#requestPassword', function () {
    var isFormValid = 1;
    var emailValid = 0;
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

    //Form is valid, continue progress.
    if(isFormValid == 1) {
      //Checks if email exists.
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
              console.log(data);
              if(data == "servfailure") {
                window.location.href = "https://admin.prodasher.com/error-500.php";
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
              $('#email').val('');
              swal("Sent!", "Check your email!", "success");
            }

            if(emailValid == 2) {
              swal("Uh Oh!", "Looks like this email doesn't exist...", "error");
            }
          }
        }
      });
    </script>
</body>
</html>
