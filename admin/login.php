<?php
captureIP('login.php');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Login for admin.">
  <title>Admin Login - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="assets/css/google-font.css" rel="stylesheet">
  <link href="assets/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/custom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
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
      background:url(assets/img/login.jpeg) no-repeat center center;
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
<body class="vertical-layout vertical-overlay-menu 1-column menu-expanded fixed-navbar blank-page" data-open="click" data-menu="vertical-overlay-menu" data-col="1-column">
  <div class="bg"></div>
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="app-assets/images/logo/logo.png">
              <h3 class="brand-text">Project Z</h3>
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
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="username" placeholder="Your Username" tabindex="1">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control input-lg required" id="password" placeholder="Enter Password" tabindex="2">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-md-left">
                          <fieldset>
                            <input type="checkbox" id="remember-me" class="chk-remember">
                            <label for="remember-me"> Remember Me</label>
                          </fieldset>
                        </div>
                        <div class="col-md-6 col-12 text-center text-md-right"><a href="recover-password.php" class="card-link">Forgot Password?</a></div>
                      </div>
                      <button type="button" id="loginSubmit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
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
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <script src="vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script>
  if($('.chk-remember').length) {
		$('.chk-remember').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
		});
	}

	//Any input field that has red error box will be cleared once clicked on and autocomplete turned off.
	$(document).off('focus', 'input').on('focus', 'input', function () {
		$(this).removeClass('is-invalid');
		$(this).attr('autocomplete', 'off');
	});
	//END

	$(document).off('click', '#loginSubmit').on('click', '#loginSubmit', function () {
	  var isFormValid = 1;
		var loginValid = 0;
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
	    //Checks username and password.
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
              console.log(data);
	            if(data == "servfailure") {
	              window.location.href = "https://admin.prodasher.com/error-500.php";
	            }
	            if(data == "complete") {
	              window.location.href = "https://admin.prodasher.com/dashboard-main.php";
	            }
							if(data == "wrongUser") {
	              swal("Uh Oh!", "Looks like this username doesn't exist...", "error");
	            }
							if(data == "wrongPass") {
	              swal("Uh Oh!", "Looks like a wrong password was typed...", "error");
	            }
              if(data == "changePass") {
	              window.location.href = "https://admin.prodasher.com/new-password.php";
	            }
              if(data == "accountLocked") {
	              window.location.href = "https://admin.prodasher.com/error-locked.php";
	            }
	          }
	        });
				}
			});
      <?php if(isset($_SESSION['successLogout'])) { ?>
        swal("Done!", "You have been logged out successfully.", "success");
      <?php unset($_SESSION['successLogout']); }
      if(isset($_SESSION['wrongPage'])) { ?>
        swal("Uh Oh!", "Doesn't look like you have access to that page.", "error");
      <?php unset($_SESSION['wrongPage']); }
      if(isset($_SESSION['sessExpired'])) {
        $_SESSION['uid'] = "";
        unset($_SESSION['uid']);
        $_SESSION['sessExpired'] = "";
        unset($_SESSION['sessExpired']);
        $_SESSION['tempid'] = "";
        unset($_SESSION['tempid']); ?>
        swal("Uh Oh!", "You're session has expired.  Please login again.", "error");
      <?php } ?>
    </script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
