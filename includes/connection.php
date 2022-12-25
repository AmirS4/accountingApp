<?php

$host = "localhost";
$dbname = "accounting";
$username = "accounting";
$password = "accounting";

$mysqli = new mysqli($host,$username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("connection error: " . $mysqli->connect_error);
}

return $mysqli;

//$mysqli = mysqli_connect('localhost', 'accounting', 'accounting', 'accounting');
//if (mysqli_connect_errno())
//{
//    echo 'Database connection error!';
//    exit();
//}

//$mysqli  = mysqli_connect('localhost','accounting','accounting','accounting');
//if(mysqli_connect_errno())
//{
//    echo 'Database Connection Error';
//}