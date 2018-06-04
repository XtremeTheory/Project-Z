<?php
$pid = test_input($_POST['productID']);
$sid = test_input($_POST['storeID']);
$token = $_POST['token'];
global $timestamp;
$a_json = array();
$a_json_row = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkInv.php","0",$sqlError);
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

$query = "SELECT * FROM product_store_data WHERE pid = '$pid' AND sid = '$sid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkInv.php","0",$sqlError);
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
  $a_json_row["errorStatus"] = "false";
  $a_json_row["exist"] = "false";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$query1 = "SELECT * FROM inventory_review WHERE pid = '$pid' AND sid = '$sid'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkInv.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$rowcount1 = mysqli_num_rows($result1);

if($rowcount1 == 1) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["status"] = "inReview";
  $a_json_row["errorMessage"] = "This inventory is already being reviewed.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$invinfo = $result->fetch_assoc();
$a_json_row ["errorStatus"] = "false";
$a_json_row ["exist"] = "true";
$a_json_row ["price"] = $invinfo['price'];
$a_json_row ["aisle"] = $invinfo['aisle'];
$a_json_row ["location"] = $invinfo['location'];
$a_json_row ["notes"] = $invinfo['notes'];
array_push($a_json, $a_json_row);
echo json_encode($a_json);
flush();
mysqli_close($test_db);
exit();
?>
