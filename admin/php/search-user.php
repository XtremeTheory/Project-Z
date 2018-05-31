<?php
$phrase = trim(strip_tags($_GET['phrase']));
$phrase = strtolower($phrase);
$name = explode(" ", $phrase);
$fname = $name[0];
$lname = "";

if(isset($name[1])) {
  $lname = $name[1];
}

$a_json = array();
$a_json_row = array();

if($lname != "") {
  if ($data = $test_db->query("SELECT * FROM user_info WHERE fname LIKE '%$fname%' AND lname LIKE '%$lname%' ORDER BY id")) {
    if(!mysqli_num_rows($data)) {
      $a_json_row["name"] = "No Results Found.";
      $a_json_row["id"] = 0;
      array_push($a_json, $a_json_row);
    } else {
      while($row = mysqli_fetch_array($data)) {
        $name = $row['fname'] . " " . $row['lname'];
        $a_json_row["name"] = $name;
        $a_json_row["id"] = $row['id'];
        array_push($a_json, $a_json_row);
      }
    }
  }
} else {
  if ($data = $test_db->query("SELECT * FROM user_info WHERE fname LIKE '%$fname%' ORDER BY id")) {
    if(!mysqli_num_rows($data)) {
      $a_json_row["name"] = "No Results Found.";
      $a_json_row["id"] = 0;
      array_push($a_json, $a_json_row);
    } else {
      while($row = mysqli_fetch_array($data)) {
        $name = $row['fname'] . " " . $row['lname'];
        $a_json_row["name"] = $name;
        $a_json_row["id"] = $row['id'];
        array_push($a_json, $a_json_row);
      }
    }
  }
}

echo json_encode($a_json);
flush();
$test_db->close();
exit(); ?>
