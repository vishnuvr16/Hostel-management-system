<?php 
    session_start();

    $host = "localhost";
    $username = "id21288882_vishnu";
    $password = "Vishnu@0316";
    $database = "id21288882_outpass";

    $conn = new mysqli($host,$username,$password,$database);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST["id"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if($email=='admin@rguktong.ac.in' and $password='rgukt123'){
            header("Location:admin/requests.php");
        } 

        $id = mysqli_real_escape_string($conn, $id);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "select * from students where id ='$id' and email='$email' and password='$password'";
        $result = $conn->query($sql);

        if($result->num_rows==1){
            $_SESSION["id"]=$id;
            $_SESSION["email"] = $email;
            header("Location:student/home.php");
        }
        else{
            ?>
            <script>alert("Invalid ID or Username or Password");</script>
            <?php
        }
    }

    $conn->close();
?>
