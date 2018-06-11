<?php
$sql_details = array(
    'user' => 'prodasher01',
    'pass' => 'Dasher01!',
    'db'   => 'prodasher_main',
    'host' => 'mysql.prodasher.com'
);

  global $dasherpath;
  global $adminpath;
  global $path;
  $path = "https://www.prodasher.com/";
  $dasherpath = "https://dasher.prodasher.com/";
  $adminpath = "https://admin.prodasher.com/";

  //Error Log Codes
  $error0 = "Custom error message, read details.";
  $error1 = "Unable to connect to MySQL database.";
  $error2 = "IP address was not logged into IP sessions.";
  $error3 = "Email was not able to send.";
  $error4 = "Visitor loaded non-existent page or image.";
  $error5 = "UID was not set.";

  //Activity Codes
  $activity1 = "Logged into website system.";
  $activity2 = "Logged out of website system.";
  $activity3 = "Password has been requested to change.";
  $activity4 = "Password reset email sent.";
  $activity5 = "Went straight to page without authorization.";
  $activity6 = "Password successfully changed by user.";
  $activity7 = "Password changed email sent.";
  $activity8 = "Birthdate entered incorrectly 3 times, account has been locked.";
  $activity9 = "Account Locked email sent.";
  $activity10 = "Login session expired, logged out of system.";
  $activity11 = "Deleted error from database.";
  $activity12 = "Security codes have been updated.";
  $activity13 = "Deleted company email.";
  $activity14 = "Fixed an error.";
  $activity15 = "Logged into Dasher application.";
  $activity16 = "Logged out of Dasher application.";
  $activity17 = "Edited brand information.";
  $activity18 = "Edited store information.";
?>
