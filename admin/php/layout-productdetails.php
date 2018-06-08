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
$bid = $productinfo['brand'];
$query1 = "SELECT * FROM brands WHERE id = '$bid'";
$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-productdetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$brandinfo = $result1->fetch_assoc();
$brandname = $brandinfo['bname'];
$cid = $productinfo['cate'];
$query2 = "SELECT * FROM categories WHERE id = '$cid'";
$result2 = $test_db->query($query2);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-productdetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$categoryinfo = $result2->fetch_assoc();
$categoryname = $categoryinfo['cname']; ?>
  <center><img src="<?php echo $productinfo["image"]; ?>" width="150" height="150"></center><br>
  <b>Product ID #: <?php echo $productinfo['id']; ?></b><br>
  <b>Product Brand:</b> <?php echo $brandname; ?><br>
  <b>Product Name:</b> <?php echo ucwords(strtolower($productinfo['pname'])); ?><br>
  <b>Net Weight:</b> <?php echo $productinfo['msize']; ?> <?php echo $productinfo['mtype']; ?><br>
  <b>UPC:</b> <?php echo $productinfo['upc']; ?><br>
  <b>Category:</b> <?php echo $categoryname; ?><br>
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
