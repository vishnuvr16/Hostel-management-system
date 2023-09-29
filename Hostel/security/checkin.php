<?php
    session_start();

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

    if(isset($_GET['request_id'])){
        $request_id = $_GET["request_id"];
        $sql = "update requests set checkin=NOW(),status='checkedin' where request_id=$request_id";
        $result = $conn->query($sql);
        if($result){
            echo "updated";
        }else{
            echo "Error";
        }
    }else{
        echo "No data found on that request id";
    }

   $conn->close();

?>