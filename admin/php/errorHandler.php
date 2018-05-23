<?php
require '/home/dilmil3/prodasher/admin/php/functions.php';

function myErrorHandler($error_level, $error_message, $error_file, $error_line, $error_context) {
  $error = "Level: " . $error_level . " - Message: " . $error_message;
  $errfile = $error_file . " - Line #: " . $error_line;
  switch ($error_level) {
      case E_ERROR:
          repError($error, $errfile);
          break;
      case E_CORE_ERROR:
          repError($error, $errfile);
          break;
      case E_COMPILE_ERROR:
          repError($error, $errfile);
          break;
      case E_PARSE:
          repError($error, $errfile);
          break;
      case E_USER_ERROR:
          repError($error, $errfile);
          break;
      case E_RECOVERABLE_ERROR:
          repError($error, $errfile);
          break;
      case E_WARNING:
          repError($error, $errfile);
          break;
      case E_CORE_WARNING:
          repError($error, $errfile);
          break;
      case E_COMPILE_WARNING:
          repError($error, $errfile);
          break;
      case E_USER_WARNING:
          repError($error, $errfile);
          break;
      case E_NOTICE:
          repError($error, $errfile);
          break;
      case E_USER_NOTICE:
          repError($error, $errfile);
          break;
      case E_STRICT:
          repError($error, $errfile);
          break;
      default:
          repError($error, $errfile);
          break;
        }
}

function shutdownHandler() {
$lasterror = error_get_last();
$error = "[SHUTDOWN] Level: " . $lasterror['type'] . " - Message: " . $lasterror['message'];
$errfile = $lasterror['file'] . " - Line #: " . $lasterror['line'];
switch ($lasterror['type']) {
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_PARSE:
        repError($error, $errfile);
        break;
      }
}

if (!function_exists('repError')) {
function repError($errorMsg, $errFile) {
  global $test_db;
  if(isset($_SESSION['uid']) && $_SESSION['uid'] != "") { $uid = $_SESSION['uid']; } else { $uid = 0; }
  global $timestamp;
  $ipadd = getIP();
  $uOS = getOS();
  $ubrowser = getBrowser();

  $query = "INSERT INTO error_log (errorcode, filename, dateandtime, uid, errormessage, ipadd, uOS, ubrowser, level)
  VALUES('0', '$errFile', '$timestamp', '$uid', '$errorMsg', '$ipadd', '$uOS', '$ubrowser', '5')";
  $result = $test_db->query($query);

  if($result) {
    header("Location: https://www.prodasher.com/admin/error-500.php");
    mysqli_close($test_db);
    exit();
  }
}
}

// Set user-defined error handler function
set_error_handler("myErrorHandler");
register_shutdown_function('shutdownHandler'); ?>
