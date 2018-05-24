<?php
$query = "SELECT * FROM ip_sessions";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-activitydetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$rowcount = mysqli_num_rows($result);
if($rowcount != 0) {
  while($results = $result->fetch_array()) {
    $result_array[] = $results;
  }
  foreach ($result_array as $details) { ?>
    <tr>
      <td><?php echo $details['ipadd']; ?></td>
      <td><?php echo $details['dateandtime']; ?></td>
      <td><?php echo $details['curpage']; ?></td>
      <td><?php echo $details['ulocation']; ?></td>
      <td><a href="#">More Details</a></td>
    </tr>
<?php }
} ?>
