<?php
$storezip = test_input($_POST['storezip']);
$token = $_POST['token'];
global $timestamp;
$a_json = array();
$a_json_row = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkStore.php","0",$sqlError);
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

$query = "SELECT * FROM city_list WHERE zipcode = '$storezip'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkStore.php","0",$sqlError);
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
  $a_json_row["errorMessage"] = "Incorrect zip code.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
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
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$rowcount1 = mysqli_num_rows($result1);

if($rowcount1 == 0) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "No stores in that zone yet.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

while($row = mysqli_fetch_assoc($result1)) {
  $a_json_row["errorStatus"] = "false";
  $a_json_row["storename"] = $row['sname'];
  $a_json_row["address"] = $row['address'];
  $a_json_row["storeid"] = $row['id'];
  array_push($a_json, $a_json_row);
}
echo json_encode($a_json);
flush();
mysqli_close($test_db);
exit();
?>
