<?php
require 'php/functions.php';
$ipadd = getIP();
$uOS = getOS();
$ubrowser = getBrowser();
date_default_timezone_set("America/New_York");
$dateandtime = date("m-d-Y H:i:s");
$fileName = $_SERVER['REQUEST_URI'];
$errMessage = "Page or File not found.";

if(isset($_SESSION['uid']) && $_SESSION['uid'] != ""){
  $uid = $_SESSION['uid'];
} else {
  $uid = "0";
}

$query = "INSERT INTO error_log (errorcode, filename, dateandtime, uid, errormessage, ipadd, uOS, ubrowser, level)
VALUES('4', '$fileName', '$dateandtime', '$uid', '$errMessage', '$ipadd', '$uOS', '$ubrowser', '2')";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","error-404.php",$uid,$sqlError);
  echo $sqlError;
  mysqli_close($test_db);
  exit();
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>Error 404 - Project Z</title>
  <link rel="apple-touch-icon" href="<?php echo $path;?>admin/app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>admin/app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo $path;?>admin/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo $path;?>admin/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo $path;?>admin/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $path;?>admin/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $path;?>admin/app-assets/css/pages/error.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo $path;?>admin/assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-overlay-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar" data-open="click" data-menu="vertical-overlay-menu" data-col="1-column">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="<?php echo $path;?>/admin/app-assets/images/logo/logo.png">
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
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="<?php echo $path;?>/index.php"><i class="ficon ft-home"></i></a></li>
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
        <div class="col-sm-5 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4 box-shadow-2">
          <div class="card border-grey border-lighten-3 px-2 my-0 row">
            <div class="card-header no-border pb-1">
              <div class="card-body">
                <h2 class="error-code text-center mb-2">404</h2>
                <h3 class="text-uppercase text-center">Looks like you took a wrong turn</h3>
              </div>
            </div>
            <div class="card-content px-2">
              <fieldset class="row py-1">
                <div class="input-group col-12">
                  <input type="text" class="form-control border-grey border-lighten-1" placeholder="Search..." aria-describedby="button-addon2">
                  <span class="input-group-append" id="button-addon2">
                    <button class="btn btn-lg btn-secondary border-grey border-lighten-1" type="button"><i class="la la-search"></i></button>
                  </span>
                </div>
              </fieldset>
              <div class="row py-2">
                <div class="col-12">
                  <a href="<?php header('Location: ' . $_SERVER['HTTP_REFERER']); ?>" class="btn btn-primary btn-block btn-lg"><i class="la la-home"></i> Back </a>
                </div>
              </div>
            </div>
            <div class="card-footer no-border pb-1">
              <div class="text-center">
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook">
                  <span class="la la-facebook"></span>
                </a>
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter">
                  <span class="la la-twitter"></span>
                </a>
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin">
                  <span class="la la-linkedin font-medium-4"></span>
                </a>
                <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github">
                  <span class="la la-github font-medium-4"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo $path;?>admin/js/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo $path;?>admin/js/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo $path;?>admin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo $path;?>admin/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo $path;?>admin/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo $path;?>admin/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>