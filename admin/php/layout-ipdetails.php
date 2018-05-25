<?php
$iid = test_input($_POST['iid']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM ip_session WHERE id = '$iid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-ipdetails.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$ipinfo = $result->fetch_assoc(); ?>
<b>Date and Time:</b> <?php echo $ipinfo['dateandtime']; ?><br>
<b>IP Address:</b> <?php echo $ipinfo['ipadd']; ?><br>
<b>Device Type:</b> <?php echo $ipinfo['devicetype']; ?><br>
<b>Operating System:</b> <?php echo $ipinfo['uos']; ?><br>
<b>Browser Used:</b> <?php echo $ipinfo['ubrowser']; ?><br>
<b>IP Location:</b> <?php echo $ipinfo['ulocation']; ?><br>
<b>ISP:</b> <?php echo $ipinfo['uisp']; ?><br>
<b># of Times Visited:</b> <?php echo $ipinfo['sess_count']; ?><br>
<b>Last Page Visited:</b> <?php echo $ipinfo['curpage']; ?><br>
<b>User's ID:</b> <?php echo $ipinfo['uid']; ?>
