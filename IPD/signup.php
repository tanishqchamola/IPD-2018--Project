<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>

	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body>
<br>
<div class="container" style=" background-color: black; width: 600px; font-family: Open Sans Semibold; color: white">
<h1><CENTER><strong><font face="Open Sans ExtraBold"><font color= "white">SIGN UP</font></font></CENTER></strong></h1>
	<b>Type your details:- <br>&nbsp</b>
		
		<div class="row" style="padding-left: 20px;">
			<form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

				 <div class="form-group" style="width: 550px">
				 	<label for="fullname">Full Name:</label>
				 	<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Full Name" required>
				 </div>

				 <div class="form-group" style="width: 550px">
				 	<label for="department">Department:</label>
				 	<input type="text" class="form-control" name="department" id="department" placeholder="Enter Department" required>
				 </div>

				 <div class="form-group" style="width: 550px">
				 	<label for="rollnumber">Roll Number:</label>
				 	<input type="text" class="form-control" name="rollnumber" id="rollnumber" placeholder="Enter Roll Number" required>
				 </div>

				 <div class="form-group" style="width: 550px">
				 	<label for="password">Password:</label>
				 	<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
				 </div>

				 <div class="form-group" style="width: 550px">
				 	<label for="emailid">Email ID:</label>
				 	<input type="text" class="form-control" name="emailid" id="emailid" placeholder="Enter Email" required>
				 </div>

				Already have an account? <a href="login.php">Login</a> here.<br>
			 	<button type="submit" class="btn btn-success" name="submit">Create Account</button>

			</form>
		</div>
	<div >&nbsp</div>	
</div>
</body>
</html>

<?php
 
	define('DB_HOST', 'localhost');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	define('DB_NAME', 'computation_stock');
	
	$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
	$db=mysqli_select_db($con, DB_NAME); // Establishing Connection with Server

	// Fetching variables of the form which travels in URL
	if(isset($_POST['submit']))
	{
		$fullname = $_POST['fullname'];
		$department = $_POST['department'];
		$rollnumber = $_POST['rollnumber'];
		$password = $_POST['password'];
		$emailid = $_POST['emailid'];

		$query = mysqli_query($con, " INSERT INTO `signup` (`FullName`, `Department`, `RollNumber`, `Password`, `EmailID`) VALUES ('$fullname', '$department', '$rollnumber', '$password', '$emailid') ");

	}
?>