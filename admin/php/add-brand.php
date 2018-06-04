<?php
$bname = test_input($_POST['bname']);
$uid = $_SESSION['uid'];

$query = "INSERT INTO brands (bname, uid) VALUES('$bname', '$uid')";
$result = $test_db->query($query);

if($result) {
	echo "correct";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","add-brand.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
