<?php
$pname = test_input($_POST['pname']);
$brand = test_input($_POST['brand']);
$upc = test_input($_POST['upc']);
$dept = test_input($_POST['dept']);
$description = test_input($_POST['description']);
$measure = test_input($_POST['measure']);
$msize = test_input($_POST['msize']);
$approval = 0;
$uid = test_input($_POST['uid']);
date_default_timezone_set("America/New_York");
$dateandtime = date("m-d-Y H:i:s");

$query = "INSERT INTO product_list (pname, brand, upc, dept, description, measure, msize, dateandtime, approval)
VALUES('$pname', '$brand', '$upc', '$dept', '$description', '$measure', '$msize', '$dateandtime', '$approval')";
$result = $test_db->query($query);

if($result) {
	echo "correct";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","add-product.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
