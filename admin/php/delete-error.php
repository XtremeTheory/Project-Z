<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'db.php';
require 'functions.php';
$eid = test_input($_POST['eid']);
$uid = $_SESSION['uid'];

	$query = "DELETE FROM error_log WHERE id = '$eid'";
	$result = $test_db->query($query);
	if($result){
    echo "complete";
    mysqli_close($test_db);
    exit();
	} else {
    $sqlError = mysqli_error($test_db);
    logError("1","delete-error.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
	}
?>
