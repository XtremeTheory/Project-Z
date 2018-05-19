<?php
require 'db.php';
$table = 'product_list';
$primaryKey = 'id';
$columns = array(
  array( 'db' => 'brand', 'dt' => 0,
      'formatter' => function( $d, $row ) {
        global $test_db;
        $query = "SELECT * FROM brands WHERE id = '$d'";
        $result = $test_db->query($query);
        $brandinfo = $result->fetch_assoc();
        return $brandinfo['bname'];
      }
  ),
    array( 'db' => 'pname', 'dt' => 1),
    array( 'db' => 'upc', 'dt' => 2),
    array( 'db' => 'dept', 'dt' => 3),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm productDetails" id="'.$d.'" data-toggle="modal" data-target="#productDetails">Details</button> <button type="button" class="btn btn-warning btn-sm editProduct" id="'.$d.'" data-toggle="modal" data-target="#editProduct">Edit</button> <button type="button" class="btn btn-danger btn-sm deleteProduct" id="'.$d.'">Delete</button>';
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
