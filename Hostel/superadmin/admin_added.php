<?php
     $host = "localhost";
    $username = "id21288882_vishnu";
    $password = "Vishnu@0316";
    $database = "id21288882_outpass";
     $conn = new mysqli($host,$username,$password,$database);

     if($conn->connect_error){
         die("Connection failed: ".$conn->connect_error);
     }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];
    
    $sql = "INSERT INTO admins (name,email, password, mobile)
    VALUES ('$name', '$email' , '$password','$mobile')";

     if($conn->query($sql)===TRUE){
        
        header("Location:students.php?msg=done");
     }
     else{
        echo "Error: ".$sql."<br>".$conn->error;
     }

     $conn->close();

?>