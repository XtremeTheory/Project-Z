<?php
  global $test_db;
  $dbhost = "mysql.prodasher.com";
  $dbname = "prodasher_main";
  $dbuser = "prodasher01";
  $dbpass = "Drm3257!";

  $test_db = new mysqli();
  $test_db->connect($dbhost, $dbuser, $dbpass, $dbname);
  $test_db->set_charset("utf8");

  // Check Connection
  if ($test_db->connect_errno) {
    printf("Connect failed: %s\n", $test_db->connect_error);
    exit();
  }
?>
