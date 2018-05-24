<?php
  header("Content-type: text/plain");
  global $test_db;
  global $timestamp;
  $to = $_POST['envelope']['to'];
  $from = $_POST['headers']['From'];
  $subject = $_POST['headers']['Subject'];
  $plain = $_POST['plain'];
  $html = $_POST['html'];
  $reply = $_POST['reply_plain'];
  $query = "SELECT * FROM user_settings WHERE compEmail = '$to'";
  $result = $test_db->query($query);

  if(!$result) {
    $sqlError = mysqli_error($test_db);
    logError("1","incoming.php","0",$sqlError);
    mysqli_close($test_db);
    header("HTTP/1.0 500 OK");
    echo('Server Error');
    exit();
  }

  $rowcount = mysqli_num_rows($result);

  if($rowcount != 1) {
    header("HTTP/1.0 403 OK");
    echo('user not allowed here');
    exit();
  }
  
  $userinfo = $result->fetch_assoc();
  $uid = $userinfo['uid'];

  $query = "INSERT INTO email_info(uid, eFrom, eSubject, eMessage) VALUES('$uid','$from','$subject','$plain')";
  $result = $test_db->query($query);

  if($result) {
    header("HTTP/1.0 200 OK");
    echo('success');
    mysqli_close($test_db);
    exit();
  } else {
    $sqlError = mysqli_error($test_db);
    logError("1","incoming.php",$uid,$sqlError);
    mysqli_close($test_db);
    header("HTTP/1.0 500 OK");
    echo('Server Error');
    exit();
  }
?>
