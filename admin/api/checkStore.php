<?php
$sname = test_input($_POST['store']);
$token = $_POST['token'];
global $timestamp;
$apiresult = array();
$errors = array();
$store = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkStore.php","0",$sqlError);
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Issues with the server. It has been reported.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount != 1) {
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Invalid API token key.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM store_data WHERE sname = '$sname'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","getStore.php","0",$sqlError);
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Issues with the server. It has been reported.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount != 1) {
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Store is not in the system.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$prodinfo = $result->fetch_assoc();
$bid = $prodinfo['brand'];
$query1 = "SELECT * FROM brands WHERE id = '$bid'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","getProduct.php","0",$sqlError);
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Issues with the server. It has been reported.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$brandinfo = $result1->fetch_assoc();

$prod["pname"] = $prodinfo['pname'];
$prod["brand"] = $brandinfo['bname'];
$prod["dept"] = $prodinfo['dept'];
$prod["msize"] = $prodinfo['msize'];
$prod["mtype"] = $prodinfo['measure'];
$prod["exist"] = "true";
$errors["errorStatus"] = "false";
$apiresult["error"] = $errors;
$apiresult["prod"] = $prod;
echo json_encode($apiresult);
mysqli_close($test_db);
exit();
?>
