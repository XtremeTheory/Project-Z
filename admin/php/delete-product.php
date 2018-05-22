<?php
$pid = test_input($_POST['pid']);

	$query = "DELETE FROM product_list WHERE id = '$pid'";
	$result = $test_db->query($query);
	if($result) {
    echo "complete";
    mysqli_close($test_db);
    exit();
	} else {
    $sqlError = mysqli_error($test_db);
    logError("1","delete-product.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
	}
?>
