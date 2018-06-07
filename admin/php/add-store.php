<?php
$sname = test_input($_POST['sname']);
$address = test_input($_POST['address']);
$zipcode = test_input($_POST['zipcode']);
$query = "SELECT * FROM store_data WHERE address = '$address'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","add-store.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount == 1) {
  echo "storeExist";
  mysqli_close($test_db);
  exit();
}

$query1 = "SELECT * FROM city_list WHERE zipcode = '$zipcode'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","add-store.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$info = $result1->fetch_assoc();
$cid = $info['id'];
$approval = 0;
$uid = $_SESSION['uid'];
global $timestamp;

$query = "INSERT INTO store_data (sname, address, cid, uid, live, dateadded) VALUES('$sname', '$address', '$cid', '$uid', '$approval', '$timestamp')";
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
