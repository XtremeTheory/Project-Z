<?php
$sid = test_input($_POST['sid']);
$uid = 1;

	$query = "DELETE FROM store_data WHERE id = '$sid'";
	$result = $test_db->query($query);
	if($result){
    echo "complete";
    mysqli_close($test_db);
    exit();
	} else {
    $sqlError = mysqli_error($test_db);
    logError("1","delete-store.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
	}
?>
