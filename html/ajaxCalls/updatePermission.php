<?php
include '../config/connection.php';
$id = $_POST['id'];
$status = $_POST['ischecked'];

$TABLE_NAME = "USER_DATA";

$ud_id = $id[0];
$sql = "SELECT * FROM $TABLE_NAME WHERE UD_ID='$ud_id'";
$res=$con->query($sql) or die($con->error);
while($th=$res->fetch_assoc()){
    $permission = $th['UD_PERMISSION'];
    $permission[$id[2]] = $status == 'true' ? "T" : "F"; 
}

$sql = "UPDATE $TABLE_NAME SET UD_PERMISSION='$permission' WHERE UD_ID='$ud_id'";
$res=$con->query($sql) or die($con->error);
echo 1;