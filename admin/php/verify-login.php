<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
require 'functions.php';
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$encrypted = encryptIt( $password );

$query = "SELECT * FROM user_info WHERE username = '$username'";
$result = $test_db->query($query);
$rowcount = mysqli_num_rows($result);

if($rowcount != 1) {
  echo "wrongUser";
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();

if($userinfo['passwd'] != $encrypted) {
  echo "wrongPass";
  mysqli_close($test_db);
  exit();
}

$uid = $userinfo['id'];
$query = "UPDATE user_info SET signedin = '1', timestamp = '$dateandtime' WHERE id = '$uid'";
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
