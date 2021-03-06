<?php
captureIP('register-admin.php');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Admin sign up for an account here.">
  <title>Admin Registration - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="vendors/css/forms/icheck/custom.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
</head>
<body class="vertical-layout vertical-overlay-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-overlay-menu" data-col="1-column">
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="/">
              <img class="brand-logo" alt="Pro Dasher Logo" src="app-assets/images/logo/logo.png">
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
            <div class="col-md-5 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0 pb-0">
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Please Sign Up</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal">
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" id="fname" class="form-control input-lg required" placeholder="First Name" tabindex="1">
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                            <div class="hb-fname font-small-3"></div>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="text" id="lname" class="form-control input-lg required" placeholder="Last Name" tabindex="2">
                            <div class="form-control-position">
                              <i class="ft-user"></i>
                            </div>
                            <div class="hb-lname font-small-3"></div>
                          </fieldset>
                        </div>
                      </div>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" id="birthday" class="form-control input-lg required" placeholder="Your Birthday" tabindex="3">
                        <div class="form-control-position">
                          <i class="la la-birthday-cake"></i>
                        </div>
                        <div class="hb-birthday font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" name="email" id="email" class="form-control input-lg required" placeholder="Email Address" tabindex="4">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        <div class="hb-email font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" id="username" class="form-control input-lg required" placeholder="Username" tabindex="5">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="hb-username font-small-3"></div>
                      </fieldset>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password" id="password" class="form-control input-lg required"
                            placeholder="Password" tabindex="6">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="hb-password font-small-3"></div>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" id="vpassword" class="form-control input-lg required"
                            placeholder="Confirm Password" tabindex="7">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="hb-vpassword font-small-3"></div>
                          </fieldset>
                        </div>
                      </div>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" id="actcode" class="form-control input-lg required" placeholder="Activation Code" tabindex="8">
                        <div class="form-control-position">
                          <i class="la la-unlock"></i>
                        </div>
                        <div class="hb-actcode font-small-3"></div>
                      </fieldset>
                      <div class="row mb-1">
                        <div class="col-4 col-sm-3 col-md-3">
                          <fieldset>
                            <input type="checkbox" id="agreeTerms" class="chk-remember required">
                            <label for="agreeTerms"> I Agree</label>
                          </fieldset>
                        </div>
                        <div class="col-8 col-sm-9 col-md-9">
                          <p class="font-small-3 agreeTerms">By clicking Register, you agree to the <a href="#" data-toggle="modal"
                            data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.</p>
                        </div>
                        <div class="hb-agreeTerms font-small-3"></div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <button type="button" id="registerSubmit" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i> Register</button>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <a href="login.php" class="btn btn-danger btn-lg btn-block"><i class="ft-unlock"></i> Login</a>
                        </div>
                      </div>
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
  <script src="vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="js/maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
  <script src="js/register-admin.js" type="text/javascript"></script>
</body>
</html>
