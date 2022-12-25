<?php include('connection.php');
$mysqli = require __DIR__ . "/connection.php";

$id = $_POST['id'];
$sql = "SELECT * FROM customers WHERE customerID='$id' LIMIT 1";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>