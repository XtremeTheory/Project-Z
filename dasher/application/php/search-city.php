<?php
$phrase = trim(strip_tags($_GET['phrase']));
$phrase = preg_replace('/\s+/', ' ', $phrase);
$phrase = addslashes($phrase);

$a_json = array();
$a_json_row = array();

if ($data = $test_db->query("SELECT * FROM city_list WHERE zipcode LIKE '%$phrase%' ORDER BY zipcode")) {
  if(!mysqli_num_rows($data)) {
    $a_json_row["name"] = "None";
    $a_json_row["id"] = 0;
    array_push($a_json, $a_json_row);
  } else {
    while($row = mysqli_fetch_array($data)) {
      $did = $row['district'];
      if($did != 0) {
        $query = "SELECT * FROM district_list WHERE id = '$did'";
        $result = $test_db->query($query);
        $info = $result->fetch_assoc();
        $a_json_row["name"] = $info['dname'];
        $a_json_row["live"] = $info['live'];
        $a_json_row["zipcode"] = $row['zipcode'];
        $a_json_row["id"] = $info['id'];
        array_push($a_json, $a_json_row);
      } else {
        $a_json_row["name"] = "Not Assigned";
        $a_json_row["zipcode"] = $row['zipcode'];
        $a_json_row["live"] = "0";
        $a_json_row["id"] = "0";
        array_push($a_json, $a_json_row);
      }
    }
  }
}

echo json_encode($a_json);
flush();
$test_db->close();
exit(); ?>
