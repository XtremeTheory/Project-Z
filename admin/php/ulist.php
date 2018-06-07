<?php
$table = 'user_info';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'registerdate', 'dt' => 0),
    array( 'db' => 'tier', 'dt' => 1,
        'formatter' => function( $d, $row ) {
          if($d == 1) {
            $userType = "Customer";
            }
            if($d == 2) {
              $userType = "Shopper";
              }
              if($d == 3) {
                $userType = "Admin";
                }
                if($d == 4) {
                  $userType = "Manager";
                  }
                  if($d == 5) {
                    $userType = "Customer";
                    }
            return $userType;
        }
    ),
    array( 'db' => 'fname', 'dt' => 2),
    array( 'db' => 'lname', 'dt' => 3),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm userDetails" id="'.$d.'" data-toggle="modal" data-target="#userDetails">Details</button> <button type="button" class="btn btn-warning btn-sm editUser" id="'.$d.'" data-toggle="modal" data-target="#editUser">Edit</button> <button type="button" class="btn btn-danger btn-sm deleteUser" id="'.$d.'">Delete</button>';
        }
    )
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
