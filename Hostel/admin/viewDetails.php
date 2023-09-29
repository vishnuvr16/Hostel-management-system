<?php
    session_start();
    $id= $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        /* Part 1 - Profile */
        .profile-section {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }
        .profile-photo {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            border: 3px solid #007bff;
            margin-bottom: 10px;
        }

        /* Part 2 - Attendance */
        .attendance-section {
            background-color: #e0e0e0;
            padding: 20px;
            text-align: center;
        }
        .attendance-table {
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Part 3 - History */
        .history-section {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
        }
        .history-table {
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="home.php">RGUKT</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto md-2 mb-lg-0">
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
                        <a class="nav-link" href="messages.php">Messages</a>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="profile.php">Profile</a>-->
                    <!--</li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
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
        
            // Get the id from the URL (assuming it's passed as a parameter)
            // $id = $_SESSION['id'];
        
            // SQL query to fetch data for the specified id
            $sql = "SELECT * FROM students WHERE  id = '$id'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    $name= $row["name"];
                    $branch = $row["branch"];
                    $batch = $row["Batch"];
                    $mobile = $row["mobile"];
                }
            } else {
                echo "No history found for ID: $id";
            }
        
            // Close the database connection
            $conn->close();
            ?> 
        <!-- Part 1 - Profile -->
        <div class="profile-section">
            <img src="../images/profile.png" alt="Profile Photo" class="profile-photo">
            <!--<h3>Student Details</h3>-->
            <p><b>ID : <?php echo $id ?></b></p>
            <p><b>Name :</b> <?php echo $name ?></p>
            <p><b>Year & Branch:</b> <?php echo $batch ?> <?php echo $branch ?></p>
            <p><b>Mobile:</b> <?php echo $mobile ?></p>
            <a href="changeDetails.php"><button class="btn btn-info">Edit Details</button></a>
            <!-- Add more student details here -->
        </div>

        <!-- Part 2 - Attendance -->
        <div class="attendance-section">
            <h3>Attendance</h3>
            <div class="attendance-table" style="overflow-x:auto">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Total Days</th>
                            <th>Present Days</th>
                            <th>Percentage</th>
                            <th>Upto</th>
                            <th>Semester</th>
                            
                        </tr>
                    </thead>
                    <tbody>
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
            $sql = "SELECT * FROM attendence WHERE  id = '$id'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["total_days"] . "</td>";
                    echo "<td>" . $row["present_days"] . "</td>";
                    echo "<td>" . $row["percentage"] . "</td>";
                    echo "<td>" . $row["upto_month"] . "</td>";
                    echo "<td>" . $row["sem"] . "</td>";
echo "<td><a href='updateAttendence.php?id={$row['id']}'><button class='btn btn-info'>Update</button></a></td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            } else {
                echo "No history found for ID: $id";
            }
        
            // Close the database connection
            $conn->close();
            ?>                    </tbody>
                </table>
            </div>
        </div>

        <!-- Part 3 - History -->
        <div class="history-section">
            <h3>Outpass History</h3>
            <div class="history-table" style="overflow-x:auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reason</th>
                            <!--<th>Description</th>-->
                            <th>No. of Days</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Student Contact</th>
                            <th>Parent Contact</th>
                            <th>Destination</th>
                            
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
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
            $sql = "SELECT * FROM requests WHERE  id = '$id'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    $request_id = $row["request_id"];
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["reason"] . "</td>";
                    // echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["no_of_days"] . "</td>";
                    echo "<td>" . $row["from_date"] . "</td>";
                    echo "<td>" . $row["to_date"] . "</td>";
                    echo "<td>" . $row["scontact"] . "</td>";
                    echo "<td>" . $row["pcontact"] . "</td>";
                    echo "<td>" . $row["destination"] . "</td>";
                    // echo "<td><a href='print.php?request_id=$request_id'><button class='btn btn-primary'>View</button></a></td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            } else {
                echo "No history found for ID: $id";
            }
        
            // Close the database connection
            $conn->close();
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
    <!-- Bootstrap JS (if needed) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
