<?php
$errFilename = test_input($_POST['errFilename']);
$errMessage = test_input($_POST['errMessage']);
$errLevel = test_input($_POST['errLevel']);
$uid = $_SESSION['uid'];
global $timestamp;
$ipadd = getIP();
$uOS = getOS();
$ubrowser = getBrowser();

$query = "INSERT INTO error_log (errorcode, filename, dateandtime, uid, errormessage, ipadd, uOS, ubrowser, level)
VALUES('0', '$errFilename', '$timestamp', '$uid', '$errMessage', '$ipadd', '$uOS', '$ubrowser', '$errLevel')";
$result = $test_db->query($query);

if($result) {
	echo "correct";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","add-error.php",$uid,$sqlError);
  echo $sqlError;
  mysqli_close($test_db);
  exit();
}
?>
