<?php
include('connection.php');
$mysqli = require __DIR__ . "/connection.php";

$output = array();
$sql = "SELECT * FROM customers ";

$totalQuery = mysqli_query($mysqli, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " WHERE name like '%" . $search_value . "%'";
    $sql .= " OR number like '%" . $search_value . "%'";
    $sql .= " OR status like '%" . $search_value . "%'";
    $sql .= " OR date like '%" . $search_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $column_name . " " . $order . "";
} else {
    $sql .= " ORDER BY CustomerID ASC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT  " . $start . ", " . $length;
}

$query = mysqli_query($mysqli, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $sub_array = array();
    $sub_array[] = $row['customerID'];
    $sub_array[] = $row['name'];
    $sub_array[] = $row['number'];
    $sub_array[] = $row['status'];
    $sub_array[] = $row['date'];
    $sub_array[] = '<a href="javascript:void();" data-id="' . $row['customerID'] . '"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="' . $row['customerID'] . '"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
    $data[] = $sub_array;
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
);
echo json_encode($output);