<?php
$pid = test_input($_POST['productID']);
$sid = test_input($_POST['storeID']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM product_store_data WHERE pid = '$pid' AND sid = '$sid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","search-storeinv.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$outcome = array();
$item_rows = mysqli_num_rows($result);

if ($item_rows == 1) {
  $outcome['nextStep'] = "itemExist";
  echo json_encode($outcome);
	mysqli_close($test_db);
	exit();
} ?>
