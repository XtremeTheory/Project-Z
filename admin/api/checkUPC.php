<?php
require('semantics/Semantics3.php');
$key = 'SEM369B8B62337CE96214F69437CA9D220E2';
$secret = 'OTM5MTFjZTBlNzM2ZWEzOTUxYzA1NzEwZmYzYmRjNmY';
$requestor = new Semantics3_Products($key,$secret);

$upc = $_POST['upc'];
$token = $_POST['token'];
global $timestamp;
$a_json = array();
$a_json_row = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkUPC.php","0",$sqlError);
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

$query = "SELECT * FROM product_list WHERE upc = '$upc'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkUPC.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);
$prodinfo = $result->fetch_assoc();

if($prodinfo["live"] == 0 && $rowcount == 1) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "This product is already under review.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

if($rowcount == 0) {
  $requestor->products_field( "upc", $upc );
  $requestor->products_field( "field", ["name","brand","images"] );
  $results = $requestor->get_products();
  $results = json_decode($results, true);
  $a_json_row["errorStatus"] = "false";
  $a_json_row["exist"] = "false";
  $a_json_row["apicall"] = $results['results'];
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$bid = $prodinfo['brand'];
$query1 = "SELECT * FROM brands WHERE id = '$bid'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","checkUPC.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
}

$brandinfo = $result1->fetch_assoc();

$a_json_row["productID"] = $prodinfo['id'];
$a_json_row["pname"] = $prodinfo['pname'];
$a_json_row["brand"] = $brandinfo['bname'];
$a_json_row["dept"] = $prodinfo['dept'];
$a_json_row["msize"] = $prodinfo['msize'];
$a_json_row["mtype"] = $prodinfo['mtype'];
$a_json_row["exist"] = "true";
$a_json_row["errorStatus"] = "false";
array_push($a_json, $a_json_row);
echo json_encode($a_json);
flush();
mysqli_close($test_db);
exit();
?>
