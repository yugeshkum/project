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
  
     $search = mysqli_query($conn,"SELECT * from adminpage where username='$myusername' && password='$mypassword'"); 
     $match  = mysqli_num_rows($search);
      
     
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($match == 1) {
        header('location:/adminoptions/options.html');
      }else {
         $error = "Your Login Name or Password is invalid";
        echo $error;
      }
   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="login.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

  
	<div class="sidenav">
         <div class="login-main-text">
            <h2>ADMIN<br> Exclusive Page</h2>
            <p>Admin can register/remove the candidate as well as the user from here!</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="post">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="username" class="form-control" placeholder="User Name">
                  </div>
<br>

                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
<br>

                  <button type="submit" class="btn btn-black">Login</button>
                  
               </form>
            </div>
         </div>
      </div>
</body>
</html>