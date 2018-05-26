<?php
$uid = $_SESSION['uid'];
$task = test_input($_POST['task']);

if($task == "inbox") {
  $query = "SELECT * FROM email_messages WHERE uid = '$uid' AND status = '1'";
  $result = $test_db->query($query);
}

if($task == "sent") {
  $query = "SELECT * FROM email_messages WHERE uid = '$uid' AND status = '2'";
  $result = $test_db->query($query);
}

if($task == "draft") {
  $query = "SELECT * FROM email_messages WHERE uid = '$uid' AND status = '3'";
  $result = $test_db->query($query);
}

if($task == "star") {
  $query = "SELECT * FROM email_messages WHERE uid = '$uid' AND starred = '1'";
  $result = $test_db->query($query);
}

if($task == "trash") {
  $query = "SELECT * FROM email_messages WHERE uid = '$uid' AND status = '4'";
  $result = $test_db->query($query);
}

if($task == "follow") {
  $query = "SELECT * FROM email_messages WHERE uid = '$uid' AND label = '1'";
  $result = $test_db->query($query);
}

if($task == "urgent") {
  $query = "SELECT * FROM email_messages WHERE uid = '$uid' AND label = '2'";
  $result = $test_db->query($query);
}

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","email-system.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$email_rows = mysqli_num_rows($result);

if($email_rows > 0) {
while($row = mysqli_fetch_assoc($result)) {
  $senderName = $row['senderName'];
  $theDate = $row['theDate'];
  $theTime = $row['theTime'];
  $todayDate = date("m/d/Y");
  $dateandtime = $todayDate;
  $eSubject = $row['eSubject'];
  $eMessage = $row['eMessage'];
  $partSub = "";
  $partMess = "";

  if($theDate == $todayDate) {
    $dateandtime = $theTime;
  }

  if($senderName != "") {
    $firstInt = ucwords(substr($senderName,0,1));
  } else {
    $firstInt = "?";
  }

  $subLength = strlen($eSubject);

  if($subLength > 18) {
    $partSub = substr($eSubject,0,18);
    $partSub = $partSub . "...";
  } else {
    $partSub = $eSubject;
  }

  $mesLength = strlen($eMessage);

  if($mesLength > 15) {
    $partMess = substr($eMessage,0,15);
    $partMess = $partMess . "...";
  } else {
    $partMess = $eMessage;
  } ?>
  <a href="#" class="media border-0 emailButton" id="<?php echo $row['id']; ?>">
    <div class="media-left pr-1">
      <span class="avatar avatar-md">
        <span class="media-object rounded-circle text-circle bg-info"><?php echo $firstInt; ?></span>
      </span>
    </div>
    <div class="media-body w-100">
      <h6 class="list-group-item-heading text-bold-500"><?php echo $senderName; ?>
        <span class="float-right">
          <span class="font-small-2 primary"><?php echo $dateandtime; ?></span>
        </span>
      </h6>
        <?php if($row['unread'] == '0') { ?>
          <p class="list-group-item-text text-truncate mb-0 checkMark"><i class="ft-check primary font-small-2 checkIcon"></i>
        <?php echo $partSub; ?></p>
        <?php } else { ?>
        <p class="list-group-item-text text-truncate text-bold-600 mb-0 checkMark">
          <?php echo $partSub; ?>
        </p>
      <?php } ?>
      <p class="list-group-item-text mb-0"><?php echo $partMess; ?>
        <span class="float-right primary">
          <?php if($row['label'] == '1') { ?>
            <span class="badge badge-warning mr-1 theBadge">Follow Up</span>
          <?php }
          if($row['label'] == '2') { ?>
            <span class="badge badge-danger mr-1 theBadge">Urgent</span>
          <?php }
          if($row['starred'] == '1') { ?>
            <i class="font-medium-1 ft-star warning starred"></i>
          <?php } else { ?>
            <i class="font-medium-1 ft-star blue-grey lighten-3 starred"></i>
          <?php } ?></span>
      </p>
    </div>
  </a>
<?php }
} else { ?>
  <div class="row"><div class="col-md-3 col-12"></div><div class="col-md-9 col-12"><i class="la la-spinner spinner"></i> <b>No emails yet...</b></div></div>
<?php }
//Replace First initial with User's image
//<span class="avatar avatar-md">
//<img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-10.png" alt="Generic placeholder image">
//<i></i></span>
?>
