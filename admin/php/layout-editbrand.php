<?php
$bid = test_input($_POST['bid']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM brands WHERE id = '$bid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-editbrand.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$brandinfo = $result->fetch_assoc(); ?>
  <fieldset class="form-group floating-label-form-group">
    <label for="sname">Brand Name</label>
    <input type="text" class="form-control required editbrand" id="bname" placeholder="Brand Name" value="<?php echo $brandinfo['bname']; ?>">
  </fieldset>
