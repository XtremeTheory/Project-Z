<?php
$pid = test_input($_POST['pid']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM product_review WHERE id = '$pid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-editproduct.php",$uid,$sqlError);
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
  logError("1","layout-editproduct.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$brandinfo = $result1->fetch_assoc();
?>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="brand">Brand</label>
    <input type="text" class="form-control editproduct" id="brand1" placeholder="Brand" value="<?php echo ucwords(strtolower($brandinfo['bname'])); ?>">
    <input type="hidden" id="brandID1">
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
    <label for="dept">Department</label>
    <select id="department1" class='form-control editproduct'>
      <option value=''>Select Below</option>
      <option value="Baby-Food" <?php if($productinfo['dept'] == "Baby-Food") {?>selected<?php } ?>>Baby - Food</option>
      <option value="Dairy" <?php if($productinfo['dept'] == "Dairy") {?>selected<?php } ?>>Dairy</option>
      <option value="Frozen-Meat" <?php if($productinfo['dept'] == "Frozen-Meat") {?>selected<?php } ?>>Frozen - Beef</option>
      <option value="Frozen-Seafood" <?php if($productinfo['dept'] == "Frozen-Seafood") {?>selected<?php } ?>>Frozen - Seafood</option>
      <option value="Meat-Beef" <?php if($productinfo['dept'] == "Meat-Beef") {?>selected<?php } ?>>Meat - Beef</option>
      <option value="Meat-Seafood" <?php if($productinfo['dept'] == "Meat-Seafood") {?>selected<?php } ?>>Meat - Seafood</option>
      <option value="Produce" <?php if($productinfo['dept'] == "Produce") {?>selected<?php } ?>>Produce</option>
    </select>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="description">Description</label>
    <textarea class="form-control editproduct" id="description"><?php echo $productinfo['description']; ?></textarea>
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
<option value='floz' <?php if($productinfo['measure'] == "floz") {?>selected<?php } ?>>Fl. Oz(s)</option>
<option value='gram' <?php if($productinfo['measure'] == "gram") {?>selected<?php } ?>>Gram(s)</option>
<option value='oz' <?php if($productinfo['measure'] == "oz") {?>selected<?php } ?>>Ounce(s)</option>
<option value='lb' <?php if($productinfo['measure'] == "lb") {?>selected<?php } ?>>Pound(s)</option>
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
