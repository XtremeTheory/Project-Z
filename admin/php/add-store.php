<?php
$sname = test_input($_POST['sname']);
$address = test_input($_POST['address']);
$zipcode = test_input($_POST['zipcode']);
$query = "SELECT * FROM city_list WHERE zipcode = '$zipcode'";
$result = $test_db->query($query);
$info = $result->fetch_assoc();
$cid = $info['id'];
$approval = 0;
$uid = 1;
date_default_timezone_set("America/New_York");
$dateandtime = date("m-d-Y H:i:s");

$query = "INSERT INTO store_data (sname, address, cid, uid, live, dateadded) VALUES('$sname', '$address', '$cid', '$uid', '$approval', '$dateandtime')";
$result = $test_db->query($query);

if($result) {
	echo "correct";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","add-store.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
