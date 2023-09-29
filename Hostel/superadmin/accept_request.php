<?php
// Start or resume the session
session_start();

// Check if the user is logged in (you can add your own authentication logic here)

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
$sql1 = "SELECT * FROM admins"; 
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $name = $row["name"];
}
// Check if the request ID is provided in the URL (you can add validation here)
if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    
    // Prepare and execute the SQL query to accept the request
    
    $sql = "UPDATE requests SET status='Approved',approved_name='$name',approved_time=NOW() WHERE request_id=$request_id";
    $result = $conn->query($sql);
    if ($result) {
        // Request accepted successfully
        header("Location: requests.php"); // Change to the appropriate page
        exit();
    } else {
        // Error updating request
        echo "Error updating request: " . $conn->error;
    }
} else {
    echo "Request ID not provided.";
}

// Close the database connection
$conn->close();
?>
