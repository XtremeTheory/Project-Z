<?php
$uid = test_input($_POST['uid']);
$pname = test_input($_POST['pname']);
$brand = test_input($_POST['brand']);
$dept = test_input($_POST['dept']);
$upc = test_input($_POST['upc']);
$msize = test_input($_POST['msize']);
$mtype = test_input($_POST['mtype']);
$mtype = strtolower($mtype);
$image = $_POST['image'];
$token = $_POST['token'];
global $timestamp;
$a_json = array();
$a_json_row = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","addProduct.php","0",$sqlError);
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

$query1 = "SELECT * FROM brands WHERE bname = '$brand'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","addProduct.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$rowcount1 = mysqli_num_rows($result1);

if($rowcount1 != 1) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Invalid brand name.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$brandinfo = $result1->fetch_assoc();
$bid = $brandinfo['id'];
$query = "INSERT INTO product_list (pname, brand, upc, dept, msize, mtype, dateandtime, uid, image)
VALUES('$pname','$bid','$upc','$dept','$msize','$mtype','$timestamp','$uid', '$image')";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","addProduct.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$pid = $test_db->insert_id;
$a_json_row["errorStatus"] = "false";
$a_json_row["productID"] = $pid;
array_push($a_json, $a_json_row);
echo json_encode($a_json);
flush();
mysqli_close($test_db);
exit();
?>
