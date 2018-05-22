<?php
$eid = test_input($_POST['eid']);
$query = "SELECT * FROM error_log WHERE id = '$eid'";
$result = $test_db->query($query);
$errorinfo = $result->fetch_assoc();
$errorDetails = ${'error'.$errorinfo['errorcode']}; ?>
<b>Date and Time:</b> <?php echo $errorinfo['dateandtime']; ?><br>
<b>File Name:</b> <?php echo $errorinfo['filename']; ?><br>
<b>General Error:</b> <?php echo $errorDetails; ?><br>
<b>Custom Error:</b> <?php echo $errorinfo['errormessage']; ?><br>
<b>Error Status:</b>
<?php $d = $errorinfo['level'];
  if($d == 0) { ?>
    <div class="badge badge-info">General</div>
<?php } elseif($d == 1) { ?>
  <div class="badge badge-warning">Needs Attention</div>
<?php } else { ?>
  <div class="badge badge-danger">Critical</div>
<?php } ?><br><br>

<b>Operating System:</b> <?php echo $errorinfo['uOS']; ?><br>
<b>Browser Used:</b> <?php echo $errorinfo['ubrowser']; ?><br>
<b>IP Address:</b> <?php echo $errorinfo['ipadd']; ?>
