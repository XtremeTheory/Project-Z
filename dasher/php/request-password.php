<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';
global $timestamp;
$email = test_input($_POST['email']);

$query = "SELECT * FROM user_info WHERE email = '$email'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","request-password.php","0",$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);

if($rowcount != 1) {
  echo "wrongEmail";
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();
$uid = $userinfo['id'];
$fullname = $userinfo['fname'] . " " . $userinfo['lname'];
$password = substr(sha1(mt_rand()),17,6);
$newpass = encryptIt( $password );
$query = "UPDATE user_info SET signedin = '3', passwd = '$newpass' WHERE id = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","request-password.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

logActivity("3",$uid,"recover-password.php");
$subject = 'Pro Dasher - Reset Password';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'sub5.mail.dreamhost.com';              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'no-reply@prodasher.com';          // SMTP username
    $mail->Password = 'Dasher01!';                         // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@prodasher.com', 'Pro Dasher');
    $mail->addAddress($email, $fullname);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = str_replace(array('%fullname%', '%newpass%'),array($fullname, $password),file_get_contents('../template/password-email.html'));
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    logActivity("4",$uid,"recover-password.php");
  	echo "complete";
  	mysqli_close($test_db);
  	exit();
} catch (Exception $e) {
  $errorMessage = $mail->ErrorInfo;
  logError("3","request-password.php",$uid,$errorMessage);
  header("Location: https://www.prodasher.com/error-500.php");
  mysqli_close($test_db);
  exit();
}
?>
