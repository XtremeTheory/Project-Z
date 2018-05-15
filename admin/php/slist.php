<?php
$table = 'store_data';
$primaryKey = 'id';
$columns = array(
  array( 'db' => 'live', 'dt' => 0, 'formatter' => function( $d, $row ) {
    if($d == 1) {
      return '<div class="badge badge-success">TRUE</div>';
    } else {
      return '<div class="badge badge-danger">FALSE</div>';
    }
  }),
    array( 'db' => 'sname', 'dt' => 1),
    array( 'db' => 'address', 'dt' => 2),
    array( 'db' => 'cid', 'dt' => 3, 'formatter' => function( $d, $row ) {
      require 'db.php';
      $query = "SELECT * FROM city_list WHERE id = '$d'";
    	$result = $test_db->query($query);
      $info = $result->fetch_assoc();
      $cityinfo = ucfirst(strtolower($info['city'])) . ", " . $info['state'] . " " . $info['zipcode'];
      return $cityinfo;
    }),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm storeDetails" id="'.$d.'" data-toggle="modal" data-target="#storeDetails">Details</button> <button type="button" class="btn btn-warning btn-sm editStore" id="'.$d.'" data-toggle="modal" data-target="#editStore">Edit</button> <button type="button" class="btn btn-danger btn-sm deleteStore" id="'.$d.'">Delete</button>';
        }
    )
);

$sql_details = array(
    'user' => 'bodtrack_admin',
    'pass' => 'Drm3257!',
    'db'   => 'bodtrack_main',
    'host' => 'mysql.bodtracker.com'
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
