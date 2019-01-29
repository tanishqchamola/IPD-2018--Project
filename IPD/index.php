<?php 
session_start();
if(!isset($_SESSION["sess_fullname"])){
	header("location:login.php");
} else {
?>

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
	<img src="images/HEADER2.jpg" id="header" alt="">

	<nav class="navbar navbar-default sticky-top navbar-expand-md navbar-light " style="filter: 10px;">

		<a class="navbar-brand" href="#"><h6>Signed in as <i><?=$_SESSION['sess_fullname'];?></i>.</h6></a>

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

<div class="container">

	<div class="row">
		<div class="col-12" >
		<p><br><br>Chandigarh College of Engineering and Technology (CCET) is under the administrative control of the Directorate of Technical Education, Chandigarh Administration and is affiliated to Panjab University for its degree courses and Punjab State Board of Technical Education and Industrial Training for its Diploma courses.<br></p>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
		<h2>IMAGE GALLERY</h2>
		<p>
		<div class="gallery" style ="padding-right: 20px; padding-left: 20px; padding-top: 20px; padding-bottom: 20px; background-color: white; border-radius: 7px " >
		<marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="scroll" direction="left" scrollamount="12" >
		<img src="images/gallery6.jpg" width="300" height="200" alt="image6" style="padding-right: 10px">
	    <img src="images/gallery1.jpg" width="300" height="200" alt="image1" style="padding-right: 10px">
	    <img src="images/gallery2.jpg" width="300" height="200" alt="image2" style="padding-right: 10px">
	    <img src="images/gallery3.jpg" width="300" height="200" alt="image3" style="padding-right: 10px">
	    <img src="images/gallery4.jpg" width="300" height="200" alt="image4" style="padding-right: 10px">
	    <img src="images/gallery5.jpg" width="300" height="200" alt="image5" style="padding-right: 10px">
	    <img src="images/gallery7.jpg" width="300" height="200" alt="image7" style="padding-right: 10px">
	  	</marquee>
		</div><br></p>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
		<h2>HISTORY</h2>
		<p>
		CCET, formerly known as Central Polytechnic Chandigarh (CPC), was established in 1959. The Chandigarh Administration upgraded the CPC to CCET, by then Administrator Lt. Gn. JFR Jacob, by introducing two branches of engineering in 2002.<br><br>

		It is the only technical college offering both Diploma and Degree qualifications in Chandigarh.<br><br>
		</p>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
		<h2>PRINCIPAL'S MESSAGE</h2>
		<p>
		In every sphere of our life the influence of technology is becoming so pervasive, it gets indispensable to keep up with this fast changing world. The perfect platform that makes a learning environment ideal is calm, well-disciplined and oderly learning environment. I encourage not only our students but our faculties too, to hone their skills and yearn for innovation.<br><br><div class="text-right"><i>-Dr. M.S. Gujral Principal CCET (Degree Wing)</div></i><br>
		</p>
		</div>
	</div>
	<br><br><br><br><br><br><br><br>
</body>
</html>


<?php
}
?>