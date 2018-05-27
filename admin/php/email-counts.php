<?php
function getUnreadCount() {
  global $test_db;
  $uid = $_SESSION['uid'];
  $query = "SELECT COUNT(*) AS total FROM email_messages WHERE uid = '$uid' AND unread = '1'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","email-system.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  $data = mysqli_fetch_assoc($result);
  return $data['total'];
}

function getStarsCount() {
  global $test_db;
  $uid = $_SESSION['uid'];
  $query = "SELECT COUNT(*) AS total FROM email_messages WHERE uid = '$uid' AND starred = '1'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","email-system.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  $data = mysqli_fetch_assoc($result);
  return $data['total'];
}

function getFuCount() {
  global $test_db;
  $uid = $_SESSION['uid'];
  $query = "SELECT COUNT(*) AS total FROM email_messages WHERE uid = '$uid' AND label = '1'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","email-system.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  $data = mysqli_fetch_assoc($result);
  return $data['total'];
}

function getUrgentCount() {
  global $test_db;
  $uid = $_SESSION['uid'];
  $query = "SELECT COUNT(*) AS total FROM email_messages WHERE uid = '$uid' AND label = '2'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","email-system.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  $data = mysqli_fetch_assoc($result);
  return $data['total'];
}

function getCortanaCount() {
  global $test_db;
  $uid = $_SESSION['uid'];
  $query = "SELECT COUNT(*) AS total FROM email_messages WHERE label = '3'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","email-system.php",$uid,$sqlError);
    echo "servfailure";
    mysqli_close($test_db);
    exit();
  }

  $data = mysqli_fetch_assoc($result);
  return $data['total'];
}

if($_GET['task'] == "getAll") {
  $result = array();
  $result['unreadCount'] = getUnreadCount();
  $result['starCount'] = getStarsCount();
  $result['fuCount'] = getFuCount();
  $result['urgentCount'] = getUrgentCount();
  $result['corCount'] = getCortanaCount();
  echo json_encode($result);
}?>
