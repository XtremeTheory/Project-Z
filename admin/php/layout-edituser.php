<?php
require 'db.php';
require 'functions.php';
$uid = test_input($_POST['uid']);
$query = "SELECT * FROM user_info WHERE id = '$uid'";
$result = $test_db->query($query);
$userinfo = $result->fetch_assoc();
$cid = $userinfo['cid'];
$query1 = "SELECT * FROM city_list WHERE id = '$cid'";
$result1 = $test_db->query($query1);
$cityinfo = $result1->fetch_assoc();
?>
<div class="row">
  <div class="form-group col-sm-6">
    <label for="fname">First Name</label>
    <input type="text" class="form-control required edituser" id="fname" placeholder="First Name" value="<?php echo ucwords(strtolower($userinfo['fname'])); ?>">
  </div>
  <div class="form-group col-sm-6">
    <label for="lname">Last Name</label>
    <input type="text" class="form-control required edituser" id="lname" placeholder="Last Name" value="<?php echo ucwords(strtolower($userinfo['lname'])); ?>">
  </div>
</div>
  <div class="row">
    <div class="form-group col-sm-12">
      <label for="address">Address</label>
      <input type="text" class="form-control required edituser" id="address" placeholder="Address" value="<?php echo ucwords(strtolower($userinfo['address'])); ?>">
    </div>
  </div>
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="address2">Address - 2nd Line</label>
        <input type="text" class="form-control" id="address2" placeholder="Address - 2nd Line" value="<?php echo ucwords(strtolower($userinfo['address2'])); ?>">
      </div>
    </div>
  <div class="row">
    <div class="form-group col-sm-5">
      <label for="city">City</label>
      <input type="text" disabled class="form-control required edituser" id="city" placeholder="City" value="<?php echo ucfirst(strtolower($cityinfo['city'])); ?>">
    </div>
    <div class="form-group col-sm-3">
      <label for="state">State</label>
      <input type="text" disabled class="form-control required edituser" id="state" placeholder="State" value="<?php echo $cityinfo['state']; ?>">
    </div>
    <div class="form-group col-sm-4">
      <label for="state">Zip Code</label>
      <input type="text" class="form-control required edituser" id="zipcode" placeholder="Zip Code" value="<?php echo $cityinfo['zipcode']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="form-group col-sm-12">
      <label for="county">County</label>
      <input type="text" class="form-control required edituser" id="county" placeholder="County" value="<?php echo ucwords(strtolower($cityinfo['county'])); ?>">
    </div>
  </div>
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="phonenum">Phone Number</label>
        <input type="text" class="form-control required edituser" id="phonenum" placeholder="Phone Number" value="<?php echo $userinfo['phonenum']; ?>">
      </div>
      <div class="form-group col-sm-6">
        <label for="email">Email</label>
        <input type="text" class="form-control required edituser" id="email" placeholder="Email" value="<?php echo $userinfo['email']; ?>">
      </div>
    </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <label for="username">Username</label>
          <input type="text" class="form-control required edituser" id="username" placeholder="Username" value="<?php echo $userinfo['username']; ?>">
        </div>
        <div class="form-group col-sm-6">
          <label for="usertype">User Type</label>
          <input type="text" class="form-control required edituser" id="usertype" placeholder="User Type" value="<?php echo $userinfo['usertype']; ?>">
        </div>
      </div>
  <div class="row">
    <div class="form-group col-sm-4">
      <div class="form-group text-center">
        <a href="#" id="pending" class="approval btn btn-info<?php if($userinfo['live'] == 0) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-hourglass-2"></i></a>
      </div>
    </div>
    <div class="form-group col-sm-4">
      <div class="form-group text-center">
        <a href="#" id="approve" class="approval btn btn-success<?php if($userinfo['live'] == 1) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-thumbs-up"></i></a>
      </div>
    </div>
    <div class="form-group col-sm-4">
      <div class="form-group text-center">
        <a href="#" id="deny" class="approval btn btn-danger<?php if($userinfo['live'] == 2) { ?> disabled btn-glow btn-float btn-float-lg<?php } ?>"><i class="la la-thumbs-down"></i></a>
    </div>
  </div>
</div>
