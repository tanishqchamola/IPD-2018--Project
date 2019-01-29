<!DOCTYPE html>
<html>
<head>

<title>
FACULTY
</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  	<link rel = "stylesheet" type ="text/css" href= "style.css">

</head>

<body>
<img src="images/HEADER2.jpg" id="header" alt="">

	<nav class="navbar navbar-default sticky-top navbar-expand-md navbar-light " style="filter: 10px;">

		<a class="navbar-brand" href="#"></a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmenu">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarmenu">
			<ul class="navbar-nav ml-auto"> <!-- ml for right, md for left, mx for centre (alignment)-->
				
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>

				<li class="nav-item dropdown active">

					<a class="nav-link dropdown-toggle" href="#" id="navbardropdown" data-toggle="dropdown">Faculty</a>
					<span class="caret"></span>

					<div class="dropdown-menu" aria-labelledby="navbardropdown"> <!-- aria-labelledby used for pointing where it is linked to-->
						<a class="dropdown-item" href="csefaculty.html">CSE</a>

      					<a class="dropdown-item" href="#">ECE</a>
      					
      					<a class="dropdown-item" href="mechfaculty.html">MECH</a>
      					
      					<a class="dropdown-item" href="#">CIVIL</a>
					</div>
				</li>

				<li class="nav-item dropdown active">

					<a class="nav-link dropdown-toggle" href="#" id="navbardropdown" data-toggle="dropdown">Search</a>
					<span class="caret"></span>

					<div class="dropdown-menu" aria-labelledby="navbardropdown"> <!-- aria-labelledby used for pointing where it is linked to-->
						<a class="dropdown-item" href="db2.php">Faculty</a>
      					
      					<a class="dropdown-item" href="lab.php">Room No.</a>
					</div>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="team.html">Team</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="contact us.html">Contact Us</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>

			</ul>
		</div>
	</nav>

</body>
</html>

<?php
$variable = "SEARCH HERE:-" ;
echo "<br/><br/><br/><font size= '5'; color='black'><div style='text-align:center'>".$variable.'</font><br/><br/>';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-10 offset-1 col-xl-6 offset-xl-3">
			<form method="POST" role="form" >
				<div class="form-group">
				<input class="form-control semicircle fa" type="TEXT" name="search" placeholder="&#xf002 Room No/Name/Department" required><br><br>
				</div>
				<button class="btn btn-success semicircle" type='SUBMIT' name="submit" value="SEARCH">SEARCH</button>
			</form>
		</div>
	</div>
</div>
<br><br>

<?php
$output = NULL;

if(isset($_POST['submit'])){
	//connect to the database
	$mysqli = NEW mysqli("localhost", "root", "", "computation_stock");

	$search = $mysqli-> real_escape_string($_POST['search']);
	if($search == "CSE"|| $search == "cse"){
		$resultSet = $mysqli-> query("SELECT * FROM `faculty` WHERE `DEPARTMENT` LIKE 'CSE'");
	}
	elseif ($search == "ECE"|| $search == "ece") {
		$resultSet = $mysqli-> query("SELECT * FROM `faculty` WHERE `DEPARTMENT` LIKE 'ECE'");
	}
	elseif ($search == "MECH"|| $search == "mech") {
		$resultSet = $mysqli-> query("SELECT * FROM `faculty` WHERE `DEPARTMENT` LIKE 'MECH'");
	}
	elseif ($search == "CIVIL"|| $search == "civil") {
		$resultSet = $mysqli-> query("SELECT * FROM `faculty` WHERE `DEPARTMENT` LIKE 'CIVIL'");
	}
	elseif ($search == "APPLIED SCIENCE"|| $search == "applied science") {
		$resultSet = $mysqli-> query("SELECT * FROM `faculty` WHERE `DEPARTMENT` LIKE 'APPLIED SCIENCE'");
	}
	else{
	if (is_numeric($search)){
		$resultSet = $mysqli-> query("SELECT * FROM `faculty` WHERE `ROOM` LIKE '$search'");
	}
	else{
		$resultSet = $mysqli-> query("SELECT * FROM `faculty` WHERE `FACULTY NAME` LIKE '$search'");
	}
	}
	if($resultSet-> num_rows > 0) {
			while ($rows = $resultSet->fetch_assoc())
			{
				$DESIGNATION = $rows['DESIGNATION'];
				$FACULTY_NAME = $rows['FACULTY NAME'];
				$ROOM = $rows['ROOM'];
				$ENTITY = $rows['ENTITY'];
				$PICTURE = $rows['PICTURE'];
				$DEPARTMENT = $rows['DEPARTMENT'];
?>
	<div class="container">
		<div class="row">
			<div class="col-4">
<?php
				echo '<img src="data:;base64,'.base64_encode( $PICTURE ).'" width="250px" />';
?>
			</div>
			<div class="col-8">
				<br><br><br>
					
						<table class="table table-condensed table-hover">
				<thead>
				 	<tr>
				 		<th>Designation</th>
				 		<th>Faculty Name</th>
				 		<th>Department</th>
				 		<th>Room</th>
				 		<th>Entities</th>
				 	</tr>
				 </thead>

				 <tbody>
				 	<tr>
				 		<td><?php echo $DESIGNATION ?></td>
				 		<td><?php echo $FACULTY_NAME ?></td>
				 		<td><?php echo $DEPARTMENT ?></td>
				 		<td><center><?php echo $ROOM ?></center></td>
				 		<td><?php echo $ENTITY ?></td>
				 	</tr>
				 </tbody>
						</table>
			</div>
		</div>
	</div>			
<?php				
			}
	}else{
		echo "NO RESULTS";
			}
}
?>
<div>
	<br><br><br>
</div>