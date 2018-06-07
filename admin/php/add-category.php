<?php
$cname = test_input($_POST['cname']);
$uid = $_SESSION['uid'];

$query = "INSERT INTO categories (cname, uid) VALUES('$cname', '$uid')";
$result = $test_db->query($query);

if($result) {
	echo "correct";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","add-category.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
