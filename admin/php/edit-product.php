<?php
$uid = $_SESSION['uid'];
$pid = test_input($_POST['pid']);
$imageURL = $_POST['imageURL'];
$pname = test_input($_POST['pname']);
$brand = test_input($_POST['brand']);
$upc = test_input($_POST['upc']);
$cate = test_input($_POST['cate']);
$mtype = test_input($_POST['mtype']);
$msize = test_input($_POST['msize']);
$approval = test_input($_POST['approval']);

if($approval == "pending") {
  $approval = 0;
} else if($approval == "approve") {
  $approval = 1;
} else if($approval == "reject") {
    $approval = 2;
  }
 else if($approval == "") {
  $approval = 1;
} else {
  $approval = 1;
}

if(!is_numeric($brand)) {
  $query = "SELECT * FROM brands WHERE bname = '$brand'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","edit-product.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  $brandinfo = $result->fetch_assoc();
  $brand = $brandinfo['id'];
}

if(!is_numeric($cate)) {
  $query1 = "SELECT * FROM categories WHERE cname = '$cate'";
  $result1 = $test_db->query($query1);

  if(!$result1) {
    $sqlError = mysqli_error($test_db);
    logError("1","edit-product.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  $categoryinfo = $result1->fetch_assoc();
  $cate = $categoryinfo['id'];
}

$query = "UPDATE product_list SET pname = '$pname', brand = '$brand', upc = '$upc', cate = '$cate' WHERE id = '$pid'";
$result = $test_db->query($query);
$query = "UPDATE product_list SET mtype = '$mtype', msize = '$msize', live = '$approval', image = '$imageURL' WHERE id = '$pid'";
$result1 = $test_db->query($query);

if($result && $result1) {
  if($approval == 1) {
    $query = "SELECT * FROM user_earnings WHERE uid = '$uid'";
    $result = $test_db->query($query);

    if(!$result) {
      $sqlError = mysqli_error($test_db);
      logError("1","edit-product.php",$uid,$sqlError);
      echo "servfailure";
      mysqli_close($test_db);
      exit();
    }

    $info = $result->fetch_assoc();
    $prevbal = $info['pending_addpro'];
    $prevbal = $prevbal + $addpro;
    $query = "UPDATE user_earnings SET pending_addpro = '$prevbal' WHERE uid = '$uid'";
    $result = $test_db->query($query);

    if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","add-inventory.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
    }
  }
}

if($result && $result1) {
  echo "complete";
  mysqli_close($test_db);
  exit();
} else {
  $sqlError = mysqli_error($test_db);
  logError("1","edit-product.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}
?>
