<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
require 'functions.php';
require 'definitions.php';
$username = test_input($_POST['username']);
$activityID = test_input($_POST['activityID']);
$pageName = test_input($_POST['pageName']);
$query = "SELECT * FROM user_info WHERE username = '$username'";
$result = $test_db->query($query);

if(!$result) {
  //Failed to connect to database.
  $sqlError = mysqli_error($test_db);
  logError("1","log-activity.php","0",$sqlError);
  header("Location:".$path."admin/error-500.php");
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();
$uid = $userinfo['id'];
$ipadd = getIP();
$ubrowser = getBrowser();
$uOS = getOS();

$query = "INSERT INTO activity_log (activityID, ipadd, ubrowser, uOS, uid, timestamp, pagename)
VALUES('$activityID', '$ipadd', '$ubrowser', '$uOS', '$uid', '$timestamp', '$pageName')";
$result = $test_db->query($query);

if($result) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  //Failed to connect to database.
  $sqlError = mysqli_error($test_db);
  logError("1","log-activity.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
