<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
	
</style>
</head>

<body>
<div class="container text-center" >
	<div class="row" id="logo">
		<div class="col-12">
			<img src="images/logo.jpeg" width="250px">
		</div>
	</div>
	<div class="row" style="padding-top: 2%;">
		<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1 col-xl-6 offset-xl-3" id="loginbox"> 
				<form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					 <div class="form-group">
					 	<input type="text" class="form-control semicircle fa" id="rollnumber" name = "rollnumber" placeholder="&#xf007  Roll Number" required>
					 </div>

					 <div class="form-group">
					 	<input type="password" class="form-control semicircle fa" id="password" name="password" placeholder="&#xf084  Password" required>
					 </div>

					<button type="submit" name= "submit" class="btn btn-info semicircle">Login</button><br><br>
					<h6 class="text-muted">Don't have an account? <a href="signup.php">Sign Up</a> here. </h6><br>
				</form>
		</div>
	</div>
</div>


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