<?php
$eid = test_input($_POST['eid']);
$uid = $_SESSION['uid'];

$query = "UPDATE email_messages SET status = '4' WHERE id = '$eid'";
$result = $test_db->query($query);

	if($result) {
    echo "complete";
    mysqli_close($test_db);
    exit();
	} else {
    $sqlError = mysqli_error($test_db);
    logError("1","delete-email.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
	}
?>
