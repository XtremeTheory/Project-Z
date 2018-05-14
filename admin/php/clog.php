<?php
$query = "SELECT * FROM change_log";
$info = $test_db->query($query);
$rowcount = mysqli_num_rows($info);
if($rowcount != 0) {
  while($results = $info->fetch_array()) {
    $result_array[] = $results;
  }
  foreach ($result_array as $details) {
    $uid = $details['uid'];
    $query = "SELECT * FROM user_info WHERE id = '$uid'";
  	$result = $test_db->query($query);
    $info = $result->fetch_assoc();
    $uname = $info['fname'] . " " . $info['lname'];
    $ustatus = $info['usertype']; ?>
    <tr>
      <td><?php echo $details['dateandtime']; ?></td>
      <td><?php echo $ustatus; ?></td>
      <td><?php echo $uname; ?></td>
      <td><?php echo $details['activity']; ?></td>
      <td><a href="#">More Details</a></td>
    </tr>
<?php }
} ?>
