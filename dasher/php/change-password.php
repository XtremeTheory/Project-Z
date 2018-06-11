<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

global $timestamp;
$password = test_input($_POST['password']);
$dob = test_input($_POST['dob']);
$attempts = test_input($_POST['attempts']);

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
  logError("1","change-password.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc();
$estdob = $userinfo['birthdate'];
$estattempts = $userinfo['acctAttempts'];

if($dob != $estdob) {
  echo "wrongDOB";
  mysqli_close($test_db);
  exit();
}

if($attempts <= 0) {
  echo "maxTimes";
  mysqli_close($test_db);
  exit();
}

if($estattempts <= 0) {
  echo "maxTimes";
  mysqli_close($test_db);
  exit();
} else {
  $query = "UPDATE user_info SET acctAttempts = '$attempts' WHERE id = '$uid'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","request-password.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }
}

$fullname = $userinfo['fname'] . " " . $userinfo['lname'];
$email = $userinfo['email'];
$newpass = encryptIt( $password );
$query = "UPDATE user_info SET signedin = '1', passwd = '$newpass', timestamp = '$timestamp' WHERE id = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","request-password.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

logActivity("6",$uid,"new-password.php");
$subject = 'Project Z - Password Changed';
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
    $mail->Body = str_replace(array('%fullname%'),array($fullname),file_get_contents('../template/passreset-email.html'));
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    logActivity("7",$uid,"change-password.php");
    $_SESSION['uid'] = $uid;
    $_SESSION['tempid'] = "";
  	echo "complete";
    logActivity("1",$uid,"new-password.php");
  	mysqli_close($test_db);
  	exit();
} catch (Exception $e) {
  $errorMessage = $mail->ErrorInfo;
  logError("3","change-password.php",$uid,$errorMessage);
  header("Location: https://admin.prodasher.com/error-500.php");
  mysqli_close($test_db);
  exit();
}
?>
