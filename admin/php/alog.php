<?php
$table = 'activity_log';
$primaryKey = 'timestamp';
$columns = array(
    array( 'db' => 'timestamp', 'dt' => 0),
    array( 'db' => 'pagename', 'dt' => 1),
    array( 'db' => 'uid', 'dt' => 2, 'formatter' => function( $d, $row ) {
      require 'db.php';
      $query = "SELECT * FROM user_info WHERE id = '$d'";
    	$result = $test_db->query($query);

      if(!$result) {
        $sqlError = mysqli_error($test_db);
        logError("1","alog.php",$cuid,$sqlError);
        header("Location:".$path."error-500.php");
        mysqli_close($test_db);
        exit();
      }

      $info = $result->fetch_assoc();
      $tierLvl = $info['tier'];

      if($tierLvl == 1) {
        $tierLvl = 'Customer';
      }
      if($tierLvl == 2) {
        $tierLvl = 'Shopper';
      }
      if($tierLvl == 3) {
        $tierLvl = 'Admin';
      }
      if($tierLvl == 4) {
        $tierLvl = 'Manager';
      }
      if($tierLvl == 5) {
        $tierLvl = 'Director';
      }

      return $tierLvl . " : " . $info['fname'] . " " . $info['lname'];
    }),
    array( 'db' => 'activityID', 'dt' => 3, 'formatter' => function( $d, $row ) {
      require 'definitions.php';
      $activityDef = ${'activity'.$d};
      return $activityDef;
    }),
    array( 'db' => 'id', 'dt' => 4,
        'formatter' => function( $d, $row ) {
            return '<button type="button" class="btn btn-info btn-sm activityDetails" id="'.$d.'" data-toggle="modal" data-target="#activityDetails">Details</button>';
        }
    )
);

$sql_details = array(
    'user' => 'prodasher01',
    'pass' => 'Drm3257!',
    'db'   => 'prodasher_main',
    'host' => 'mysql.prodasher.com'
);

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); ?>
