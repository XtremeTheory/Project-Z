<?php
$sid = test_input($_POST['sid']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM store_data WHERE id = '$sid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-storedetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$storeinfo = $result->fetch_assoc();
$cid = $storeinfo['cid'];
$query1 = "SELECT * FROM city_list WHERE id = '$cid'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-storedetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$cityinfo = $result1->fetch_assoc();
?>
  <b>Store Name:</b> <?php echo $storeinfo['sname']; ?><br>
  <b>Address:</b> <?php echo $storeinfo['address']; ?>
  <div class="row">
    <div class="form-group col-sm-12"><?php echo ucfirst(strtolower($cityinfo['city'])); ?>, <?php echo $cityinfo['state']; ?> <?php echo $cityinfo['zipcode']; ?></div>
  </div>
  <b>County:</b> <?php echo ucfirst(strtolower($cityinfo['county'])); ?><br>
  <b>Current Live Status:</b>
  <?php $d = $storeinfo['live'];
  if($d == 0) { ?>
    <div class="badge badge-info">Pending</div>
  <?php } elseif($d == 1) { ?>
    <div class="badge badge-success">Approved</div>
  <?php } else { ?>
    <div class="badge badge-danger">Rejected</div>
  <?php } ?>
