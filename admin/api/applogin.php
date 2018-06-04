<?php
$username = test_input($_POST['username']);
$username = strtolower($username);
$password = test_input($_POST['password']);
$token = $_POST['token'];
$encrypted = encryptIt( $password );
global $timestamp;
$a_json = array();
$a_json_row = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","applogin.php","0",$sqlError);
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

$query = "SELECT * FROM user_info WHERE username = '$username'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","applogin.php","0",$sqlError);
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
  $a_json_row["errorMessage"] = "Username does not exist.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();

if($userinfo['signedin'] == 4) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Your account is locked.\n Please contact Mission Control.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

if($userinfo['shopper'] != 1) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Looks like you have an account,\n but not setup as a Dasher.\n Please contact Mission Control.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

if($userinfo['passwd'] != $encrypted) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Password is incorrect.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$uid = $userinfo['id'];

if($userinfo['signedin'] == 3) {
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Password needs to be updated.\n Please login to website.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

logActivity("15",$uid,"applogin.php");

if($result) {
  $a_json_row["uid"] = $uid;
  $a_json_row["fname"] = $userinfo['fname'];
  $a_json_row["lname"] = $userinfo['lname'];
  $a_json_row["errorStatus"] = "false";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","applogin.php","0",$sqlError);
  $a_json_row["errorStatus"] = "true";
  $a_json_row["errorMessage"] = "Issues with the server. It has been reported.";
  array_push($a_json, $a_json_row);
  echo json_encode($a_json);
  flush();
  mysqli_close($test_db);
  exit();
} ?>
