<?php
$pid = test_input($_POST['productID']);
$sid = test_input($_POST['storeID']);
$uid = test_input($_POST['userID']);
$price = test_input($_POST['price']);
$aisle = test_input($_POST['aisle']);
$location = test_input($_POST['location']);
$notes = test_input($_POST['notes']);
$token = $_POST['token'];
global $timestamp;
$a_json = array();
$a_json_row = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","editInv.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount != 1) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Invalid API token key.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$query = "INSERT INTO inventory_review (pid, sid, uid, aisle, location, price, dateandtime, notes)
VALUES('$pid','$sid','$uid','$aisle','$location','$price','$timestamp','$notes')";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","editInv.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$a_json_row["errorStatus"] = "false";
array_push($a_json, $a_json_row);
echo json_encode($a_json);
flush();
mysqli_close($test_db);
exit();
?>
