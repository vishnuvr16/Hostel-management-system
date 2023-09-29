<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .main {
            margin-top: 200px;
            font-size: 40px;
            font-weight: bold;
            font-style: italic;
            letter-spacing: 2px;
            text-align: center;
            color: white;
        }

        .main button {
            margin-top: 20px;
        }
    </style>
</head>
<body style="background-color: royalblue;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.html">RGUKT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
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
    <div class="main">
        <h2>Welcome to RGUKT Ongole Campus</h2>
        <a href="http://www.rguktong.ac.in/" target="_blank">
            <button class="btn btn-secondary">Open Official Website</button>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
