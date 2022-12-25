<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$mysqli = require __DIR__ . "/connection.php";

//if (isset($_POST['submit'])){
    $type = $_POST["type"];
    $customer = $_POST["customer"];
    $amount = $_POST["amount"];
    $total = $_POST["total"];
    $customerID = $_POST["customerID"];


    if ($amount == '' or $total == ''){
        echo"
        <script>alert('please fill all the fields !')</script>";
        exit();
    }
    else {
        $query = "INSERT INTO trades (type, amount, total, customername, customerID )
        VALUES ('$type', '$amount', '$total', '$customer', '$customerID')";

        $run = mysqli_query($mysqli, $query);
        if ($run) {
            echo"
            <script>alert('trade inserted successfully')</script>";
        }
    }
//}


