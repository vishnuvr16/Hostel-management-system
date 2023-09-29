<?php
     $host = "localhost";
    $username = "id21288882_vishnu";
    $password = "Vishnu@0316";
    $database = "id21288882_outpass";
     $conn = new mysqli($host,$username,$password,$database);

     if($conn->connect_error){
         die("Connection failed: ".$conn->connect_error);
     }

    $id = $_POST["id"];
    $reason = $_POST["reason"];
    $description = $_POST["description"];
    $no_of_days = $_POST["no_of_days"];
    $from_date = $_POST["from_date"];
    $to_date = $_POST["to_date"];
    $destination = $_POST["destination"];
    $scontact = $_POST["scontact"];
    $pcontact = $_POST["pcontact"];

    $sql = "INSERT INTO requests (id, reason,description, no_of_days, from_date, to_date, destination, scontact,pcontact,requested_time,status)
    VALUES ('$id', '$reason', '$description' , '$no_of_days', '$from_date', '$to_date', '$destination', '$scontact','$pcontact',NOW(),'pending')";

     if($conn->query($sql)===TRUE){
        
        header("Location:apply.php?msg=done");
     }
     else{
        echo "Error: ".$sql."<br>".$conn->error;
     }

     $conn->close();

?>