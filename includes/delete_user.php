<?php
include('connection.php');
$mysqli = require __DIR__ . "/connection.php";
$user_id = $_POST['id'];
$sql = "DELETE FROM customers WHERE customerID='$user_id'";
$delQuery = mysqli_query($mysqli, $sql);
if ($delQuery) {
    $data = array(
        'status' => 'success',
    );
} else {
    $data = array(
        'status' => 'failed',
    );
}
echo json_encode($data);
