<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
            body {
                font-family: Arial, sans-serif;
                /* background-color: cadetblue; */
                margin: 0;
                padding: 0;

                /* background-image: url('../images/rgukt.jpeg');
                background-repeat: no-repeat;
                background-size: cover; */
            }
        
            .form {
                background-color: #fff;
                width: 600px;
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
            .form input[type="email"],
            .form input[type="number"],
            .form input[type="password"] {
                width: 99%;
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
            padding: 6px 25px;
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
             
            input:focus{
                outline: none;
                /* border: none; */
            }

            .form input[type="submit"]:hover {
                background-color: #0056b3;
            }
            
            /* Improved right-side styling */
            .form {
                position: relative;
            }
        
            .form::before {
                content: "";
                position: absolute;
                top: 0;
                right: -20px;
                width: 20px;
                height: 100%;
                background-color: #fff;
                border-top-right-radius: 8px;
                border-bottom-right-radius: 8px;
            }
            @media (max-width: 768px) {
                .form input[type="text"],
                .form input[type="date"],
                .form input[type="number"] {
                    width: 430px;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
            }
            }
        </style>
</head>
<body style="background-color: royalblue;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">RGUKT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="requests.php">Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="students.php">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="messages.php">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="form">
            <form action="admin_added.php" method="post">
                <label>Name: </label>
                <input type="text" name="name" placeholder="Enter name"/>
                <label>Email: </label>
                <input type="email" name="email" placeholder="Enter email" required/>
                <label>Password: </label>
                <input type="password" name="password" placeholder="Enter password" required/>
                <label>Mobile Number:</label>
                <input type="number" name="mobile" placeholder="Enter student Mobile number" />
                <input type="submit" value="Submit" />
            </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>