<?php
$table = 'city_list';
$primaryKey = 'zipcode';
$columns = array(
    array( 'db' => 'live', 'dt' => 0,
      'formatter' => function( $d, $row ) {
        if($d == 1) {
          return '<div class="badge badge-success">TRUE</div>';
        } else {
          return '<div class="badge badge-danger">FALSE</div>';
        }
      }
    ),
    array( 'db' => 'zipcode', 'dt' => 1),
    array( 'db' => 'city', 'dt' => 2,
        'formatter' => function( $d, $row ) {
            return ucwords(strtolower($d));
        }
    ),
    array( 'db' => 'state', 'dt' => 3),
    array( 'db' => 'county', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return ucwords(strtolower($d));
        }
    ),
    array( 'db' => 'id', 'dt' => 5,
        'formatter' => function( $d, $row ) {
            return '<a href="#?id=' . $d . '">Map</a>';
        }
    )
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
