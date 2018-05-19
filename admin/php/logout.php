<?php
session_start();
require 'functions.php';
global $path;
global $timestamp;
$url = "https://www.bodtracker.com/admin/login.php";

if(isset($_SESSION['uid']) && $_SESSION['uid'] != "") {
	$uid = $_SESSION['uid'];
} else {
	$_SESSION = array();
	session_destroy();
	header('Location: '.$url.'?sessexpired=TRUE');
	exit();
}

$verify_user = "UPDATE user_info SET signedin = '0', timestamp = '$timestamp' WHERE id = '$uid'";
$result = $test_db->query($verify_user);

if($result) {
	logActivity("logOut",$uid);
	header('Location: '.$url);
	mysqli_close($test_db);
	exit();
} else {
	$sqlError = mysqli_error($test_db);
	logError("1","logout.php",$uid,$sqlError);
	header("Location:".$path."admin/error-500.php");
	mysqli_close($test_db);
	exit();
}
?>
