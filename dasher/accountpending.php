<?php require 'php/account-pending.php'; ?>
<!DOCTYPE html>
<html class="loading" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Login for dashers.">
  <title>Reset Password - Pro Dasher</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.min.css">
  <link rel="stylesheet" type="text/css" href="css/global.css">
  <link rel="stylesheet" type="text/css" href="css/accountpending.css">
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
	<?php if($status == "pass") { ?>
		<h3 class="brand-text">Set New Password</h3>
</div>
</div>
<div class="card-content">
<div class="card-body">
	<form class="form-horizontal">
		<fieldset class="form-group position-relative has-icon-left">
			<input type="text" class="form-control input-lg required" id="email" placeholder="Email" tabindex="1" autocomplete="email">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3"></div>
		</fieldset>
		<fieldset class="form-group position-relative has-icon-left">
			<input type="text" class="form-control input-lg required" id="temppass" placeholder="Temporary Password" tabindex="2" value="<?php echo $tempid; ?>">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3"></div>
		</fieldset>
		<fieldset class="form-group position-relative has-icon-left">
			<input type="password" class="form-control input-lg required" id="pass" placeholder="New Password" tabindex="3">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3"></div>
		</fieldset>
		<fieldset class="form-group position-relative has-icon-left">
			<input type="password" class="form-control input-lg required" id="verpass" placeholder="Verify New Password" tabindex="4">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3"></div>
		</fieldset>
				<button type="button" id="pass-submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> Set New Password</button>
			</form>
		</div>
	</div>
	<?php }

	if($status == "verify") { ?>
		<h3 class="brand-text">Verify Ownership</h3>
</div>
</div>
<div class="card-content">
<div class="card-body">
	<form class="form-horizontal">
		<fieldset class="form-group position-relative has-icon-left">
			<input type="text" class="form-control input-lg required" id="username" placeholder="Username" tabindex="1" autocomplete="username">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3">*Same username you have used in the past to login.</div>
		</fieldset>
		<fieldset class="form-group position-relative has-icon-left">
			<input type="text" class="form-control input-lg required" id="vcode" placeholder="Verification Code" tabindex="2" value="<?php if(isset($_GET['hash'])){ echo $_GET['hash']; }?>">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3">*Verification code can be retrieved from the email on file.</div>
		</fieldset>
    <fieldset class="form-group position-relative has-icon-left">
			<input type="password" class="form-control input-lg required" id="pass" placeholder="New Password" tabindex="3" autocomplete="password">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3">*Passwords should be at least 8 characters long.</div>
		</fieldset>
		<fieldset class="form-group position-relative has-icon-left">
			<input type="password" class="form-control input-lg required" id="verpass" placeholder="Verify New Password" tabindex="4" autocomplete="verpassword">
			<div class="form-control-position">
				<i class="ft-user"></i>
			</div>
			<div class="help-block font-small-3">*Make sure this matches the same as above. Case sensitive.</div>
		</fieldset>
		<div class="form-group row">
			<div class="col-md-12 col-12 text-center"><span class="helper-text login">No email yet? <a href="#" id="sendagain">Send Again</a></span></div>
			<div class="col-md-12 col-12 text-center"><span class="helper-text login">Login instead? <a href="login.php">Login</a></span></div>
		</div>
				<button type="button" id="ver-submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> Password Reset</button>
			</form>
		</div>
	</div>
	<?php } ?>
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
<script src="js/accountpending.js" type="text/javascript"></script>
<script>
		<?php if(isset($_SESSION['tempsent'])) { ?>
			swal("Done!", "Temporary password has been sent to your email.", "success");
		<?php unset($_SESSION['tempsent']); } ?>
	</script>
</body>
</html>
