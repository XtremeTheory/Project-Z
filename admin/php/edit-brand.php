<?php
$bid = test_input($_POST['bid']);
$bname = test_input($_POST['bname']);
$uid = $_SESSION['uid'];

$query = "UPDATE brands SET bname = '$bname' WHERE id = '$bid'";
$result = $test_db->query($query);

if($result) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","edit-brand.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
