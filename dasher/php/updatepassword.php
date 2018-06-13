<?php
global $timestamp;
global $dasherpath;
$user = test_input($_POST['user']);
$vcode = test_input($_POST['vcode']);
$pass = test_input($_POST['pass']);
$checkuser = "SELECT * FROM user_info WHERE username = '$user'";
$userresult = $test_db->query($checkuser);

if(!$userresult) {
	$sqlError = mysqli_error($test_db);
	logError("1","updatepassword.php","0",$sqlError);
	header("Location:".$dasherpath."error-500.php");
	mysqli_close($test_db);
	exit();
}

$user_rows = mysqli_num_rows($userresult);

if ($user_rows != 1) {
  echo "wrongUser";
  exit();
}

$user = $userresult->fetch_assoc();
$encrypted = encryptIt($vcode);

if($user['passwd'] != $encrypted) {
  echo "wrongVcode";
  exit();
}

$uid = $user['id'];
$newencrypt = encryptIt($pass);
$query = "UPDATE user_info SET signedin = '0', passwd = '$newencrypt', timestamp = '$timestamp', acctAttempts = '3' WHERE id = '$uid'";
$result = $test_db->query($query);

if(!$result) {
	$sqlError = mysqli_error($test_db);
	logError("1","updatepassword.php","0",$sqlError);
	header("Location:".$dasherpath."error-500.php");
	mysqli_close($test_db);
	exit();
}

unset($_SESSION['uid']);
logActivity("6",$uid,"updatepassword.php");
echo "finished";
mysqli_close($test_db);
exit();
