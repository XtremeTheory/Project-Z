<?php
global $timestamp;
$fname = test_input($_POST['fname']);
$lname = test_input($_POST['lname']);
$address = test_input($_POST['address']);
$address2 = test_input($_POST['address2']);
$zipcode = test_input($_POST['zipcode']);
$phonenum = test_input($_POST['phonenum']);
$email = test_input($_POST['email']);
$gender = test_input($_POST['gender']);
$birthday = test_input($_POST['birthday']);
$user = test_input($_POST['username']);
$pass = test_input($_POST['password']);
$socialsec = test_input($_POST['socialsec']);
$encrypted = encryptIt( $pass );
$encsocial = encryptIt( $socialsec );
$query = "SELECT * FROM user_info order by dasherID desc limit 1";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/submitApplication.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$info = $result->fetch_assoc();
$lastID = $info['dasherID'];
$dasherID = $lastID + 1;

$allowed_types = array ( 'application/pdf', 'image/jpeg', 'image/jpg' );
$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
$dlType = finfo_file( $fileInfo, $_FILES['file']['tmp_name'] );
if (!in_array($dlType, $allowed_types)) {
  echo "badDL";
  mysqli_close($test_db);
  exit();
}
$viType = finfo_file( $fileInfo, $_FILES['file1']['tmp_name'] );
if (!in_array($viType, $allowed_types)) {
  echo "badVI";
  mysqli_close($test_db);
  exit();
}
finfo_close($fileInfo);
$dlExt = "";
$viExt = "";

if($dlType == "application/pdf") {
  $dlExt = ".pdf";
}

if($dlType == "image/jpeg") {
  $dlExt = ".jpeg";
}

if($dlType == "image/jpg") {
  $dlExt = ".jpg";
}

if($viType == "application/pdf") {
  $viExt = ".pdf";
}

if($viType == "image/jpeg") {
  $viExt = ".jpeg";
}

if($viType == "image/jpg") {
  $viExt = ".jpg";
}

if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
} else {
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/dl' . $dasherID . $dlExt);
}

if ( 0 < $_FILES['file1']['error'] ) {
    echo 'Error: ' . $_FILES['file1']['error'] . '<br>';
} else {
    move_uploaded_file($_FILES['file1']['tmp_name'], 'uploads/vi' . $dasherID . $dlExt);
}

$query = "SELECT * FROM city_list WHERE zipcode = '$zipcode'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/submitApplication.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$info = $result->fetch_assoc();
$cid = $info['id'];
$query = "INSERT INTO user_info (fname, lname, email, username, passwd, birthdate, registerdate, timestamp)
VALUES('$fname', '$lname','$email', '$user', '$encrypted', '$birthday', '$timestamp', '$timestamp')";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/submitApplication.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$uid = $test_db->insert_id;
$query = "UPDATE user_info SET address = '$address', address2 = '$address2', cid = '$cid', social = '$encsocial',
dasherID = '$dasherID', gender = '$gender', signedin = '0', tier = '2', acctAttempts = '3' WHERE id = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","dasher/application/php/submitApplication.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

echo "passed";
mysqli_close($test_db);
exit();
?>
