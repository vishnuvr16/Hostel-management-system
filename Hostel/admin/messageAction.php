<?php
    session_start();
    $email = $_SESSION["email"];
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

    // $email = $_SESSION["email"];
    $receiver = $_GET["receiver"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];
    echo $receiver;

    $sql = "insert into messages(sender,receiver,subject,body,sent_date) values ('$email','$receiver','$subject','$body','NOW()'";
    $result = $conn->query($sql);

    if($result){
        header("Location: messages.php?msg=done");
    }else{
        echo "not sent";
    }

    $conn->close();
?>