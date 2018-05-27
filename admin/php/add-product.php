<?php
$pname = test_input($_POST['pname']);
$brand = test_input($_POST['barID']);
$upc = test_input($_POST['upc']);
$dept = test_input($_POST['department']);
$description = "NA";
$msize = test_input($_POST['netwtqty']);
$measure = test_input($_POST['netwtmsmt']);
$storeID = test_input($_POST['storeID']);
$price = test_input($_POST['price']);
$aisle = test_input($_POST['aisle']);
$approval = 0;
$saleprice = 0;
$uid = $_SESSION['uid'];
global $timestamp;

$query = "INSERT INTO product_list (pname, brand, upc, dept, description, measure, msize, dateandtime, live)
VALUES('$pname', '$brand', '$upc', '$dept', '$description', '$measure', '$msize', '$timestamp', '$approval')";
$result = $test_db->query($query);

if(!$result) {
$sqlError = mysqli_error($test_db);
logError("1","add-product.php",$uid,$sqlError);
echo "servfailure";
mysqli_close($test_db);
exit();
}

$new_id = $test_db->insert_id;
$query = "INSERT INTO product_store_data (pid, sid, aisle, price, saleprice, dateandtime, approval, uid)
VALUES('$new_id', '$storeID', '$aisle', '$price', '$saleprice', '$timestamp', '$approval', '$uid')";
$result = $test_db->query($query);

if(!$result) {
$sqlError = mysqli_error($test_db);
logError("1","add-product.php",$uid,$sqlError);
echo "servfailure";
mysqli_close($test_db);
exit();
}

echo "correct";
mysqli_close($test_db);
exit(); ?>
