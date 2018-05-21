<?php
set_error_handler('errorH');
register_shutdown_function('shutdownHandler');

if (!function_exists('errorH')) {
function errorH($error_level, $error_message, $error_file, $error_line, $error_context) {
$error = "Level: " . $error_level . " | Message: " . $error_message . " | File: " . $error_file . " | LN: " . $error_line;
switch ($error_level) {
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_PARSE:
        echo $error;
        break;
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
        echo $error;
        break;
    case E_WARNING:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_USER_WARNING:
        echo $error;
        break;
    case E_NOTICE:
    case E_USER_NOTICE:
        echo $error;
        break;
    case E_STRICT:
        echo $error;
        break;
    default:
        echo $error;
      }
      return true;
}
}

if (!function_exists('shutdownHandler')) {
function shutdownHandler() {
$lasterror = error_get_last();
switch ($lasterror['type']) {
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_USER_ERROR:
    case E_RECOVERABLE_ERROR:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_PARSE:
        $error = "[SHUTDOWN] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
        echo $error;
      }
      return true;
}
}
?>
