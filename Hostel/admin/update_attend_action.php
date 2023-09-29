<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $total_days = $_POST['total_days'];
    $present_days = $_POST['present_days'];
    $upto_month = $_POST['upto_month'];
    $sem = $_POST['sem'];

    // Create an SQL update statement
    $update_sql = "UPDATE attendence SET 
        name = '$name',
        total_days = '$total_days',
        present_days = '$present_days',
        upto_month = '$upto_month',
        sem = '$sem'
        WHERE id = '$id'";

    // Execute the update statement
    if ($conn->query($update_sql) === TRUE) {
        // echo "<script>alert('Attendence updated successfully!')</script>";
        header("Location:students.php?msg=updated");
    } else {
        echo "Error updating data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
