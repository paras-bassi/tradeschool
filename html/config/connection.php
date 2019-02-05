<?php
session_start();
$hostname="localhost";
$username="root";
$password="root";
$dbname="tradeschool";
$con=new mysqli($hostname,$username,$password,$dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}