<?php
require 'functions.php';
global $timestamp;
$rand = substr(md5(microtime()),rand(0,26),8);
$query = "UPDATE security_steps SET shopactCode = '$rand', dateandtime = '$timestamp' WHERE codeID = '1'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","update-security.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

logActivity("12","0","update-secutity.php");
?>
