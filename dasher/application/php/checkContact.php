<?php
$email = test_input($_POST['email']);
$phonenum = test_input($_POST['phonenum']);
$fname = test_input($_POST['fname']);
$lname = test_input($_POST['lname']);
$fullname = $fname . " " . $lname;
$query = "SELECT * FROM banned_items WHERE item = '$fullname'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/checkContact.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  echo "isBanned";
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM banned_items WHERE item = '$phonenum'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/checkContact.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  echo "isBanned";
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM banned_items WHERE item = '$email'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/checkContact.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  echo "isBanned";
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM user_info WHERE email = '$email'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/checkContact.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  echo "emailExist";
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM user_info WHERE phonenum = '$phonenum'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/checkContact.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  echo "phoneExist";
  mysqli_close($test_db);
  exit();
}

echo "passed";
mysqli_close($test_db);
exit();
?>
