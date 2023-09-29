<?php
session_start();
if (isset($_GET['msg'])) {
    echo "<script>alert('Sent successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/warden_complaint.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
        }

        .button {
            border-radius: 20px;
            background-color: cadetblue;
        }
        .input-style{
            border-radius: 20px;
        }
        @media(max-width: 560px){
        .input-style{
            width: 70vh;
            margin-left: 30px;
        }
        .input-style:focus{
            background-color: lightgrey;
        }}
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">RGUKT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="apply.php">Apply OutPass</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myMessage.php">Messages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Complaint
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="warden_complaint.php">To Warden</a></li>
                            <li><a class="dropdown-item" href="director_complaint.php">To Director</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="technical_issue.php">Technical issue</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
    <div class="body">
        <form action="messageAction.php?name=director" method="post">
            <input type="text" name="subject" class="input-style" placeholder="Subject" required>
            <hr>
            <textarea class="input-style" name="body" placeholder="Enter Your Message" required></textarea>
            <hr>
            <button class="button" type="submit">Send To Director</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
