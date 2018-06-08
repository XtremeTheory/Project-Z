<?php
$pname = test_input($_POST['pname']);
$brand = test_input($_POST['brandID']);
$upc = test_input($_POST['upc']);
$cate = test_input($_POST['cate']);
$description = "NA";
$msize = test_input($_POST['netwtqty']);
$measure = test_input($_POST['netwtmsmt']);
$approval = 0;
$uid = $_SESSION['uid'];
global $timestamp;

$query = "INSERT INTO product_list (pname, brand, upc, cate, measure, msize, dateandtime, live)
VALUES('$pname', '$brand', '$upc', '$cate', '$measure', '$msize', '$timestamp', '$approval')";
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
