<?php
require 'db.php';
require 'functions.php';
$pid = test_input($_POST['pid']);
$query = "SELECT * FROM product_list WHERE id = '$pid'";
$result = $test_db->query($query);
$productinfo = $result->fetch_assoc();
?>
  <b>Product Name:</b> <?php echo ucwords(strtolower($productinfo['brand'])); ?> - <?php echo ucwords(strtolower($productinfo['pname'])); ?><br>
  <b>Product Size:</b> <?php echo $productinfo['msize']; ?> <?php echo $productinfo['measure']; ?><br>
  <b>UPC:</b> <?php echo $productinfo['upc']; ?><br>
  <b>Description:</b> <?php echo $productinfo['description']; ?><br>
  <b>Department:</b> <?php echo ucwords(strtolower($productinfo['department'])); ?><br>
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
