<?php
$storezip = test_input($_POST['storezip']);
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

$query = "SELECT * FROM city_list WHERE zipcode = '$storezip'";
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
  $errors["errorMessage"] = "Incorrect zip code.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$zipinfo = $result->fetch_assoc();
$zid = $zipinfo['id'];
$query1 = "SELECT * FROM store_data WHERE cid = '$zid'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkStore.php","0",$sqlError);
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Issues with the server. It has been reported.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$storeinfo = $result1->fetch_assoc();

$store["sname"] = $storeinfo['sname'];
$store["address"] = $storeinfo['address'];
$errors["errorStatus"] = "false";
$apiresult["error"] = $errors;
$apiresult["store"] = $store;
echo json_encode($apiresult);
mysqli_close($test_db);
exit();
?>
