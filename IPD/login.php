<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
<br><br><br><br><br><br>
<div class="container" style=" background-color: black; width: 600px; font-family: Open Sans Semibold; color: white">

<h1><CENTER><strong><font face="Open Sans ExtraBold"><font color= "white">LOGIN</font></font></CENTER></h1></strong>
	<b>Type your details:- <br>&nbsp</b>
		
		<div class="row" style="padding-left: 20px">
			
			<form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				 <div class="form-group" style="width: 550px">
				 	<label for="rollnumber">Roll Number:</label>
				 	<input type="text" class="form-control" id="rollnumber" name = "rollnumber" placeholder="Enter Roll Number" required>
				 </div>

				 <div class="form-group" style="width: 550px">
				 	<label for="password">Password</label>
				 	<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
				 </div>

				Don't have an account? <a href="signup.php">Sign Up</a> here.<br>
			 	<button type="submit" name= "submit" class="btn btn-success">Login</button>

			</form>
		</div>
	<div>&nbsp</div>	
</div>
<div>&nbsp</div>	

<?php

if(isset($_POST["submit"])){

if(!empty($_POST['rollnumber']) && !empty($_POST['password'])) {
	$rollnumber = $_POST['rollnumber'];
	$password = $_POST['password'];

	$con=mysqli_connect('localhost','root','') or die(mysqli_error($con));
	mysqli_select_db($con, "computation_stock") or die("cannot select DB");

	$query=mysqli_query($con, "SELECT * FROM signup WHERE rollnumber='".$rollnumber."' AND password='".$password."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
		while($row=mysqli_fetch_assoc($query))
		{
			$dbrollnumber = $row['RollNumber'];
			$dbpassword = $row['Password'];
			$dbfullname = $row['FullName'];
		}

		if($rollnumber == $dbrollnumber && $password == $dbpassword)
		{
			session_start();
			$_SESSION['sess_fullname']=$dbfullname;

			/* Redirect browser */
			header("Location: index.php");
		}
	}
	else
	{
		echo "Invalid username or password!";
	}

}
	else
	{
		echo "All fields are required!";
	}
}
?>

</body>
</html>