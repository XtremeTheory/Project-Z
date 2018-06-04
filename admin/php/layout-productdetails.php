<?php
$pid = test_input($_POST['pid']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM product_list WHERE id = '$pid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-productdetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$productinfo = $result->fetch_assoc();
?>
  <center><img src="<?php echo $productinfo["image"]; ?>" width="150" height="150"></center><br>
  <b>Product Name:</b> <?php echo ucwords(strtolower($productinfo['brand'])); ?> - <?php echo ucwords(strtolower($productinfo['pname'])); ?><br>
  <b>Product Size:</b> <?php echo $productinfo['msize']; ?> <?php echo $productinfo['mtype']; ?><br>
  <b>UPC:</b> <?php echo $productinfo['upc']; ?><br>
  <b>Department:</b> <?php echo ucwords(strtolower($productinfo['dept'])); ?><br>
  <b>Date Added to Database:</b> <?php echo $productinfo['dateandtime']; ?><br>
  <b>Current Live Status:</b>
  <?php $d = $productinfo['live'];
  if($d == 0) { ?>
    <div class="badge badge-info">Pending</div>
  <?php } elseif($d == 1) { ?>
    <div class="badge badge-success">Approved</div>
  <?php } else { ?>
    <div class="badge badge-danger">Rejected</div>
  <?php } ?>
