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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $batch = $_POST['batch'];
    $branch = $_POST['branch'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    // Create an SQL update statement
    $update_sql = "UPDATE students SET 
        name = '$name',
        email = '$email',
        password = '$password',
        Batch = '$batch',
        branch = '$branch',
        mobile = '$mobile',
        address = '$address'
        WHERE id = '$id'";

    // Execute the update statement
    if ($conn->query($update_sql) === TRUE) {
        // echo "<script>alert('Data updated successfully!')</script>";
        header("Location:changeDetails.php?msg=updated");
    } else {
        echo "Error updating data: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
