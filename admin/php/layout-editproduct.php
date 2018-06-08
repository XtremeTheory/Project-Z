<?php
$pid = test_input($_POST['pid']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM product_list WHERE id = '$pid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-editproduct.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$productinfo = $result->fetch_assoc();
$brandname = $productinfo['brand'];
$category = $productinfo['cate'];

if(is_numeric($brandname)) {
  $query1 = "SELECT * FROM brands WHERE id = '$brandname'";
  $result1 = $test_db->query($query1);
} else {
  $query1 = "SELECT * FROM brands WHERE bname = '$brandname'";
  $result1 = $test_db->query($query1);
}

$result1 = $test_db->query($query1);

if(!$result1) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-editproduct.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$brandinfo = $result1->fetch_assoc();
$bid = $brandinfo['id'];
$brandname = $brandinfo['bname'];

if(is_numeric($category)) {
  $query2 = "SELECT * FROM categories WHERE id = '$category'";
  $result2 = $test_db->query($query2);
} else {
  $query2 = "SELECT * FROM categories WHERE cname = '$category'";
  $result2 = $test_db->query($query1);
}

$result2 = $test_db->query($query2);

if(!$result2) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-editproduct.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$categoryinfo = $result2->fetch_assoc();
$cid = $categoryinfo['id'];
$categoryname = $categoryinfo['cname']; ?>
<div class="row">
  <div class="form-group col-sm-12">
    <center><img src="<?php echo $productinfo["image"]; ?>" width="150" height="150"></center>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
  <b>Product ID #: <?php echo $productinfo['id']; ?></b>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="brand">Image URL</label>
    <input type="text" class="form-control editproduct" id="image1" placeholder="Image URL" value="<?php echo $productinfo['image']; ?>">
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="brand">Brand</label>
    <input type="text" class="form-control editproduct" id="brand1" placeholder="Brand" value="<?php echo ucwords(strtolower($brandname)); ?>">
    <input type="hidden" id="brandID1" value="<?php echo $bid; ?>">
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="pname">Product Name</label>
    <input type="text" class="form-control editproduct" id="pname1" placeholder="Product Name" value="<?php echo ucwords(strtolower($productinfo['pname'])); ?>">
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="upc">UPC</label>
    <input type="text" class="form-control editproduct" id="upc1" placeholder="UPC" value="<?php echo ucwords(strtolower($productinfo['upc'])); ?>">
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="dept">Category</label>
    <input type="text" class="form-control editproduct" id="category1" placeholder="Category" value="<?php echo ucwords(strtolower($categoryname)); ?>">
    <input type="hidden" id="categoryID1" value="<?php echo $cid; ?>">
  </div>
</div>
<div class='row'><div class='col-md-6'>
  <label for="netwtqty">Net Wt #</label>
  <input type='text' id="netwtqty1" class='form-control editproduct' value="<?php echo $productinfo['msize']; ?>">
</div>
<div class='col-md-6'>
  <label for="netwtmsmt">Net Wt Size</label>
  <select id="netwtmsmt1" class='form-control editproduct'>
<option value=''>Select Below</option>
<option value='floz' <?php if($productinfo['mtype'] == "floz") {?>selected<?php } ?>>Fl. Oz(s)</option>
<option value='gram' <?php if($productinfo['mtype'] == "gram") {?>selected<?php } ?>>Gram(s)</option>
<option value='oz' <?php if($productinfo['mtype'] == "oz") {?>selected<?php } ?>>Ounce(s)</option>
<option value='lb' <?php if($productinfo['mtype'] == "lb") {?>selected<?php } ?>>Pound(s)</option>
</select></div></div><br>
<?php if($productinfo['live'] != 1) { ?>
<div class="row">
  <div class="form-group col-sm-4">
    <div class="form-group text-center">
      <a href="#" id="pending" class="approval btn btn-info<?php if($productinfo['live'] == 0) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-hourglass-2"></i></a>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <div class="form-group text-center">
      <a href="#" id="approve" class="approval btn btn-success<?php if($productinfo['live'] == 1) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-thumbs-up"></i></a>
    </div>
  </div>
  <div class="form-group col-sm-4">
    <div class="form-group text-center">
      <a href="#" id="deny" class="approval btn btn-danger<?php if($productinfo['live'] == 2) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-thumbs-down"></i></a>
    </div>
  </div>
</div>
<?php } ?>
