<?php

$mysqli = require __DIR__ . "/connection.php";

$customer = $_GET["customer"];

$customerID = $_GET["customerID"];

$q = $mysqli->query("SELECT * FROM customers WHERE name LIKE '%".$customer."%'");
//    $result = mysqli_query($mysqli, $q);
$customer_id = array();
while ($row = $q->fetch_assoc()){
    $data['customerID'] = (int)$row['customerID'];
    $customer_id[] = $data;
}
echo $customer_id[0]['customerID'];