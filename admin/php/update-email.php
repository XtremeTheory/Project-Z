<?php
$eid = test_input($_POST['eid']);
$task = test_input($_POST['task']);
$uid = $_SESSION['uid'];

if($task == "markUnread") {
  $query = "UPDATE email_messages SET unread = '1' WHERE id = '$eid' AND uid = '$uid'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","update-email.php","0",$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  echo "complete";
}

if($task == "markFollow") {
  $query = "UPDATE email_messages SET label = '1' WHERE id = '$eid' AND uid = '$uid'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","update-email.php","0",$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  echo "complete";
}

if($task == "markUrgent") {
  $query = "UPDATE email_messages SET label = '2' WHERE id = '$eid' AND uid = '$uid'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","update-email.php","0",$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  echo "complete";
}

if($task == "removeStar") {
  $query = "UPDATE email_messages SET starred = '0' WHERE id = '$eid' AND uid = '$uid'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","update-email.php","0",$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  echo "complete";
}

if($task == "addStar") {
  $query = "UPDATE email_messages SET starred = '1' WHERE id = '$eid' AND uid = '$uid'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","update-email.php","0",$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  echo "complete";
}
?>
