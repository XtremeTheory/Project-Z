<?php
$query = "SELECT * FROM ip_sessions";
$info = $test_db->query($query);
$rowcount = mysqli_num_rows($info);
if($rowcount != 0) {
  while($results = $info->fetch_array()) {
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
