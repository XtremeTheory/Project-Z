<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
require 'functions.php';
require 'definitions.php';
$sid = test_input($_POST['sid']);
$uid = test_input($_POST['uid']);
$changeID = test_input($_POST['changeID']);
date_default_timezone_set("America/New_York");
$dateandtime = date("m-d-Y H:i:s");
$changeDef = ${'log'.$changeID};
$query = "SELECT * FROM store_data WHERE id = '$sid'";
$result = $test_db->query($query);
$storeinfo = $result->fetch_assoc();
$activity = $storeinfo['sname'] . " - " . $storeinfo['address'] . " : " . $changeDef;

$query = "INSERT INTO change_log (dateandtime, uid, activity) VALUES('$dateandtime', '$uid', '$activity')";
$result = $test_db->query($query);

if($result) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","log-change.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
