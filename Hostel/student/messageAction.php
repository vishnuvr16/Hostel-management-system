<?php
    session_start();
    $id = $_SESSION["id"];
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

    $name = $_GET["name"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];

    $sql = "insert into messages(sender,receiver,subject,body,sent_date) values ('$id','$name','$subject','$body',NOW())";
    $result = $conn->query($sql);

    if($result){
        header("Location: director_complaint.php?msg=done");
    }else{
        echo "not sent";
    }

    $conn->close();
?>