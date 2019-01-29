<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>

	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<br>
<div class="container text-center">
	<div class="row" id="logo">
		<div class="col-12">
			<img src="images/logo.jpeg" width="250px">
		</div>
	</div>
		<div class="row" style="padding-top: 2%;">
			<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1 col-xl-6 offset-xl-3" id="loginbox">
				<form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					 <div class="form-group">
					 	<input type="text" class="form-control semicircle fa" name="fullname" id="fullname" placeholder="&#xf2c3  Full Name" required>
					 </div>

					 <div class="form-group">
					 	<input type="text" class="form-control semicircle fa" name="department" id="department" placeholder="&#xf1ad  Department" required>
					 </div>

					 <div class="form-group">
					 	<input type="text" class="form-control semicircle fa" name="rollnumber" id="rollnumber" placeholder="&#xf007  Roll Number" required>
					 </div>

					 <div class="form-group">
					 	<input type="password" class="form-control semicircle fa" name="password" id="password" placeholder="&#xf084  Password" required>
					 </div>

					 <div class="form-group">
					 	<input type="text" class="form-control semicircle fa" name="emailid" id="emailid" placeholder="&#xf0e0  Email" required>
					 </div>

					<button type="submit" class="btn btn-info  semicircle" name="submit">Sign Up</button><br><br>
					<h6 class="text-muted">Already have an account? <a href="login.php">Login</a> here.</h6><br>
				</form>
			</div>
		</div>	
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