<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 0;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 25px;
            cursor: pointer;
            border-radius: 14px;
            display: block;
            margin: 0 auto;
            font-size: 20px;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Improved right-side styling */
        .container {
            position: relative;
        }

        .container::before {
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.html">RGUKT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="apply.php">Apply OutPass</a>
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
    </nav>
    <br>
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

    // Get the id from the session
    $id = $_SESSION['id'];

    // Retrieve the data for the student with the given ID
    $select_sql = "SELECT * FROM students where id='$id'";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];
        $batch = $row["Batch"];
        $branch = $row["branch"];
        $mobile = $row["mobile"];
        $address = $row["address"];

        // Display the form with the retrieved data
        echo "<div class='container'>";
        echo "<h1 class='text-center'>Edit Details for ID: $id</h1><br>";
        echo "<form method='POST' action='update_student.php'>";
        echo "<input type='hidden' name='id' value='$id'>";

        // Name
        echo "<div class='mb-3'>";
        echo "<label for='name' class='form-label'>Name:</label>";
        echo "<input type='text' id='name' name='name' value='$name' class='form-control' required>";
        echo "</div>";

        // Email
        echo "<div class='mb-3'>";
        echo "<label for='email' class='form-label'>Email:</label>";
        echo "<input type='email' id='email' name='email' value='$email' class='form-control' required>";
        echo "</div>";

        // Password
        echo "<div class='mb-3'>";
        echo "<label for='password' class='form-label'>Password:</label>";
        echo "<input type='password' id='password' name='password' value='$password' class='form-control' required>";
        echo "</div>";

        // Batch
        echo "<div class='mb-3'>";
        echo "<label for='batch' class='form-label'>Batch:</label>";
        echo "<input type='text' id='batch' name='batch' value='$batch' class='form-control' required>";
        echo "</div>";

        // Branch
        echo "<div class='mb-3'>";
        echo "<label for='branch' class='form-label'>Branch:</label>";
        echo "<input type='text' id='branch' name='branch' value='$branch' class='form-control' required>";
        echo "</div>";

        // Mobile
        echo "<div class='mb-3'>";
        echo "<label for='mobile' class='form-label'>Mobile:</label>";
        echo "<input type='text' id='mobile' name='mobile' value='$mobile' class='form-control' required>";
        echo "</div>";

        // Address
        echo "<div class='mb-3'>";
        echo "<label for='address' class='form-label'>Address:</label>";
        echo "<input type='text' id='address' name='address' value='$address' class='form-control' required>";
        echo "</div>";

        // Update Button
        echo "<div class='text-center'>";
        echo "<button type='submit' class='btn btn-primary'>Update</button>";
        echo "</div>";

        echo "</form>";
        echo "</div>";
    } else {
        echo "No data found for ID: $id";
    }

    // Close the database connection
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
