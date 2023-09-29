<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .main {
            margin-top: 200px;
            font-size: 40px;
            font-weight: bold;
            font-style: italic;
            letter-spacing: 2px;
            text-align: center;
            color: white;
        }

        .main button {
            margin-top: 20px;
        }
        body{
            color:white;
        }
    </style>
</head>
<body style="background-color: #333;">
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

    $id = $_GET["id"];

    // Retrieve the data for the student with the given ID
    $select_sql = "SELECT * FROM attendence where id='$id'";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $name = $row["name"];
        $total_days = $row["total_days"];
        $present_days = $row["present_days"];
        $upto_month = $row["upto_month"];
        $sem = $row["sem"];

        // Display the form with the retrieved data
        echo "<div class='container'>";
        echo "<h1 class='text-center'>Update Attendence for ID: $id</h1><br>";
        echo "<form method='POST' action='update_attend_action.php'>";
        echo "<input type='hidden' name='id' value='$id'>";

        // Id
        echo "<div class='mb-3'>";
        echo "<label for='id' class='form-label'>ID:</label>";
        echo "<input type='text' id='id' name='id' value='$id' class='form-control' readonly>";
        echo "</div>";

        // Name
        echo "<div class='mb-3'>";
        echo "<label for='name' class='form-label'>Name:</label>";
        echo "<input type='text' id='name' name='name' value='$name' class='form-control' required>";
        echo "</div>";

        // Total Days
        echo "<div class='mb-3'>";
        echo "<label for='total_days' class='form-label'>Total Days:</label>";
        echo "<input type='number' id='total_days' name='total_days' value='$total_days' class='form-control' required>";
        echo "</div>";

        // Present Days
        echo "<div class='mb-3'>";
        echo "<label for='present_days' class='form-label'>Present Days:</label>";
        echo "<input type='number' id='present_days' name='present_days' value='$present_days' class='form-control' required>";
        echo "</div>";

        // upto month
        echo "<div class='mb-3'>";
        echo "<label for='upto_month' class='form-label'>Upto Month:</label>";
        echo "<input type='text' id='upto_month' name='upto_month' value='$upto_month' class='form-control' required>";
        echo "</div>";

        // sem
        echo "<div class='mb-3'>";
        echo "<label for='sem' class='form-label'>Semester:</label>";
        echo "<input type='number' id='sem' name='sem' value='$sem' class='form-control' required>";
        echo "</div>";

        // Update Button
        echo "<div class='text-center'>";
        echo "<button type='submit' class='btn btn-primary'>Update</button>";
        echo "</div><br>";

        echo "</form>";
        echo "</div>";
    } else {
        echo "No data found for ID: $id";
    }

    // Close the database connection
    $conn->close();
    ?>
    </body>
    </html>