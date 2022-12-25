<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$mysqli = require __DIR__ . "/connection.php";
include('connection.php');
$db = $mysqli;

function fetch_data()
{
    global $db;
    $query = "select * from trades order by tradeID";
    $exec = mysqli_query($db, $query);
    if (mysqli_num_rows($exec) > 0) {
        $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
        return $row;
    } else {
        return $row;
    }
}

$fetchData = fetch_data();
show_data($fetchData);

function show_data($fetchData)
{
    echo '<table border="1">
        <tr>
            <th>TradeID</th>
            <th>customername</th>
            <th>type</th>
            <th>amount</th>
            <th>total</th>
            <th>customerID</th>
            <th>date</th>
        </tr>';
    if (count($fetchData) > 0) {
        $TradeID = 1;
        foreach ($fetchData as $data) {
            echo "<tr>
          <td>" . $TradeID . "</td>
          <td>" . $data['customername'] . "</td>
          <td>" . $data['type'] . "</td>
          <td>" . $data['amount'] . "</td>
          <td>" . $data['total'] . "</td>
          <td>" . $data['customerID'] . "</td>
          <td>" . $data['date'] . "</td>
   </tr>";

            $TradeID++;
        }
    } else {

        echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>";
    }
    echo "</table>";

}