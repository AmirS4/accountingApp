<?php

$mysqli = require __DIR__ . "/connection.php";


$searchTerm = $_GET["term"];

$query = $mysqli->query("SELECT * FROM customers WHERE name LIKE '%".$searchTerm."%'");

$customerData = array();

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $data['id'] = $row['id'];
        $data['value'] = $row['name'];
        $customerData[] = $data;
    }
}

echo json_encode($customerData);
