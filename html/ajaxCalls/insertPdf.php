<?php
include '../config/connection.php';

$TABLE_NAME = "PDF";

$target_images = "../uploads/pdf/images/".$_FILES['imagename']['name'];
$target_files = "../uploads/pdf/files/".$_FILES['pdfname']['name'];

if(copy($_FILES['imagename']['tmp_name'], $target_images) && copy($_FILES['pdfname']['tmp_name'], $target_files)){

    $sql = "INSERT INTO $TABLE_NAME VALUES('', '".$_POST['title']."','$target_images','$target_files')";
    $res=$con->query($sql) or die($con->error);    

}
echo 1;