<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../php/mail/Exception.php';
require '../../php/mail/PHPMailer.php';
require '../../php/mail/SMTP.php';
global $timestamp;
$email = test_input($_POST['email']);
$randomcode = test_input($_POST['randomcode']);
$fname = test_input($_POST['fname']);
$lname = test_input($_POST['lname']);
$fullname = $fname . " " . $lname;
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'sub5.mail.dreamhost.com';              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'no-reply@prodasher.com';          // SMTP username
    $mail->Password = 'Dasher01!';                         // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->setFrom('no-reply@prodasher.com', 'Pro Dasher');
    $mail->addAddress($email, $fullname);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Pro Dasher - Verify Email";
    $mail->Body = "Here is the code: " . $randomcode;
    $mail->send();
    echo $randomcode;
} catch (Exception $e) {
  $errorMessage = $mail->ErrorInfo;
  logError("3","application/confirmContact.php","0",$errorMessage);
  echo "failed";
  mysqli_close($test_db);
  exit();
}
?>
