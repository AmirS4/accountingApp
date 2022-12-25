<?php
include('connection.php');
$mysqli = require __DIR__ . "/connection.php";
$name = $_POST['name'];
$number = $_POST['number'];
$status = $_POST['status'];
$date = $_POST['date'];

$sql = "INSERT INTO `customers` (`name`,`number`,`status`,`date`) values ('$name', '$number', '$status', '$date' )";
$query = mysqli_query($mysqli, $sql);
$lastId = mysqli_insert_id($mysqli);
if ($query) {
    $data = array(
        'status' => 'true',
    );
} else {
    $data = array(
        'status' => 'false',
    );
}
echo json_encode($data);
