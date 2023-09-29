<?php
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
    $id = $_GET["id"];
    // SQL query to fetch data for the specified id
    $sql = "delete from messages where id='$id'";
    $result = $conn->query($sql);

    if($result){
        header("Location:messages.php?msg=deleted");
    }else{
        echo "Error";
    }
    $conn->close();
?>