<?php
$table = 'ip_sessions';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'ipadd', 'dt' => 0),
    array( 'db' => 'dateandtime', 'dt' => 1),
    array( 'db' => 'curpage', 'dt' => 2),
    array( 'db' => 'ulocation', 'dt' => 3),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm ipDetails" id="'.$d.'" data-toggle="modal" data-target="#ipDetails">Details</button>';
        }
    )
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
