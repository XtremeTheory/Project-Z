<?php
$pid = test_input($_POST['pid']);
$sid = test_input($_POST['sid']);
$aisle = test_input($_POST['aisle']);
$price = test_input($_POST['price']);
$notes = test_input($_POST['notes']);
$saleprice = 0;
$approval = 0;
$uid = $_SESSION['uid'];
global $timestamp;

$query = "INSERT INTO product_store_data (pid, sid, aisle, price, uid, approval, dateandtime, notes)
VALUES('$pid', '$sid', '$aisle', '$price', '$uid', '$approval', '$timestamp','$notes')";
$result = $test_db->query($query);

if(!$result) {
$sqlError = mysqli_error($test_db);
logError("1","add-inventory.php",$uid,$sqlError);
echo "servfailure";
mysqli_close($test_db);
exit();
}

echo "correct";
mysqli_close($test_db);
exit(); ?>
