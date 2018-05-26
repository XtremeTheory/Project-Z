<?php
if (!defined('SITE_ROOT')) {
    define ('SITE_ROOT', '/home/dilmil3/admin.prodasher/');
}

  global $path;
  $path = "https://admin.prodasher.com/";

  //Error Log Codes
  $error0 = "Custom error message, read details.";
  $error1 = "Unable to connect to MySQL database.";
  $error2 = "IP address was not logged into IP sessions.";
  $error3 = "Email was not able to send.";
  $error4 = "Visitor loaded non-existent page or image.";

  //Activity Codes
  $activity1 = "Logged into system.";
  $activity2 = "Logged out of system.";
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
?>
