<?php
$table = 'brands';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'bname', 'dt' => 0),
    array( 'db' => 'id', 'dt' => 1,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-warning btn-sm editBrand" id="'.$d.'" data-toggle="modal" data-target="#editBrand">Edit</button>';
        }
    )
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
