<?php
$upc = test_input($_POST['upc']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM product_list WHERE upc = '$upc'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","search-upc.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$outcome = array();
$upc_rows = mysqli_num_rows($result);
$info = $result->fetch_assoc();

if ($upc_rows == 1) {
  $outcome['nextStep'] = "upcExist";
  $outcome['pid'] = $info['id'];
  echo json_encode($outcome);
	mysqli_close($test_db);
	exit();
} ?>
