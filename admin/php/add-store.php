<?php
session_start();
require 'db.php';
require 'functions.php';

$sname = test_input($_POST['sname']);
$address = test_input($_POST['address']);
$zipcode = test_input($_POST['zipcode']);
$query = "SELECT * FROM city_list WHERE zipcode = '$zipcode'";
$result = $test_db->query($query);
$info = $result->fetch_assoc();
$cid = $info['id'];
$approval = 0;
$uid = 1;
date_default_timezone_set("America/New_York");
$dateandtime = date("m-d-Y H:i:s");

$query = "INSERT INTO store_data (sname, address, cid, uid, live, dateadded) VALUES('$sname', '$address', '$cid', '$uid', '$approval', '$dateandtime')";
$result = $test_db->query($query);

if($result) {
	echo "correct";
}
?>
