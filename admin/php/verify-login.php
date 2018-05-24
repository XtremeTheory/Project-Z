<?php
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$encrypted = encryptIt( $password );
global $timestamp;
$query = "SELECT * FROM user_info WHERE username = '$username'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","verify-login.php","0",$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount != 1) {
  echo "wrongUser";
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();

if($userinfo['signedin'] == 4) {
  echo "accountLocked";
  mysqli_close($test_db);
  exit();
}

if($userinfo['passwd'] != $encrypted) {
  echo "wrongPass";
  mysqli_close($test_db);
  exit();
}

$uid = $userinfo['id'];

if($userinfo['signedin'] == 3) {
  $_SESSION['tempid'] = $uid;
  echo "changePass";
  mysqli_close($test_db);
  exit();
}

logActivity("1",$uid,"login.php");
$query = "UPDATE user_info SET signedin = '1', timestamp = '$timestamp' WHERE id = '$uid'";
$result = $test_db->query($query);

if($result) {
  $_SESSION['uid'] = $uid;
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","verify-login.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
