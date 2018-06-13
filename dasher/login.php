<!DOCTYPE html>
<html class="loading" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Login for dashers.">
  <title>Dasher Login - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body class="vertical-layout vertical-overlay-menu 1-column menu-expanded fixed-navbar">
  <div class="bg"></div>
  <div class="bgCover" id="theCover"></div>
  <div class="sendCover" id="sendCover"></div>
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow navbar-brand-center" data-nav="brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item">
            <a class="navbar-brand" href="/">
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
              <a class="nav-link mr-2 nav-link-label" href="https://www.prodasher.com/index.php"><i class="ficon ft-home"></i></a>
            </li>
            <li class="dropdown nav-item">
              <a class="nav-link mr-2 nav-link-label" href="https://prodasher.zendesk.com/hc/en-us" data-toggle="dropdown"><i class="ficon ft-help-circle"></i></a>
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
                      <h3 class="brand-text">Dasher Login</h3>
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
                      <button type="button" id="dasherSignup" class="btn btn-info btn-block btn-lg"><i class="ft-shopping-cart"></i> Become a Dasher</button>
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
  <script src="js/global.js" type="text/javascript"></script>
  <script src="js/login.js" type="text/javascript"></script>
  <script>
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
