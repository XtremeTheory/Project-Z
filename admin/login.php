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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
  <style>
    @media only screen and (max-width: 600px) {
      .navbar-brand {
          margin-top: -35px;
        }
      }

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
</head>
<body class="vertical-layout vertical-overlay-menu 1-column menu-expanded fixed-navbar">
  <div class="bg"></div>
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow navbar-brand-center" data-nav="brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item">
            <a class="navbar-brand" href="/">
              <img class="brand-logo" alt="Pro Dasher Logo" src="app-assets/images/logo/logo.png">
              <h3 class="brand-text">Pro Dasher</h3>
            </a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end">
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
                      <h3 class="brand-text">Pro Dasher</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg required" id="username" placeholder="Your Username" tabindex="1" autocomplete="username">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control input-lg required" id="password" placeholder="Enter Password" tabindex="2" autocomplete="password">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-md-12 col-12 text-center"><a href="recover-password.php" class="card-link">Forgot Password?</a></div>
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
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script>
  var bg = $(".bg");
  function resizeBackground() {
    bg.height($(window).height() + 60);
  }

  $(window).resize(resizeBackground);
  resizeBackground();
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
	            if(data == "servfailure") {
	              window.location.href = "https://admin.prodasher.com/error-500.php";
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
                  window.location.href = "https://admin.prodasher.com" + plocation;
                } else {
                  window.location.href = "https://admin.prodasher.com/";
                }
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
      if(isset($_SESSION['newAccount'])) { ?>
        swal("Success!", "Your account has been setup.", "success");
      <?php unset($_SESSION['newAccount']); }
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
</body>
</html>
