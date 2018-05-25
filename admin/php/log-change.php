<?php
$uid = $_SESSION['uid'];
$changeID = test_input($_POST['changeID']);
$pagename = test_input($_POST['pagename']);
global $timestamp;
$ipadd = getIP();
$ubrowser = getBrowser();
$uOS = getOS();

$query = "INSERT INTO activity_log (activityID, ipadd, ubrowser, uOS, uid, timestamp, pagename) VALUES('$changeID', '$ipadd', '$ubrowser', '$uOS', '$uid', '$timestamp', '$pagename')";
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
