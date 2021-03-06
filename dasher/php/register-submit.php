<?php
$fname = test_input($_POST['fname']);
$lname = test_input($_POST['lname']);
$email = test_input($_POST['email']);
$birthday = test_input($_POST['birthday']);
$actcode = test_input($_POST['actcode']);
$user = test_input($_POST['username']);
$pass = test_input($_POST['password']);

$query = "SELECT * FROM user_info WHERE email = '$email'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","register-submit.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$email_rows = mysqli_num_rows($result);

if ($email_rows > 0) {
	echo "emailExist";
	mysqli_close($test_db);
	exit();
}

$query = "SELECT * FROM user_info WHERE username = '$user'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","register-submit.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$usercount = mysqli_num_rows($result);

if ($usercount > 0) {
	echo "userExist";
	mysqli_close($test_db);
	exit();
}

$query = "SELECT * FROM security_steps WHERE codeID = '1'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","register-submit.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$codeinfo = $result->fetch_assoc();

if ($codeinfo['shopactCode'] != $actcode) {
	echo "wrongAct";
	mysqli_close($test_db);
	exit();
}

$encrypted = encryptIt( $pass );
$emailhash = md5( rand(0,1000) );
$query = "INSERT INTO user_info (fname, lname, emailhash, email, username, passwd, birthdate, registerdate, timestamp)
VALUES('$fname', '$lname','$emailhash','$email', '$user', '$encrypted', '$birthday', '$timestamp', '$timestamp')";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","register-submit.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$uid = $test_db->insert_id;
$query = "UPDATE user_info SET signedin = '0', tier = '1', acctAttempts = '3' WHERE id = '$uid'";
$result = $test_db->query($query);

if($result) {
  $query = "INSERT INTO user_earnings (uid, pending_addpro, pending_editpro, total_addpro, total_editpro, pending_addinv, pending_editinv, total_addinv, total_editinv, payout)
  VALUES('$uid', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00')";
  $result = $test_db->query($query);
}

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","register-submit.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$eSubject = "New Dasher Registered";
$eMessage = "A new dasher has been created.  Please create their system email and configure their account.  Below are the details:<br><br>";
$eMessage .= "<b>UID:</b> " . $uid . "<br>";
$eMessage .= "<b>Name:</b> " . $fname . " " . $lname;
$theDate = date("m/d/Y");
$theTime = date("h:i:s A");
$query = "INSERT INTO email_messages (uid, status, eSubject, senderName, fromEmail, eMessage, unread, starred, label, theDate, theTime, active)
VALUES('0', '1', '$eSubject', 'Cortana', 'no-reply@prodasher.com', '$eMessage', '1', '0', '3', '$theDate', '$theTime', '0')";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","register-submit.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$_SESSION['newAccount'] = TRUE;
echo "complete"; ?>
