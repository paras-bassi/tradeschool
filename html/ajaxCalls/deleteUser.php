<?php
include '../config/connection.php';
$id = $_POST['id'];

$TABLE_NAME = "USER_DATA";

$ud_id = $id[0]+1;

$sql = "DELETE FROM $TABLE_NAME WHERE UD_ID='$ud_id'";
$res=$con->query($sql) or die($con->error);
echo 1;