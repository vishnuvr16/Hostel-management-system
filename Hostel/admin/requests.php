<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <!-- Use Bootstrap 5.3.1 for both CSS and JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            /*max-width: 800px;*/
            min-width: 100%;
            margin: 0;
            height: 100%;
            /*padding: 20px;*/
        }

        /* Navbar Styles */
        .navbar {
            background-color: #007bff;
            color: #fff;
        }

        /* Table Styles */
        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            width: 100%;
            overflow-x: auto;
        }

        .head{
            background-color: cadetblue;
            color: #fff;
            padding: 10px;
            margin: 0;
            width: 100%;
            border-radius: 8px 8px 0 0;
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: cadetblue;
            color: #fff;
        }

        tr {
            border-bottom: 1px solid #ddd;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .search-form {
            margin-top: 20px;
            margin-left:10px;
        }

        .search-form .form-group {
            display: flex;
            align-items: center;
        }

        .search-form .form-control {
            width: 40%;
            margin-right: 10px;
        }

        .search-form .btn {
            white-space: nowrap;
        }

      
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.html">RGUKT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="requests.php">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="messages.php">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php
        // Database connection parameters
        $host = "localhost";
        $username = "id21288882_vishnu";
        $password = "Vishnu@0316";
        $database = "id21288882_outpass";

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch data for the specified id
        $sql = "SELECT r.*,a.percentage FROM requests r left join attendence a on r.id=a.id where status='pending'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<h2 class='head'>Outpass Requests</h2>";
                echo "<div class='table-container' style='overflow-x:auto;'>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Reason</th><th>Description</th><th>No of Days</th><th>From Date</th><th>To Date</th><th>Destination</th><th>Student Contact</th><th>Parent Contact</th><th>Request Time</th><th>Status</th><th>Attendence</th><th colspan='2' style='text-align:center'>Action</th></tr>";
                
                while ($row = $result->fetch_assoc()) {
                    $request_id = $row["request_id"];
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["reason"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["no_of_days"] . "</td>";
                    echo "<td>" . $row["from_date"] . "</td>";
                    echo "<td>" . $row["to_date"] . "</td>";
                    echo "<td>" . $row["destination"] . "</td>";
                    echo "<td>" . $row["scontact"] . "</td>";
                    echo "<td>" . $row["pcontact"] . "</td>";
                    echo "<td>" . $row["requested_time"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>" . $row["percentage"] . "</td>";
                    echo "<td><a href='accept_request.php?request_id=$request_id'><button class='btn btn-success'>Accept</button></a></td>";
                    echo "<td><a href='reject_request.php?request_id=$request_id'><button class='btn btn-danger'>Reject</button></a></td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            } else {
                echo "No requests found";
            }

        // Close the database connection
        $conn->close();
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></body>
</html>
