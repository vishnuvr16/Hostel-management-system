<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <style>
        table {
            width: 80%;
            position: absolute;
            transform: translate(13%,3%);
            border-collapse: collapse;
            background-color: #f2f2f2;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }
th, td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  text-align: center;
}

th {
  background-color: royalblue;
  color: white;
  font-style: italic;
  letter-spacing: 1px;
  font-size: 20px;
}

tr:hover {
  background-color: #f5f5f5;
}
.container {
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            max-width: 900px; /* Adjust the maximum width as needed */
        }

        .col img {
            float: left;
            margin-right: 20px;
        }

        h2, h5 {
            text-align: left;
        }

h2, h5 {
    text-align: center;
    margin: 5px; /* Align text to the left */
}
.out{
    font-family: sans-serif;
    
}
.print-button {
            position: fixed;
            bottom: 20px;
            right: 50px;
            padding: 10px 20px;
            background-color: grey;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
}
@media screen and (max-width: 768px) {
    /* Adjust styles for headings */
    body{
        /* height: 800px; */
    }
    th{
        font-size: smaller;
    }
    h1 {
        font-size: 12px;
    }

    h2 {
        font-size: 15px;
    }

    h4 {
        font-size: 6px;
    }

    h5 {
        font-size: 10px;
    }


    /* Center-align the print button */
    .print-button {
        font-size: 16px;
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        padding:10px 2px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Adjust style for images */
    img {
        /* width: 100%; */
        /* height: auto; */
    }
}
</style>
</head>
<body style="background-color: cadetblue;">
<?php  
    // Database connection parameters
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
        
            // Get the id from the URL (assuming it's passed as a parameter)
            // $id = $_SESSION['id'];
        $id = $_GET["request_id"];
            // SQL query to fetch data for the specified id
            $sql = "SELECT * FROM requests where request_id=$id";
            $result = $conn->query($sql);
            
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
           ?>
           <div class="container">
    <div class="row">
        <div class="col">
            <img src='../images/rgukt.jpeg' width="80px" class='head-img'>
        </div>
        <div class="col">
            <h2>Rajiv Gandhi University of Knowledge Technologies Ongole Campus</h2>
            <h5>Catering to the Educational Needs of Gifted Rural Youth of Andhra Pradesh</h5>
            <h5>(Established by the Govt. of Andhra Pradesh and recognized as per Section 2(f) of UGC Act, 1956)</h5>
        </div>
    </div><br>
    <button class="print-button" style="background-color:green;width:100px" onclick="window.print()">Print</button>
    <h2 class='out'>Outpass Form</h2>
</div>

           <?php
           
            echo "<table>";
            echo "<tr><th>ID</th><th>Reason</th></tr>";
            echo "<tr><td>{$row['id']}</td><td>{$row['reason']}</td></tr>";
            echo "<tr><th>No of Days</th><th>Address</th></tr>";
            echo "<tr><td>{$row['no_of_days']}</td><td>{$row['destination']}</td></tr>";
            echo "<tr><th>From</th><th>To</th></tr>";
            echo "<tr><td>{$row['from_date']}</td><td>{$row['to_date']}</td></tr>";
            echo "<tr><th>Student Contact</th><th>Parent Contact</th></tr>";
            echo "<tr><td>{$row['scontact']}</td><td>{$row['pcontact']}</td></tr>";
            echo "<tr><th>Approved By</th><th>Approved Date & Time</th></tr>";
            echo "<tr><td>{$row['approved_name']}</td><td>{$row['approved_time']}</td></tr>";
            echo "</table>";

        }
       
        echo "</div>";  
        // Close text-align:center div
    } else {
        echo "No data found for ID: $request_id";
    }

        
            // Close the database connection
            $conn->close();
            ?>
            <!-- <img src='../images/stamp.jpeg' /> -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    
        </body>
</html>