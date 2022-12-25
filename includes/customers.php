<header>
    <ul class="header-menu d-flex justify-content-between">
        <li class="list-unstyled">
            <a href="../index.html">Home</a>
        </li>
        <li class="list-unstyled">
            <a href="../trade.html">Trade</a>
        </li>
        <li class="list-unstyled">
            <a href="../transactions.html">Transactions</a>
        </li>
        <li class="list-unstyled">
            <a href="../add-customer.html">Add</a>
        </li>
    </ul>
</header>
<?php include('connection.php');
$mysqli = require __DIR__ . "/connection.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"/>
    <title>Customers</title>
    <style type="text/css">
        .btnAdd {
            text-align: right;
            width: 83%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <h2 class="text-center">All Customers</h2>
    <div class="row">
        <div class="container">
            <div class="btnAdd">
                <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal"
                   class="btn btn-success btn-sm">Add Customer</a>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table id="example" class="table">
                        <thead>
                        <th>CustomerID</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Options</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <?php include('modal.php'); ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "fnCreatedRow": function (nRow, aData, iDataIndex) {
                $(nRow).attr('id', aData[0]);
            },
            'serverSide': 'true',
            'processing': 'true',
            'paging': 'true',
            'order': [],
            'ajax': {
                'url': 'fetch_data.php',
                'type': 'post',
            },
            "columnDefs": [{
                'target': [5],
                // 'orderable': false,
            }]
        });
    });
    $(document).on('submit', '#addCustomer', function (e) {
        e.preventDefault();
        let name = $('#addCustomerField').val();
        let number = $('#addNumberField').val();
        let status = $('#addStatusField').val();
        let date = $('#addDateField').val();
        if (name !== '' && number !== '' && status !== '' && date !== '') {
            $.ajax({
                url: "add_customer.php",
                type: "post",
                data: {name: name, number: number, status: status, date: date},
                success: function (data) {
                    let json = JSON.parse(data);
                    let status = json.status;
                    if (status === 'true') {
                        mytable = $('#example').DataTable();
                        mytable.draw();
                        $('#addUserModal').modal('hide');
                    } else {
                        alert('failed');
                    }
                }
            });
        } else {
            alert('Fill all the required fields');
        }
    });

    $(document).on('submit', '#updateUser', function (e) {
        e.preventDefault();
        let name = $('#nameField').val();
        let number = $('#numberField').val();
        let status = $('#statusField').val();
        let date = $('#dateField').val();
        let trid = $('#trid').val();
        let id = $('#id').val();
        if (name !== '' && number !== '' && status !== '' && date !== '') {
            $.ajax({
                url: "update_customer.php",
                type: "post",
                data: {name: name, number: number, status: status, date: date, id: id},
                success: function (data) {
                    let json = JSON.parse(data);
                    let status_u = json.status_u;
                    if (status_u === 'true') {
                        table = $('#example').DataTable();
                        let button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
                        let row = table.row("[id='" + trid + "']");
                        row.row("[id='" + trid + "']").data([id, name, number, status, date, button]);
                        $('#exampleModal').modal('hide');
                    } else {
                        alert('failed');
                    }
                }
            });
        } else {
            alert('Fill all the required fields');
        }
    });

    $('#example').on('click', '.editbtn ', function (event) {
        let table = $('#example').DataTable();
        let trid = $(this).closest('tr').attr('id');
        let id = $(this).data('id');
        $('#exampleModal').modal('show');

        $.ajax({
            url: "get_single_data.php",
            data: {id: id},
            type: 'post',
            success: function (data) {
                let json = JSON.parse(data);
                $('#nameField').val(json.name);
                $('#numberField').val(json.number);
                $('#statusField').val(json.status);
                $('#dateField').val(json.date);
                $('#id').val(id);
                $('#trid').val(trid);
            }
        })
    });

    $(document).on('click', '.deleteBtn', function (event) {
        let table = $('#example').DataTable();
        event.preventDefault();
        let id = $(this).data('id');
        if (confirm("Are you sure want to delete this User ? ")) {
            $.ajax({
                url: "delete_user.php",
                data: {id: id},
                type: "post",
                success: function (data) {
                    let json = JSON.parse(data);
                    status = json.status;
                    if (status === 'success') {
                        $("#" + id).closest('tr').remove();
                    } else {
                        alert('Failed');
                        return;
                    }
                }
            });
        } else {
            return null;
        }
    })

</script>
