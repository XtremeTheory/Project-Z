<?php
$query = "SELECT * FROM activity_log";
$result = $test_db->query($query);
$cuid = $_SESSION['uid'];

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","alog.php",$cuid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);
if($rowcount != 0) {
  while($results = $result->fetch_array()) {
    $result_array[] = $results;
  }
  foreach ($result_array as $details) {
    $uid = $details['uid'];
    $query = "SELECT * FROM user_info WHERE id = '$uid'";
  	$result = $test_db->query($query);

    if(!$result) {
      $sqlError = mysqli_error($test_db);
      logError("1","alog.php",$cuid,$sqlError);
      header("Location:".$path."error-500.php");
      mysqli_close($test_db);
      exit();
    }

    $info = $result->fetch_assoc();
    $uname = $info['fname'] . " " . $info['lname'];
    $tier = $info['tier'];
    $activityDef = ${'activity'.$details['activityID']};

    if($tier == 1) {
      $ustatus = "Shopper";
    }

    if($tier == 2) {
      $ustatus = "Admin";
    }

    if($tier == 3) {
      $ustatus = "Manager";
    }

    if($tier == 4) {
      $ustatus = "Customer";
    } ?>
    <tr>
      <td><?php echo $details['timestamp']; ?></td>
      <td><?php echo $ustatus; ?></td>
      <td><?php echo $uname; ?></td>
      <td><?php echo $activityDef; ?></td>
      <td><button type="button" class="btn btn-info btn-sm activityDetails" id="<?php echo $details['id']; ?>" data-toggle="modal" data-target="#activityDetails">Details</button></td>
    </tr>
<?php }
} ?>
