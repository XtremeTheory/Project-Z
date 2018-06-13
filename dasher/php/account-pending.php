<?php
captureIP('accountpending.php');
$status = "";

if(isset($_GET['code'])) {
	$status = $_GET['code'];
}
else if(isset($_SESSION['status'])) {
	$status = $_SESSION['status'];
}

if($status == "") {
	$_SESSION['status'] = "noneed";
	header("Location:login.php");
	exit();
}

if(isset($_GET['id'])) {
	$tempid = $_GET['id'];
	$_SESSION['tempid'] = $tempid;
} else {
	if(isset($_SESSION['tempid'])){
		$tempid = $_SESSION['tempid'];
	} else {
		$tempid = "";
	}
} ?>
