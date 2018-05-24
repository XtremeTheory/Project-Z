<?php
global $path;
global $timestamp;
$url = "https://admin.prodasher.com/login.php";

if(isset($_SESSION['uid']) && $_SESSION['uid'] != "") {
	$uid = $_SESSION['uid'];
} else {
	$_SESSION['uid'] = "";
	unset($_SESSION['uid']);
	$_SESSION['tempid'] = "";
	unset($_SESSION['tempid']);
	$_SESSION['sessExpired'] = TRUE;
	header('Location: '.$url);
	exit();
}

$verify_user = "UPDATE user_info SET signedin = '0', timestamp = '$timestamp' WHERE id = '$uid'";
$result = $test_db->query($verify_user);

if($result) {
	$_SESSION['successLogout'] = TRUE;
	$_SESSION['uid'] = "";
	unset($_SESSION['uid']);
	$_SESSION['sessExpired'] = "";
	unset($_SESSION['sessExpired']);
	$_SESSION['tempid'] = "";
	unset($_SESSION['tempid']);
	logActivity("2",$uid,"logout.php");
	header('Location: '.$url);
	mysqli_close($test_db);
	exit();
} else {
	$sqlError = mysqli_error($test_db);
	logError("1","logout.php",$uid,$sqlError);
	header("Location:".$path."error-500.php");
	mysqli_close($test_db);
	exit();
}
?>
