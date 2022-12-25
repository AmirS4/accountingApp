<?php
include('connection.php');
$mysqli = require __DIR__ . "/connection.php";

$name = $_POST['name'];
$number = $_POST['number'];
$status = $_POST['status'];
$date = $_POST['date'];
$id = $_POST['id'];

$sql = "UPDATE `customers` SET  `name`='$name' , `number`= '$number', `status`='$status',  `date`='$date' WHERE customerID='$id' ";
$query = mysqli_query($mysqli, $sql);
$lastId = mysqli_insert_id($mysqli);
if ($query) {

    $data = array(
        'status_u' => 'true',
    );

} else {
    $data = array(
        'status_u' => 'false',
    );
}
echo json_encode($data);
?>