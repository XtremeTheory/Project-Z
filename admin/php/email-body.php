<?php
$eid = test_input($_POST['eid']);
$uid = $_SESSION['uid'];

$query = "UPDATE email_messages SET unread = '0' WHERE id = '$eid' AND uid = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","email-body.php","0",$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$query = "SELECT * FROM email_messages WHERE id = '$eid' AND uid = '$uid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","email-body.php",$uid,$sqlError);
  echo "servfailure";
  mysqli_close($test_db);
  exit();
}

$emailinfo = $result->fetch_assoc(); ?>
<div class="email-app-options card-body">
  <div class="row">
    <div class="col-md-6 col-12">
      <div class="btn-group" role="group" aria-label="Button Layout">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
        data-placement="top" data-original-title="Reply"><i class="la la-reply"></i></button>
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
        data-placement="top" data-original-title="Reply All"><i class="la la-reply-all"></i></button>
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
        data-placement="top" data-original-title="Report SPAM"><i class="ft-alert-octagon"></i></button>
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
        data-placement="top" data-original-title="Delete"><i class="ft-trash-2"></i></button>
      </div>
    </div>
    <div class="col-md-6 col-12 text-right">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
        data-placement="top" data-original-title="Previous"><i class="la la-angle-left"></i></button>
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="tooltip"
        data-placement="top" data-original-title="Next"><i class="la la-angle-right"></i></button>
      </div>
      <div class="btn-group ml-1">
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">More</button>
        <div class="dropdown-menu">
          <a class="dropdown-item markUnread" href="#" id="<?php echo $emailinfo['id']; ?>">Mark as Unread</a>
          <?php if($emailinfo['label'] != 1) { ?>
            <a class="dropdown-item markFollow" href="#" id="<?php echo $emailinfo['id']; ?>">Mark as Follow Up</a>
          <?php }
                if($emailinfo['label'] != 2) { ?>
            <a class="dropdown-item markUrgent" href="#" id="<?php echo $emailinfo['id']; ?>">Mark as Urgent</a>
          <?php }
                if($emailinfo['starred'] == 0) { ?>
            <a class="dropdown-item addStar starText" href="#" id="<?php echo $emailinfo['id']; ?>">Add Star</a>
          <?php } else { ?>
            <a class="dropdown-item removeStar starText" href="#" id="<?php echo $emailinfo['id']; ?>">Remove Star</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="email-app-title card-body">
  <h3 class="list-group-item-heading"><?php echo $emailinfo['eSubject'];?></h3>
  <p class="list-group-item-text">
    <div class="row">
      <div class="col-md-6">
    Sent on <?php echo $emailinfo['theDate'] . " " . $emailinfo['theTime']; ?><br>
    From <?php echo $emailinfo['senderName'] . " - " . $emailinfo['fromEmail'];?>
      </div>
      <div class="col-md-6">
    <span class="primary float-right">
      <?php if($emailinfo['label'] == '1') { ?>
        <span class="badge badge-warning mr-1 theBadge">Follow Up</span>
      <?php }
      if($emailinfo['label'] == '2') { ?>
        <span class="badge badge-danger mr-1 theBadge">Urgent</span>
      <?php }
      if($emailinfo['starred'] == '1') { ?>
        <a href="#" class="removeStar"><i class="font-medium-1 ft-star warning starred"></i></a>
      <?php } else { ?>
        <a href="#" class="addStar"><i class="font-medium-1 ft-star blue-grey lighten-3 starred"></i></a>
      <?php } ?></span>
    </div>
  </div>
  </p>

<div class="media-list">
    <div class="card-content">
      <div class="email-app-text card-body">
        <div class="email-app-message">
          <?php echo $emailinfo['eMessage']; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="email-app-text-action card-body">
  </div>
</div>
