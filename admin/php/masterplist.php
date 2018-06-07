<?php
$uid = $_SESSION['uid'];
$table = 'product_list';
$primaryKey = 'id';
$columns = array(
  array( 'db' => 'brand', 'dt' => 0,
      'formatter' => function( $d, $row ) {
        global $test_db;
        $query = "SELECT * FROM brands WHERE id = '$d'";
        $result = $test_db->query($query);

        if(!$result) {
          $sqlError = mysqli_error($test_db);
          logError("1","plist.php",$uid,$sqlError);
          header("Location:".$path."error-500.php");
          mysqli_close($test_db);
          exit();
        }

        $brandinfo = $result->fetch_assoc();
        return $brandinfo['bname'];
      }
  ),
    array( 'db' => 'pname', 'dt' => 1),
    array( 'db' => 'upc', 'dt' => 2),
    array( 'db' => 'cate', 'dt' => 3),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm productDetails" id="'.$d.'" data-toggle="modal" data-target="#productDetails">Details</button> <button type="button" class="btn btn-warning btn-sm editProduct" id="'.$d.'" data-toggle="modal" data-target="#editProduct">Edit</button>';
        }
    )
);

require( 'ssp.class.php' );
$whereAll = "live = 1";
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $whereAll )
); ?>
