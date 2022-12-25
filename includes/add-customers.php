<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


if (empty($_POST["name"]) or empty($_POST["number"])) {
    die("fill all the fields");
}

$mysqli = require __DIR__ . "/connection.php";

$sql = "INSERT INTO customers (name, number, status)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"], $_POST["number"], $_POST["status"]);

if ($stmt->execute()) {
    echo "Customer Added";
} else {
    if ($mysqli->errno === 1062) {
        die("Name already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}



