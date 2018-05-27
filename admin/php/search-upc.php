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

$upc_rows = mysqli_num_rows($result);

if ($upc_rows > 0) {
	echo "upcExist";
	mysqli_close($test_db);
	exit();
}

echo "continue";
?>
