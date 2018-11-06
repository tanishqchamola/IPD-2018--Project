<!DOCTYPE html>
<html>
<head>

<title>
COMPUTATION DATABASE
</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  	<link rel = "stylesheet" type ="text/css" href= "style.css">

</head>


<body>

<div class="jumbotron" style="margin-bottom: 0px;">
	<h1>CHANDIGARH COLLEGE OF ENGINERING AND TECHNOLOGY</h1>
	<p><h5>Signed in as <?=$_SESSION['sess_fullname'];?>.</h5></p>	
</div>

	<nav class="navbar navbar-default sticky-top navbar-expand-md navbar-dark bg-primary" id="navigation">

		<a class="navbar-brand" href="#">CCET</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenu">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarmenu">
			<ul class="navbar-nav ml-auto"> <!-- ml for right, md for left, mx for centre (alignment)-->
				
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>

				<li class="nav-item dropdown">

					<a class="nav-link dropdown-toggle" href="#" id="navbardropdown" data-toggle="dropdown">Department</a>
					<span class="caret"></span>

					<div class="dropdown-menu" aria-labelledby="navbardropdown"> <!-- aria-labelledby used for pointing where it is linked to-->
						<a class="dropdown-item" href="#">CSE</a>

      					<a class="dropdown-item" href="#">ECE</a>
      					
      					<a class="dropdown-item" href="#">MECH</a>
      					
      					<a class="dropdown-item" href="#">CIVIL</a>
					</div>
				</li>

				<li class="nav-item dropdown">

					<a class="nav-link dropdown-toggle" href="#" id="navbardropdown" data-toggle="dropdown">Faculty</a>
					<span class="caret"></span>

					<div class="dropdown-menu" aria-labelledby="navbardropdown"> <!-- aria-labelledby used for pointing where it is linked to-->
						<a class="dropdown-item" href="csefaculty.html">CSE</a>

      					<a class="dropdown-item" href="#">ECE</a>
      					
      					<a class="dropdown-item" href="mechfaculty.html">MECH</a>
      					
      					<a class="dropdown-item" href="#">CIVIL</a>
					</div>
				</li>

				<li class="nav-item dropdown">

					<a class="nav-link dropdown-toggle" href="#" id="navbardropdown" data-toggle="dropdown">Search</a>
					<span class="caret"></span>

					<div class="dropdown-menu" aria-labelledby="navbardropdown"> <!-- aria-labelledby used for pointing where it is linked to-->
						<a class="dropdown-item" href="db2.php">Faculty</a>
      					
      					<a class="dropdown-item" href="lab.php">Room No.</a>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="team.html">Team</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="contact us.html">Contact Us</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
				
			</ul>
		</div>
	</nav>

<img src="images/HEADER2.jpg" id="header" alt="">

</body>
</html>

<?php
$variable = "TYPE THE ROOM NUMBER:-" ;
echo "<br/><br/><br/><br/><font size= '5'; color='black'><div style='text-align:center'>".$variable.'</font><br/><br/><br/>';
?>

<div>
<form method="POST" role="form" >
	<input class="form-control" type="TEXT" name="search" id="searchbox" required><br>

	<button class="btn btn-success" type='SUBMIT' name="submit" value="SEARCH">
<span>SEARCH</span>
</form>
</div>

<?php
$output = NULL;

if(isset($_POST['submit'])){
	//connect to the database
	$mysqli = NEW mysqli("localhost", "root", "", "computation_stock");

	$search = $mysqli-> real_escape_string($_POST['search']);

	//query the database
	$resultSet = $mysqli-> query("SELECT * FROM labs WHERE ROOM = '$search'");

if($resultSet-> num_rows > 0) {
			while ($rows = $resultSet->fetch_assoc())
			{
				$COMPUTER_LAB = $rows['COMPUTER LAB'];
				$ROOM = $rows['ROOM'];
				$ENTITY = $rows['ENTITY'];

?>
				<br><br>
				<div class="container">
					<div class="row">
						<table class="table table-condensed table-hover">
				<thead>
				 	<tr>
				 		<th>Computer Lab</th>
				 		<th>Room</th>
				 		<th>Entities</th>
				 	</tr>
				 </thead>

				 <tbody>
				 	<tr>
				 		<td><?php echo $COMPUTER_LAB  ?></td>
				 		<td><center><?php echo $ROOM ?></center></td>
				 		<td><?php echo $ENTITY ?></td>
				 	</tr>
				 </tbody>
						</table>	
					</div>
				</div>

<?php				
			}
	}else{
		echo "NO RESULTS";
			}
}
?>