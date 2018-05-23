<?php
captureIP('index.php');
?>
﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="description" content="Pro Dasher, an upcoming web application for everyone to use.">
<meta name="author" content="DRM Web Design">
<meta property="og:title" content="Pro Dasher" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.prodasher.com/" />
<meta property="og:image" content="https://www.prodasher.com/assets/img/overview.jpg" />
<meta property="og:description" content="Pro Dasher is still under development.  Stay tuned!" />
<!--[if IE]><link rel="shortcut icon" href="assets/img/icons/favicon.ico"><![endif]-->
<link rel="icon" href="favicon.ico">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<title>Pro Dasher - Coming Soon!</title>
<!--CSS-->
<link rel="stylesheet" href="assets/comingsoon/css/style.css">
<link rel="stylesheet" href="assets/comingsoon/css/bootstrap-light.css">
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<!--JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="assets/comingsoon/js/jquery.plugin.js"></script>
<script src="assets/comingsoon/js/jquery.countdown.js"></script>
<script>
$(function () {
	$('#defaultCountdown').countdown({until: new Date(2018, 8-1, 1)});
});
</script>
</head>
<body>
<div class="overlay"></div>
<div id="wrap">
	<div class="container">
		<h1>
			Going <span class="yellow">Above and Beyond.</span>
		</h1>
		<p>Our site is currently <strong>under construction</strong> but we are working hard<br/>
			to create a new and fresh environment.  Keep checking back for some exciting news.</p>
		<div id="defaultCountdown"></div><br><br>
		<center><strong>Contributers!</strong> <a href="admin/login.php">Login here</a></cemter>
	<p class="copyright">Pro Dasher &copy; 2008 - <?php echo date("Y"); ?> All Rights Reserved.</p>
	</div>
</div>
</body>
</html>
