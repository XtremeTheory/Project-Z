<?php
$username = test_input($_POST['username']);
$username = strtolower($username);
$password = test_input($_POST['password']);
$token = $_POST['token'];
$encrypted = encryptIt( $password );
global $timestamp;
$apiresult = array();
$errors = array();
$user = array();
$query = "SELECT * FROM security_steps WHERE apiKEY = '$token'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","applogin.php","0",$sqlError);
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

$query = "SELECT * FROM user_info WHERE username = '$username'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","applogin.php","0",$sqlError);
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
  $errors["errorMessage"] = "Username does not exist.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();

if($userinfo['signedin'] == 4) {
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Your account is locked.\n Please contact Mission Control.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

if($userinfo['shopper'] != 1) {
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Looks like you have an account,\n but not setup as a Dasher.\n Please contact Mission Control.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

if($userinfo['passwd'] != $encrypted) {
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Password is incorrect.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

$uid = $userinfo['id'];

if($userinfo['signedin'] == 3) {
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Password needs to be updated.\n Please login to website.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}

logActivity("1",$uid,"applogin.php");
$query = "UPDATE user_info SET signedin = '1', timestamp = '$timestamp' WHERE id = '$uid'";
$result = $test_db->query($query);

if($result) {
  $user["username"] = $username;
  $user["uid"] = $uid;
  $errors["errorStatus"] = "false";
  $apiresult["error"] = $errors;
  $apiresult["user"] = $user;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","applogin.php","0",$sqlError);
  $errors["errorStatus"] = "true";
  $errors["errorMessage"] = "Issues with the server. It has been reported.";
  $apiresult["error"] = $errors;
  echo json_encode($apiresult);
  mysqli_close($test_db);
  exit();
}
?>
