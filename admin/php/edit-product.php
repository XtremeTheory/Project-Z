<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
require 'functions.php';
$uid = test_input($_POST['uid']);
$pid = test_input($_POST['pid']);
$pname = test_input($_POST['pname']);
$brand = test_input($_POST['brand']);
$upc = test_input($_POST['upc']);
$dept = test_input($_POST['dept']);
$description = test_input($_POST['description']);
$measure = test_input($_POST['measure']);
$msize = test_input($_POST['msize']);
$approval = test_input($_POST['approval']);

if($approval == "pending") {
  $approval = 0;
} else if($approval == "approve") {
  $approval = 1;
} else {
  $approval = 2;
}

$query = "UPDATE product_list SET pname = '$pname', brand = '$brand', upc = '$upc', dept = '$dept', description = '$description' WHERE id = '$pid'";
$result = $test_db->query($query);
$query = "UPDATE product_list SET measure = '$measure', msize = '$msize', live = '$approval' WHERE id = '$pid'";
$result1 = $test_db->query($query);

if($result && $result1) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","edit-product.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
