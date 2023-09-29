<?php
session_start();
$id = $_SESSION["id"];
if(isset($_GET["msg"])){
$msg = $_GET["msg"];
if($msg=='done'){
?>
<script>alert("request sent successfully");</script>
<?php
}
else{
?>
<script>alert("Message Deleted");</script>
<?php
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Outpass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: cadetblue;
        }

        .form {
            background-color: #fff;
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 0;
        }

        .form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form input[type="text"],
        .form input[type="date"],
        .form input[type="number"] {
            width: 100%;
            padding: 13px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            border: none;
            border-bottom: 1px solid rgb(45, 160, 45);
        }

        .form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 25px;
            cursor: pointer;
            border-radius: 14px;
            display: block;
            margin: 0 auto;
            font-size: 20px;
        }

        .form input[type="number"]::-webkit-inner-spin-button,
        .form input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            appearance: none;
            margin: 0;
        }

        .form input[type="number"] {
            -moz-appearance: textfield;
        }

        input:focus {
            outline: none;
        }

        .form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .form input[type="text"],
            .form input[type="date"],
            .form input[type="number"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="home.html">RGUKT</a>
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
    </nav>
    <br>
    <center><h2 style="cursor: pointer;">Apply OutPass</h2></center>
    <br>
    <div class="form">
        <form action="applyOutpass.php" method="post">
            <label>ID: (In Capital Letters)</label>
            <input type="text" name="id" value="<?php echo $id; ?>" readonly/>
            <label>Reason: </label>
            <input type="text" name="reason" placeholder="Enter Reason" required/>
            <label>Description: (Info about leave)</label>
            <input type="text" name="description" placeholder="Enter Description" required/>
            <label>No of Days: </label>
            <input type="number" name="no_of_days" placeholder="No of Days" required/>
            <label>Leaving Date: </label>
            <input type="date" name="from_date" />
            <label>Return Date: </label>
            <input type="date" name="to_date" />
            <label>Destination: (Enter Full Address)</label>
            <input type="text" name="destination" placeholder="Enter Destination" required/>
            <label>Student Contact Number: </label>
            <input type="number" name="scontact" placeholder="Enter Contact number" required/>
            <label>Parent Contact Number: </label>
            <input type="number" name="pcontact" placeholder="Enter Contact number" required/>
            <input type="submit" value="Submit" />
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
