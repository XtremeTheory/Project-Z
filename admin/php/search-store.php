<?php
$phrase = trim(strip_tags($_GET['phrase']));
$phrase = preg_replace('/\s+/', ' ', $phrase);
$phrase = addslashes($phrase);

$a_json = array();
$a_json_row = array();

if ($data = $test_db->query("SELECT * FROM store_data WHERE sname LIKE '%$phrase%' ORDER BY sname")) {
  if(!mysqli_num_rows($data)) {
    $a_json_row["name"] = "No Results Found.";
    $a_json_row["id"] = 0;
    array_push($a_json, $a_json_row);
  } else {
    while($row = mysqli_fetch_array($data)) {
      $a_json_row["name"] = $row['sname'];
      $a_json_row["address"] = $row['address'];
      $a_json_row["id"] = $row['id'];
      array_push($a_json, $a_json_row);
    }
  }
}

echo json_encode($a_json);
flush();
$test_db->close();
exit(); ?>
