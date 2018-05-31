<?php
$uid = test_input($_POST['uid']);
$cuid = $_SESSION['uid'];

if($uid == 0) {
  $email = test_input($_POST['email']);
  echo "comingSoon";
  mysqli_close($test_db);
  exit();
}

if($uid == "") {
  echo "uidError";
  $errorMsg = "The UID was not set when trying to send email.";
  logError("5","send-email.php",$cuid,$errorMsg);
  mysqli_close($test_db);
  exit();
}

$subject = test_input($_POST['subject']);
$message = test_input($_POST['message']);
$todayDate = date("m/d/Y");
$theTime = date("h:i:s A");
$query = "SELECT * FROM user_info WHERE id = '$cuid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","send-email.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$info = $result->fetch_assoc();
$fullname = $info['fname'] . " " . $info['lname'];
$fromEmail = $info['email'];

$query = "INSERT INTO email_messages (uid, status, eSubject, senderName, fromEmail, eMessage, unread, starred, label, theDate, theTime, active)
VALUES('$uid', '1', '$subject', '$fullname', '$fromEmail', '$message', '1', '0', '0', '$todayDate', '$theTime', '0')";
$result = $test_db->query($query);

if($result) {
	echo "correct";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","send-email.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
