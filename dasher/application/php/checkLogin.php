<?php
$username = test_input($_POST['username']);
$query = "SELECT * FROM banned_items WHERE item = '$username'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/checkLogin.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  echo "userBanned";
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM user_info WHERE username = '$username'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/checkContact.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount > 0) {
  echo "userExist";
  mysqli_close($test_db);
  exit();
}

echo "passed";
mysqli_close($test_db);
exit();
?>
