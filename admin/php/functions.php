<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
require 'definitions.php';
require 'Mobile_Detect.php';
global $detect;
global $timestamp;
$detect = new Mobile_Detect;
date_default_timezone_set("America/New_York");
$timestamp = date("m-d-Y H:i:s");

//Called by different functions to change status of user and direct them to correct page
function logActivity($aid,$uid,$pageName) {
	global $path;
	global $test_db;
	global $timestamp;
  $ipadd = getIP();
  $ubrowser = getBrowser();
  $uOS = getOS();
    $query = "INSERT INTO activity_log (activityID, ipadd, ubrowser, uOS, uid, timestamp, pagename)
    VALUES('$aid', '$ipadd', '$ubrowser', '$uOS', '$uid', '$timestamp', '$pageName')";
    $result = $test_db->query($query);

    if(!$result) {
      //Failed to connect to database.
      $sqlError = mysqli_error($test_db);
      logError("1","functions.php",$uid,$sqlError);
      header("Location:".$path."admin/error-500.php");
      mysqli_close($test_db);
      exit();
  }
}
//End of Status Changes

//Gets IP of User
function getIP() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
//End of get IP Address

//Verifys user has Admin status
function verifyAuth($curStep,$pageName) {
	global $path;
	global $test_db;
	global $timestamp;

	if($curStep == 1) {
    if(isset($_SESSION['tempid']) && $_SESSION['tempid'] != "") {
      $uid = $_SESSION['tempid'];
    } else {
      $_SESSION['uid'] = "";
      $_SESSION['tempid'] = "";
      $_SESSION['wrongPage'] = TRUE;
      header("Location:".$path."admin/login.php");
      mysqli_close($test_db);
      exit();
    }

		$checkuser = "SELECT * FROM user_info WHERE id = '$uid'";
		$result = $test_db->query($checkuser);

    if(!$result) {
      //Failed to connect to database.
      $sqlError = mysqli_error($test_db);
      logError("1","functions.php","0",$sqlError);
      header("Location:".$path."admin/error-500.php");
      mysqli_close($test_db);
      exit();
    }

		$userinfo = $result->fetch_assoc();
    $status = $userinfo['signedin'];

    if($status != "3") {
      logActivity("5",$uid,$pageName);
      $_SESSION['wrongPage'] = TRUE;
      header("Location:".$path."admin/login.php");
      mysqli_close($test_db);
      exit();
    }
	}
}

//Verifys user has Admin status
function verifyAdmin($rqstTier,$pageName) {
	global $path;
	global $test_db;
	global $timestamp;

	if(isset($_SESSION['uid']) && $_SESSION['uid'] != "") {
		$uid = $_SESSION['uid'];
		$checkuser = "SELECT * FROM user_info WHERE id = '$uid'";
		$result = $test_db->query($checkuser);

    if(!$result) {
      //Failed to connect to database.
      $sqlError = mysqli_error($test_db);
      logError("1","log-activity.php","0",$sqlError);
      header("Location:".$path."admin/error-500.php");
      mysqli_close($test_db);
      exit();
    }

		$userinfo = $result->fetch_assoc();
		$lastlogin = $userinfo['timestamp'];
    $userTier = $userinfo['tier'];

    if($userTier < $rqstTier) {
      logActivity("5",$uid,$pageName);
      $_SESSION['wrongPage'] = TRUE;
      header("Location:".$path."admin/dashboard-main.php");
      mysqli_close($test_db);
      exit();
    }

		if($userinfo['signedin'] == 2) {
			logActivity("lockScreen",$uid,$pageName);
		}

		$to_time = strtotime($timestamp);
		$from_time = strtotime($lastlogin);
		$numofmin = round(abs($to_time - $from_time) / 60,2);

		if($numofmin >= 15) {
  		$update_stamp = "UPDATE user_info SET timestamp = '$timestamp', signedin = '0' WHERE id = '$uid'";
  		$result = $test_db->query($update_stamp);

      if(!$result) {
        $sqlError = mysqli_error($test_db);
        logError("1","functions.php",$uid,$sqlError);
        header("Location:".$path."admin/error-500.php");
        mysqli_close($test_db);
        exit();
      }

      logActivity("10",$uid,$pageName);
  		$_SESSION = array();
  		session_destroy();
  		mysqli_close($test_db);
  		header("Location:".$path."admin/login.php?sessexpired=TRUE&location=" . urlencode($_SERVER['REQUEST_URI']));
  		exit();
		}

		$update_stamp = "UPDATE user_info SET timestamp = '$timestamp', signedin = '1' WHERE id = '$uid'";
		$result = $test_db->query($update_stamp);

    if(!$result) {
      //Failed to connect to database.
      $sqlError = mysqli_error($test_db);
      logError("1","log-activity.php","0",$sqlError);
      header("Location:".$path."admin/error-500.php");
      mysqli_close($test_db);
      exit();
    }
	} else {
    logActivity("10",$uid,$pageName);
    $_SESSION['uid'] = "";
    $_SESSION['tempid'] = "";
    mysqli_close($test_db);
    header("Location:".$path."admin/login.php?sessexpired=TRUE&location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
  }
}

function encryptIt($q) {
	$cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
	$qEncoded = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
	return( $qEncoded );
	}

function test_input($data) {
	global $test_db;
	$data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($test_db, $data);
  return $data;
}

function getOS() {
    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }
    return $os_platform;
}

