<?php
$uid = test_input($_POST['uid']);

//if uid = 0, send to email address instead

$cuid = $_SESSION['uid'];
$email = test_input($_POST['email']);
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
VALUES('$uid', '1', '$subject', '$fullname', '$fromEmail', '$eMessage', '1', '0', '0', '$todayDate', '$theTime', '0')";
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
