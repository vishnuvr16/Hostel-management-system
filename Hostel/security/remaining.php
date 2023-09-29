<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Remaining Students</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
                /* background-image: url('../images/rgukt.jpeg');
                background-repeat: no-repeat;
                background-size: cover; */
            }
        
            .form {
                background-color: #fff;
                width: 600px;
                margin: 0 auto;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                z-index: 0;
            }
        
            .form label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
        
            .form input[type="text"],
            .form input[type="date"],
            .form input[type="number"] {
                width: 99%;
                padding: 13px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                border: none;
                border-bottom: 1px solid rgb(45, 160, 45);
            }
        
            .form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 6px 25px;
            cursor: pointer;
            border-radius: 14px;
            display: block;
            margin: 0 auto; 
            font-size: 20px;
        }
            
            .form input[type="number"]::-webkit-inner-spin-button,
            .form input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                appearance: none;
                margin: 0;
            }
            .form input[type="number"] {
            -moz-appearance: textfield;
            }
             
            input:focus{
                outline: none;
                /* border: none; */
            }

            .form input[type="submit"]:hover {
                background-color: #0056b3;
            }
            
            /* Improved right-side styling */
            .form {
                position: relative;
            }
        
            .form::before {
                content: "";
                position: absolute;
                top: 0;
                right: -20px;
                width: 20px;
                height: 100%;
                background-color: #fff;
                border-top-right-radius: 8px;
                border-bottom-right-radius: 8px;
            }
            @media (max-width: 768px) {
                .form input[type="text"],
                .form input[type="date"],
                .form input[type="number"] {
                    width: 430px;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
            }
            }

            /* Table */
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
            }

            /* Add borders to table rows */
            tr {
                border-bottom: 1px solid #ddd;
            }

            tr:last-child {
              border-bottom: none; /* Remove border on the last row */
            }

            tr:hover {
                background-color: #f5f5f5;
            }
            
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">    </head>
        <body style="background-color:lightgrey">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="home.php">RGUKT</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto md-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="active.php">Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="remaining.php">Remain</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="history.php">History</a>
                      </li>
                      <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                  </li>
                  </div>
                </div>
            </nav><br>
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
        
            // Get the id from the URL (assuming it's passed as a parameter)
            // $id = $_SESSION['id'];
        
            // SQL query to fetch data for the specified id
            $sql = "SELECT * FROM requests where status='checkedout' and checkin is NULL and checkout is NOT NULL";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                echo "<h1>In Page</h1><br>";
                echo "<table border='1 px'>";
                echo "<tr><th>ID</th><th>No of Days</th><th>From Date</th><th>To Date</th><th>Destination</th><th>Student Contact</th><th>Parent Contact</th><th>Status</th><th><th></tr>";
                
                while ($row = $result->fetch_assoc()) {
                    $id = $row["request_id"];
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["no_of_days"] . "</td>";
                    echo "<td>" . $row["from_date"] . "</td>";
                    echo "<td>" . $row["to_date"] . "</td>";
                    echo "<td>" . $row["destination"] . "</td>";
                    echo "<td>" . $row["scontact"] . "</td>";
                    echo "<td>" . $row["pcontact"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td><a href='checkin.php?request_id=$id'><button class='btn btn-success'>Check In</button></a></td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            } else {
                echo "No Check outs";
            }
        
            // Close the database connection
            $conn->close();
            ?>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    </body>
</html>