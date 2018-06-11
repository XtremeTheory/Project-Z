<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
global $timestamp;

if(isset($_SESSION['tempid']) && $_SESSION['tempid'] != "") {
  $uid = $_SESSION['tempid'];
} else {
  $custError = "Temp User ID not set from verify-login.php";
  logError("0","functions.php","0",$custError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM user_info WHERE id = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","lock-account.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();
$fullname = $userinfo['fname'] . " " . $userinfo['lname'];
$email = $userinfo['email'];
$password = "uuz565pulm";
$newpass = encryptIt( $password );
logActivity("8",$uid,"lock-account.php");
$query = "UPDATE user_info SET signedin = '4', passwd = '$newpass', acctAttempts = '0' WHERE id = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","request-password.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$subject = 'Pro Dasher - Account Locked';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'sub5.mail.dreamhost.com';              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'no-reply@prodasher.com';          // SMTP username
    $mail->Password = 'Drm3257!';                         // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@prodasher.com', 'Pro Dasher');
    $mail->addAddress($email, $fullname);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = str_replace(array('%fullname%'),array($fullname),file_get_contents('../template/locked-email.html'));
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    logActivity("9",$uid,"lock-account.php");
  	echo "complete";
  	mysqli_close($test_db);
  	exit();
} catch (Exception $e) {
  $errorMessage = $mail->ErrorInfo;
  logError("3","lock-account.php",$uid,$errorMessage);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}
?>
