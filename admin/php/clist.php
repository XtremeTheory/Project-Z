<?php
$table = 'categories';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'cname', 'dt' => 0),
    array( 'db' => 'id', 'dt' => 1,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-warning btn-sm editCategory" id="'.$d.'" data-toggle="modal" data-target="#editCategory">Edit</button>';
        }
    )
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
