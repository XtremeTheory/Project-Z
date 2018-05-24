<?php
$uid = test_input($_POST['uid']);
$changeID = test_input($_POST['changeID']);
global $timestamp;
$changeDef = ${'log'.$changeID};

if(isset($_POST['sid'])) {
  $sid = test_input($_POST['sid']);
  $query = "SELECT * FROM store_data WHERE id = '$sid'";
  $result = $test_db->query($query);
  $storeinfo = $result->fetch_assoc();
  $cid = $storeinfo['cid'];
  $query1 = "SELECT * FROM city_list WHERE id = '$cid'";
  $result1 = $test_db->query($query1);
  $cityinfo = $result1->fetch_assoc();
  $activity = $storeinfo['sname'] . " " . $storeinfo['address'] . ", " . $cityinfo['zipcode'] . ": " . $changeDef;
}
if(isset($_POST['cuid'])) {
  $cuid = test_input($_POST['cuid']);
  $query = "SELECT * FROM user_info WHERE id = '$uid'";
  $result = $test_db->query($query);
  $userinfo = $result->fetch_assoc();
  $activity = $userinfo['fname'] . " " . $storeinfo['lname'] . " - ID # " . $userinfo['id'] . " " . $changeDef;
}
if(isset($_POST['pid'])) {
  $pid = test_input($_POST['pid']);
  $query = "SELECT * FROM product_list WHERE id = '$pid'";
  $result = $test_db->query($query);
  $productinfo = $result->fetch_assoc();
  $bid = $productinfo['brand'];
  $query1 = "SELECT * FROM brands WHERE id = '$bid'";
  $result1 = $test_db->query($query1);
  $brandinfo = $result1->fetch_assoc();
  $activity = $brandinfo['bname'] . " " . $productinfo['pname'] . " - UPC: " . $productinfo['upc'] . " " . $changeDef;
}

$query = "INSERT INTO change_log (dateandtime, uid, activity) VALUES('$timestamp', '$uid', '$activity')";
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