function getBrowser() {
    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

function captureIP($pagename) {
	global $test_db;
	global $path;
	global $detect;
  global $timestamp;
	$ipadd = getIP();
	$uid = "0";
	if(isset($_SESSION['uid']) && $_SESSION['uid'] != "") {
		$uid = $_SESSION['uid'];
	}
	if(!isset($_COOKIE['DeviceID'])) {
		$cookie_name = "DeviceID";
		$devID = uniqid('', TRUE);
		setcookie($cookie_name, $devID, time() + (86400 * 365), "/"); // 86400 = 1 day
	} else {
		$devID = $_COOKIE['DeviceID'];
	}
	$checkSession = "SELECT * FROM ip_sessions WHERE ipadd = '$ipadd'";
	$sessionresult = $test_db->query($checkSession);
	$session_rows = mysqli_num_rows($sessionresult);
  $sessionresult = $sessionresult->fetch_assoc();
	$todaydate = date("m-d-Y");

	if($session_rows > 0) {
		$sessid = $sessionresult['id'];
		$sesscount = $sessionresult['sess_count'];
		$sesscount = $sesscount + 1;
		$query = "UPDATE ip_sessions SET sess_count = '$sesscount', curpage = '$pagename', dateandtime = '$timestamp', devid = '$devID' WHERE ipadd = '$ipadd'";
		$result = $test_db->query($query);

    if(!$result) {
      $sqlError = mysqli_error($test_db);
      logError("1","functions.php",$uid,$sqlError);
      header("Location:".$path."admin/error-500.php");
      mysqli_close($test_db);
      exit();
    }
	} else {
		$ipquery = @unserialize(file_get_contents('http://ip-api.com/php/'.$ipadd));
		if($ipquery && $ipquery['status'] == 'success') {
			$user_city = $ipquery['city'];
			$user_state = $ipquery['regionName'];
			$user_zip = $ipquery['zip'];
			$user_country = $ipquery['country'];
			$user_isp = $ipquery['isp'];
			if($user_country != "United States") {
				$user_location = $user_city . ", " . $user_state . " " . $user_zip . " " . $user_country;
			} else {
				$user_location = $ipquery['zip'];
			}
		} else {
			$user_location = "Unknown";
			$user_isp = "Unknown";
		}
		if($detect->isTablet()){
			$devicetype = "Tablet";
		}
		elseif($detect->isMobile() && !$detect->isTablet()){
			$devicetype = "Mobile";
		}
		elseif($detect->isiOS()){
			$devicetype = "Apple";
		} else {
			$devicetype = "Computer";
		}
		$user_os = getOS();
		$user_browser = getBrowser();
		$session_count = 1;
		$inputSession = "INSERT INTO ip_sessions (ipadd, dateandtime, uos, ubrowser, devicetype, ulocation, uisp, sess_count, curpage, uid, devid)
		VALUES ('$ipadd', '$dateandtime', '$user_os', '$user_browser', '$devicetype', '$user_location', '$user_isp', '$session_count', '$pagename', '$uid', '$devID')";
		$result = $test_db->query($inputSession);

    if(!$result) {
      $sqlError = mysqli_error($test_db);
      logError("1","functions.php",$uid,$sqlError);
      header("Location:".$path."admin/error-500.php");
      mysqli_close($test_db);
      exit();
    }
	}
}

function logError($statuscode,$pagename,$uid,$errmessage) {
	global $test_db;
	global $path;
  global $timestamp;
	$ipadd = getIP();
	$user_os = getOS();
	$user_browser = getBrowser();
	$input_activity = "INSERT INTO error_log (errorcode, filename, dateandtime, uid, ipadd, errormessage, uOS, ubrowser)
	VALUES ('$statuscode','$pagename','$timestamp','$uid','$ipadd','$errmessage','$user_os','$user_browser')";
	$result = $test_db->query($input_activity);
	if(!$result) {
    $sqlError = mysqli_error($test_db);
    echo $sqlError;
    mysqli_close($test_db);
    exit();
	}
}
?>
