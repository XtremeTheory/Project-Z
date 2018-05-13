<?php
$table = 'user_info';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'registerdate', 'dt' => 0),
    array( 'db' => 'usertype', 'dt' => 1),
    array( 'db' => 'fname', 'dt' => 2),
    array( 'db' => 'lname', 'dt' => 3),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<a href="#?id=' . $d . '" class="badge badge-info">More Details</a> <a href="#?id=' . $d . '" class="badge badge-warning">Edit</a> <a href="#?id=' . $d . '" class="badge badge-danger">Delete</a>';
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
