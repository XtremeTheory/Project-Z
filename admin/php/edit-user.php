<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
require 'functions.php';
$uid = test_input($_POST['uid']);
$fname = test_input($_POST['fname']);
$lname = test_input($_POST['lname']);
$address = test_input($_POST['address']);
$address2 = test_input($_POST['address2']);
if($address2 == "undefined") { $address2 = ""; }
$zipcode = test_input($_POST['zipcode']);
$phonenum = test_input($_POST['phonenum']);
$email = test_input($_POST['email']);
$username = test_input($_POST['username']);
$usertype = test_input($_POST['usertype']);
$approval = test_input($_POST['approval']);

$query = "SELECT * FROM city_list WHERE zipcode = '$zipcode'";
$result = $test_db->query($query);
$cityinfo = $result->fetch_assoc();
$cid = $cityinfo['id'];

if($approval == "pending") {
  $approval = 0;
} else if($approval == "approve") {
  $approval = 1;
} else {
  $approval = 2;
}

$query = "UPDATE user_info SET fname = '$fname', lname = '$lname', address = '$address', address2 = '$address2', cid = '$cid' WHERE id = '$uid'";
$result = $test_db->query($query);
$query = "UPDATE user_info SET phonenum = '$phonenum', email = '$email', username = '$username', usertype = '$usertype', live = '$approval' WHERE id = '$uid'";
$result1 = $test_db->query($query);

if($result && $result1) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","edit-user.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
