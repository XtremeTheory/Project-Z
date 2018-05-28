<?php
$uid = $_SESSION['uid'];
$table = 'product_store_data';
$primaryKey = 'id';
$columns = array(
  array( 'db' => 'pid', 'dt' => 0,
      'formatter' => function( $d, $row ) {
        global $test_db;
        $query = "SELECT * FROM product_list WHERE id = '$d'";
        $result = $test_db->query($query);

        if(!$result) {
          $sqlError = mysqli_error($test_db);
          logError("1","invapplist.php",$uid,$sqlError);
          header("Location:".$path."error-500.php");
          mysqli_close($test_db);
          exit();
        }

        $prodinfo = $result->fetch_assoc();
        $bid = $prodinfo['brand'];
        $query1 = "SELECT * FROM brands WHERE id = '$bid'";
        $result1 = $test_db->query($query1);

        if(!$result1) {
          $sqlError = mysqli_error($test_db);
          logError("1","invapplist.php",$uid,$sqlError);
          header("Location:".$path."error-500.php");
          mysqli_close($test_db);
          exit();
        }

        $brandinfo = $result1->fetch_assoc();
        $product = "<b>" . $brandinfo['bname'] . "</b> " . $prodinfo['pname'];

        return $product;
      }
  ),
  array( 'db' => 'sid', 'dt' => 1,
      'formatter' => function( $d, $row ) {
        global $test_db;
        $query = "SELECT * FROM store_data WHERE id = '$d'";
        $result = $test_db->query($query);

        if(!$result) {
          $sqlError = mysqli_error($test_db);
          logError("1","invapplist.php",$uid,$sqlError);
          header("Location:".$path."error-500.php");
          mysqli_close($test_db);
          exit();
        }

        $storeinfo = $result->fetch_assoc();
        $store = $storeinfo['sname'] . " - " . $storeinfo['address'];
        return $store;
      }
  ),
  array( 'db' => 'uid', 'dt' => 2,
      'formatter' => function( $d, $row ) {
        global $test_db;
        $query = "SELECT * FROM user_info WHERE id = '$d'";
        $result = $test_db->query($query);

        if(!$result) {
          $sqlError = mysqli_error($test_db);
          logError("1","invapplist.php",$uid,$sqlError);
          header("Location:".$path."error-500.php");
          mysqli_close($test_db);
          exit();
        }

        $userinfo = $result->fetch_assoc();
        $user = $userinfo['fname'] . " " . $userinfo['lname'];
        return $user;
      }
  ),
    array( 'db' => 'dateandtime', 'dt' => 3),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm productDetails" id="'.$d.'" data-toggle="modal" data-target="#productDetails">Details</button> <button type="button" class="btn btn-warning btn-sm editProduct" id="'.$d.'" data-toggle="modal" data-target="#editProduct">Edit</button> <button type="button" class="btn btn-danger btn-sm deleteInventory" id="'.$d.'">Delete</button>';
        }
    )
);

$sql_details = array(
    'user' => 'prodasher01',
    'pass' => 'Drm3257!',
    'db'   => 'prodasher_main',
    'host' => 'mysql.prodasher.com'
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
