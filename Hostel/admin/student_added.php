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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $batch = $_POST["batch"];
    $branch = $_POST["branch"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $sql = "INSERT INTO students (id,name,email, password, Batch, branch, mobile, address)
    VALUES ('$id', '$name', '$email' , '$password', '$batch', '$branch', '$mobile', '$address')";

     if($conn->query($sql)===TRUE){
        
        header("Location:students.php?msg=done");
     }
     else{
        echo "Error: ".$sql."<br>".$conn->error;
     }

     $conn->close();

?>