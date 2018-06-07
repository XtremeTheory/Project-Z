<?php
$table = 'error_log';
$primaryKey = 'id';
$columns = array(
  array( 'db' => 'level', 'dt' => 0, 'formatter' => function( $d, $row ) {
    if($d == 0) {
      return '<div class="badge badge-info">General</div>';
    } elseif($d == 1) {
      return '<div class="badge badge-warning">Needs Attention</div>';
    } else {
      return '<div class="badge badge-danger">Critical</div>';
      }
  }),
    array( 'db' => 'dateandtime', 'dt' => 1),
    array( 'db' => 'filename', 'dt' => 2),
    array( 'db' => 'errorcode', 'dt' => 3, 'formatter' => function( $d, $row ) {
      require 'definitions.php';
      $errorDef = ${'error'.$d};
      return $errorDef;
    }),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm errorDetails" id="'.$d.'" data-toggle="modal" data-target="#errorDetails">Details</button>';
        }
    )
);

require( 'ssp.class.php' );

$whereAll = "status = 1";
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $whereAll )
); ?>
