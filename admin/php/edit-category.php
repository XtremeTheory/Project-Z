<?php
$cid = test_input($_POST['cid']);
$cname = test_input($_POST['cname']);
$uid = $_SESSION['uid'];

$query = "UPDATE categories SET cname = '$cname' WHERE id = '$cid'";
$result = $test_db->query($query);

if($result) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","edit-category.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
