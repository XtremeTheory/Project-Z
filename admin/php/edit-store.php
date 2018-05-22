<?php
$sid = test_input($_POST['sid']);
$sname = test_input($_POST['sname']);
$address = test_input($_POST['address']);
$zipcode = test_input($_POST['zipcode']);
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

$query = "UPDATE store_data SET sname = '$sname', address = '$address', cid = '$cid', live = '$approval' WHERE id = '$sid'";
$result = $test_db->query($query);
if($result) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","edit-store.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
