<?php
require 'db.php';
require 'functions.php';
$pid = test_input($_POST['pid']);
$query = "SELECT * FROM product_list WHERE id = '$pid'";
$result = $test_db->query($query);
$productinfo = $result->fetch_assoc();
?>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="brand">Brand</label>
    <input type="text" class="form-control required editproduct" id="brand" placeholder="Brand" value="<?php echo ucwords(strtolower($productinfo['brand'])); ?>">
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="pname">Product Name</label>
    <input type="text" class="form-control required editproduct" id="pname" placeholder="Product Name" value="<?php echo ucwords(strtolower($productinfo['pname'])); ?>">
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="upc">UPC</label>
    <input type="text" class="form-control required editproduct" id="upc" placeholder="UPC" value="<?php echo ucwords(strtolower($productinfo['upc'])); ?>">
  </div>
</div>
<div class="row">
  <div class="form-group col-sm-12">
    <label for="dept">Department</label>
    <input type="text" class="form-control required editproduct" id="dept" placeholder="Department" value="<?php echo ucfirst(strtolower($productinfo['dept'])); ?>">
  </div>
</div>
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
