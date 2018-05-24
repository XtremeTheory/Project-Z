<?php
$uid = test_input($_POST['uid']);
$uid1 = $_SESSION['uid'];

	$query = "DELETE FROM user_info WHERE id = '$uid'";
	$result = $test_db->query($query);

	if($result) {
    echo "complete";
    mysqli_close($test_db);
    exit();
	} else {
    $sqlError = mysqli_error($test_db);
    logError("1","delete-user.php",$uid1,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
	}
?>
