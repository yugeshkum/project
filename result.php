<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'root'; // Password
$db_name = 'EVoting'; // Database Name
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
   die ('Failed to connect to MySQL: ' . mysqli_connect_error()); 
}

$query1 = mysqli_query($conn,"SELECT * FROM result");

$query2 = mysqli_query($conn,"SELECT * FROM department");



?>

<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<style>
  
      th,td{
      width:60%;
        margin:auto;
        border:1px solid white;
        border-collapse:collapse;
        text-align:center;
        font-size:13px;
        table-layout:fixed;
        font-weight:bold;
        color: white;
        margin-top:100px;
        background:none;
        opacity:0.8;
        
        
      }
        .table{width:60%;
        margin:auto;
        border:1px solid white;
        border-collapse:collapse;
        text-align:center;
        font-size:15px;
          font-weight:bold;
        table-layout:fixed;
        color: black;
          opacity:0.8;
        margin-top:100px;
      }
    </style>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">

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
        <li><a href="/win.php">Winner</a></li>
			</div>

			<div class="collapse navbar-collapse" id="bs-nav-demo">

			<div class="nav navbar-nav navbar-right">
				<li><a href="/Login_v1/signin.php">Sign In</a></li>

				<li><a href="/depyear/depyear.php">Department of the year</a></li>

				<li><a href="/registeration/registeration.php">Voter Registeration</a></li>

				<li><a href="/admin.php">Admin</a></li>
				
			</div>
		</div>
		</div>
	</nav>

		<a style="color:white; font-size: 30px; padding-left: 20px;">Department Results</a>
        <div id="table">
       <table class="table container">
  <thead>
    <tr>
      <th scope="col">Department Number</th>
      <th scope="col">Department Name</th>
      <th scope="col">No of votes</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($row = mysqli_fetch_array($query2))
		{
			echo '<tr>
					<td>'.$row['d_no']. '</td>
					<td>'.$row['d_name']. '</td>
					<td>'.$row['no_of_votes']. '</td>
				</tr>';
		}?>
  </tbody>
</table>

	<a style="color:white; font-size: 30px; padding-left: 20px;">Candidate Results</a>


	   <div id="table">
       <table class="table container">
  <thead>
    <tr>
      <th scope="col">Candidate number</th>
      <th scope="col">Candidate Nname</th>
      <th scope="col">Department Number</th>
      <th scope="col">Department Name</th>
      <th scope="col">No of votes</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($row = mysqli_fetch_array($query1))
		{
			echo '<tr>
					<td>'.$row['c_no'].'</td>
					<td>'.$row['c_name'].'</td>
					<td>'.$row['d_no']. '</td>
					<td>'.$row['d_name']. '</td>
					<td>'.$row['no_of_votes']. '</td>
				</tr>';
		}?>
  </tbody>
</table>
		

</body>
</html>