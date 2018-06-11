<?php
captureIP('dasher/index.php');
verifyDasher("dasher/index.php");
$uid = $_SESSION['uid'];
$did = $_SESSION['did'];
$query = "SELECT * FROM dasher_info WHERE did = '$did'";
$result = $test_db->query($query);
$dasherinfo = $result->fetch_assoc();
$rating = $dasherinfo['rating'];
$score = $dasherinfo['score'];
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Main dashboard.">
  <title>Main Dashboard - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vertical-menu-modern.min.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body class="vertical-layout vertical-menu-modern fixed-navbar pace-done menu-expanded" data-col="2-columns">
  <?php require 'php/navigation.php';
  require 'php/left-menu.php'; ?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <center><h3 class="info"><?php echo $rating; ?></h3>
                      <h6>Current Rating</h6></center>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <center><h3 class="danger">468</h3>
                      <h6>All Time Orders Completed</h6></center>
                    </div>
                    <div>
                      <i class="icon-basket-loaded danger font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <center><h3 class="info">41</h3>
                      <h6>Dashers in District</h6></center>
                    </div>
                    <div>
                      <i class="icon-user-follow info font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <center><h3 class="success"><?php echo $score; ?></h3>
                      <h6>Dasher Score</h6></center>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
  <script src="app-assets/js/app-menu.min.js" type="text/javascript"></script>
  <script src="app-assets/js/app.min.js" type="text/javascript"></script>
  <?php if(isset($_SESSION['wrongPage'])) { ?>
    <script>swal("Uh Oh!", "Doesn't look like you have access to that page.", "error");</script>
  <?php unset($_SESSION['wrongPage']); } ?>
</body>
</html>
