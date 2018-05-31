<?php
$eid = test_input($_POST['eid']);
$tid = $_SESSION['uid'];

$query = "UPDATE error_log SET status = '1', tid = '$tid' WHERE id = '$eid'";
$result = $test_db->query($query);
	if($result) {
		logActivity("14",$tid,"delete-error.php");
    echo "complete";
    mysqli_close($test_db);
    exit();
	} else {
    $sqlError = mysqli_error($test_db);
    logError("1","fixed-error.php",$tid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
	}
?>
