<?php
$uid = test_input($_POST['uid']);
$query = "SELECT * FROM user_info WHERE id = '$uid'";
$result = $test_db->query($query);
$userinfo = $result->fetch_assoc();
$cid = $userinfo['cid'];
$query1 = "SELECT * FROM city_list WHERE id = '$cid'";
$result1 = $test_db->query($query1);
$cityinfo = $result1->fetch_assoc();
?>
  <b>Name:</b> <?php echo ucwords(strtolower($userinfo['fname'])); ?> <?php echo ucwords(strtolower($userinfo['lname'])); ?><br>
  <b>Address:</b> <?php echo $userinfo['address']; ?>
  <div class="row">
    <div class="form-group col-sm-12"><?php echo ucwords(strtolower($cityinfo['city'])); ?>, <?php echo $cityinfo['state']; ?> <?php echo $cityinfo['zipcode']; ?></div>
  </div>
  <b>County:</b> <?php echo ucwords(strtolower($cityinfo['county'])); ?><br>
  <b>Current Live Status:</b>
  <?php $d = $userinfo['live'];
  if($d == 0) { ?>
    <div class="badge badge-info">Pending</div>
  <?php } elseif($d == 1) { ?>
    <div class="badge badge-success">Approved</div>
  <?php } else { ?>
    <div class="badge badge-danger">Rejected</div>
  <?php } ?>
