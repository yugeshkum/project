<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'root'; // Password
$db_name = 'EVoting'; // Database Name
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
   die ('Failed to connect to MySQL: ' . mysqli_connect_error()); 
}
$db_usn=$_POST['cno'];
$db_name=$_POST['cname'];
$db_dno=$_POST['dno'];

$sql = "update result set no_of_votes=no_of_votes+1 where c_no='$db_usn' and d_no=3";
if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting Page</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    

    <div class="main">

        <div class="container">
            <form method="POST" class="appointment-form" id="appointment-form">
                <h2>Please Vote for ECE!!!</h2>
                <div class="form-group-1">
                    
                    
                

        <input type="text" name="cno" id="title" placeholder="Candidate Number" />
                    <input type="text" name="cname" id="name" placeholder="Candidate Name" />
                    <input type="text" name="dno" id="email" placeholder="Department number"/>
        
                   

                </div>
               
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Vote" />
                </div>

                <div class="form-submit">
                    <a href="/lastvote/last3/loc.php" id="submit" class="submit">See list of candidates</a>
                </div>

            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>