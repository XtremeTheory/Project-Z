<?php
$sid = test_input($_POST['sid']);
$query = "SELECT * FROM store_data WHERE id = '$sid'";
$result = $test_db->query($query);
$storeinfo = $result->fetch_assoc();
$cid = $storeinfo['cid'];
$query1 = "SELECT * FROM city_list WHERE id = '$cid'";
$result1 = $test_db->query($query1);
$cityinfo = $result1->fetch_assoc();
?>
  <fieldset class="form-group floating-label-form-group">
    <label for="sname">Store Name</label>
    <input type="text" class="form-control required editstore" id="sname" placeholder="Store Name" value="<?php echo $storeinfo['sname']; ?>">
  </fieldset>
  <br>
  <fieldset class="form-group floating-label-form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control required editstore" id="address" placeholder="Address" value="<?php echo $storeinfo['address']; ?>">
  </fieldset>
  <br>
  <div class="row">
    <div class="form-group col-sm-5">
      <label for="city">City</label>
      <input type="text" disabled class="form-control required editstore" id="city" placeholder="City" value="<?php echo ucwords(strtolower($cityinfo['city'])); ?>">
    </div>
    <div class="form-group col-sm-3">
      <label for="state">State</label>
      <input type="text" disabled class="form-control required editstore" id="state" placeholder="State" value="<?php echo $cityinfo['state']; ?>">
    </div>
    <div class="form-group col-sm-4">
      <label for="state">Zip Code</label>
      <input type="text" class="form-control required editstore" id="zipcode" placeholder="Zip Code" value="<?php echo $cityinfo['zipcode']; ?>">
    </div>
  </div>
  <br>
  <fieldset class="form-group floating-label-form-group">
    <label for="address">County</label>
    <input type="text" disabled class="form-control required editstore" id="county" placeholder="County" value="<?php echo ucwords(strtolower($cityinfo['county'])); ?>">
  </fieldset>
  <br>
  <div class="row">
    <div class="form-group col-sm-4">
      <div class="form-group text-center">
        <a href="#" id="pending" class="approval btn btn-info<?php if($storeinfo['live'] == 0) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-hourglass-2"></i></a>
      </div>
    </div>
    <div class="form-group col-sm-4">
      <div class="form-group text-center">
        <a href="#" id="approve" class="approval btn btn-success<?php if($storeinfo['live'] == 1) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-thumbs-up"></i></a>
      </div>
    </div>
    <div class="form-group col-sm-4">
      <div class="form-group text-center">
        <a href="#" id="deny" class="approval btn btn-danger<?php if($storeinfo['live'] == 2) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-thumbs-down"></i></a>
    </div>
  </div>
</div>
