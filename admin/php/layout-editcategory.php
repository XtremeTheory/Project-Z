<?php
$cid = test_input($_POST['cid']);
$uid = $_SESSION['uid'];
$query = "SELECT * FROM categories WHERE id = '$cid'";
$result = $test_db->query($query);

if(!$result) {
  $sqlError = mysqli_error($test_db);
  logError("1","layout-editcategory.php",$uid,$sqlError);
  header("Location:".$path."error-500.php");
  mysqli_close($test_db);
  exit();
}

$info = $result->fetch_assoc(); ?>
  <fieldset class="form-group floating-label-form-group">
    <label for="category">Category</label>
    <input type="text" class="form-control required editcategory" id="cname" placeholder="Category" value="<?php echo $info['cname']; ?>">
  </fieldset>
