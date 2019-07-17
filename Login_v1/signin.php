<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'root'; // Password
$db_name = 'EVoting'; // Database Name
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
   die ('Failed to connect to MySQL: ' . mysqli_connect_error()); 
}
global $a;

 if(isset($_POST['username']) && isset($_POST['password'])) {

      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
  
     $search = mysqli_query($conn,"SELECT * from registered where USN='$myusername' && Name='$mypassword'");  
     foreach ($search as $row) {
     	# code...
     	$department=$row['Dep_Name'];

     }
     $match  = mysqli_num_rows($search);
      
     
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($match == 1) {
      	switch ($department) {
      		case 'cse':
      			header('location:/lastvote/last1/last1.php');
      			break;
      		case 'ise':
      			header('location:/lastvote/last2/last2.php');
      			break;
      		case 'ece':
      			header('location:/lastvote/last3/last3.php');
      			break;
      		case 'me':
      			header('location:/lastvote/last4/last4.php');
      			break;
      		
      		default:
      			echo "something went wrong please try again later";
      			break;
      	}
      }else {
         $error = "Your Login Name or Password is invalid";
        echo $error;
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      	</button>
				<a href="/index.html" class="navbar-brand">College E-Voting</a>
			</div>

			<div class="nav navbar-nav">
				<li><a href="/result.php">Result</a></li>
			</div>
		</div>
		</div>
	</nav>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/voting.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" name="username" type="text" placeholder="USN">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" name="password" type="text" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign In!
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="js/main.js"></script>

</body>
</html>