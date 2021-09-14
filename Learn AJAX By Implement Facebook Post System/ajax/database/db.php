<?php

$localhost = "localhost";
$username  = "root";
$password  = "root";
$dbname    = "names";

$conn = mysqli_connect($localhost, $username, $password, $dbname);

//
//if($conn) {
//    echo "Connection Done";
//}else {
//    echo "Connetion failed";
//}