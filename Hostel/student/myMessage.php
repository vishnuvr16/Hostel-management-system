<?php
session_start();
$id = $_SESSION["id"];
if (isset($_GET["msg"])) {
    $msg = $_GET["msg"];
    if ($msg == 'done') {
        ?>
        <script>alert("Reply sent");</script>
        <?php
    } else {
        ?>
        <script>alert("Message deleted");</script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
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

        input:focus {
            outline: none;
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
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: cadetblue;
            color: white;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.html">RGUKT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto md-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="home.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="requests.php">Apply OutPass</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myMessage.php">Messages</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Complaint
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="warden_complaint.php">To Warden</a></li>
                        <li><a class="dropdown-item" href="director_complaint.php">To Director</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="technical_issue.php">Technical issue</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
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

// SQL query to fetch data for the specified id
$sql = "SELECT * FROM messages where receiver='$id' or receiver='all'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Messages</h1><br>";
    echo "<table border='1 px'>";
    echo "<tr><th>Sender</th><th>Subject</th><th>Body</th><th></th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        $sender = $row["sender"];
        $id = $row["id"];
        echo "<tr>";
        echo "<td>" . $row["sender"] . "</td>";
        echo "<td>" . $row["subject"] . "</td>";
        echo "<td>" . $row["body"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No messages found for ID: $id";
}

// Close the database connection
$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
