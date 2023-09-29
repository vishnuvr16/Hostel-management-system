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
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "select * from admins where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if($email==='director@rguktong.ac.in' && $password==='director'){
            header("Location:superadmin/home.php");
        }
        if($result->num_rows==1){
            $_SESSION["email"] = $email;
            header("Location:admin/home.php");
        }
        else{
            $login_error = "Invalid Username or Password";
            echo $login_error;
        }
    }

    $conn->close();
?>
