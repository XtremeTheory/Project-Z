<?php
function test_input($data) {
	global $test_db;
	$data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
	$data = mysqli_real_escape_string($test_db, $data);
  return $data;
}

function getOS() {
    global $user_agent;
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
    global $user_agent;
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

function logError($statuscode,$pagename,$uid,$errmessage) {
global $test_db;
global $path;
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ipproxy = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ipproxy = "0.0.0.0";
}
$ipadd = $_SERVER['REMOTE_ADDR'];
$user_os = getOS();
$user_browser = getBrowser();
date_default_timezone_set("America/New_York");
$timestamp = date("m-d-Y H:i:s");
	$input_activity = "INSERT INTO errorlog (errorcode, filename, dateandtime, uid, ipadd, ipproxy, errormessage, uOS, ubrowser) VALUES ('$statuscode','$pagename','$timestamp','$uid','$ipadd','$ipproxy','$errmessage','$user_os','$user_browser')";
	$result = $test_db->query($input_activity);
			if(!$result){
				echo "There is an issue with the server.  The issue has been directed directly to our host to be resolved. Error Code: 1-001";
			}
		}
?>
