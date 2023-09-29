<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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

        .head {
            background-color: cadetblue;
            color: #fff;
            padding: 6px;
            margin: 0;
            /*font-size: 35px;*/
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
</head>
<body>
    <!-- Modify your navigation structure like this -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.html">RGUKT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                      </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="requests.php">Requests</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="students.php">Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="security.php">Security</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="messages.php">Messages</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="history.php">History</a>
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
        $sql = "SELECT * FROM messages where receiver='Director'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                echo "<h1>Messages</h1><br>";
                echo "<div style='overflow-x:auto'>";
                echo "<table border='1 px'>";
                echo "<tr><th>Sender</th><th>Subject</th><th>Body</th><th></tr>";
                
                while ($row = $result->fetch_assoc()) {
                    $sender = $row["sender"];
                    $id = $row["id"];
                    echo "<tr>";
                    echo "<td>" . $row["sender"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "<td>" . $row["body"] . "</td>";
                    echo "<td><a href='reply.php?sender=$sender'><button class='btn btn-success'>Reply</button></a></td>";
                    // echo "<td><a href='deleteMessage.php?id=$id'><button class='btn btn-danger'>Delete</button></a></td>";
                    echo "</tr>";
                }
                
                echo "</table>";
                echo "</div>";
            } else {
                echo "No requests found for ID: $id";
            }

        // Close the database connection
        $conn->close();
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
