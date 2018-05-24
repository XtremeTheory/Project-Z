<?php
$aid = test_input($_POST['aid']);
$cuid = $_SESSION['uid'];
$query = "SELECT * FROM activity_log WHERE id = '$aid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-activitydetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$activityinfo = $result->fetch_assoc();
$uid = $activityinfo['uid'];
$aid = $activityinfo['activityID'];
$activityDef = ${'activity'.$activityinfo['activityID']};
$query = "SELECT * FROM user_info WHERE id = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-activitydetails.php",$cuid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$userinfo = $result->fetch_assoc(); ?>
  <b>Occured on:</b> <?php echo $activityinfo['timestamp']; ?><br>
  <b>Page Name:</b> <?php echo $activityinfo['pagename']; ?>
  <div class="row">
    <div class="form-group col-sm-12"><b>User's Name:</b> <?php echo ucwords(strtolower($userinfo['fname'])); ?> <?php echo ucwords(strtolower($userinfo['lname'])); ?></div>
  </div>
  <b>Activity:</b> <?php echo $activityDef; ?><br><br>

  <b>User's OS:</b> <?php echo $activityinfo['uOS']; ?><br>
  <b>User's Browser:</b> <?php echo $activityinfo['ubrowser']; ?><br>
  <b>IP Address:</b> <?php echo $activityinfo['ipadd']; ?>
