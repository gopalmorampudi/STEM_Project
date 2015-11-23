<?php
session_start();
if(empty($_SESSION['tutor_email']))
header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Tutor</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<!-- <img src="assets/images/logo.png" alt="Techro HTML5 template"> --></a>
			<span style="color:#3D84E6"><h2>STEM</h2></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="Home.php">Home</a></li>
					<li><a href="tutor_profile.php">Tutor Profile</a></li>
					<li><a href="test.php">Make Shedule</a></li>
					<li><a href="view_tutor_schedule.php">View Shedule</a></li>
					<li><a href="tutor_classes_details.php?usertype=tutor&classtype=current">Classes</a></li>
					<li><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->
<?php
    include "DBConnection.php";
	$tutor_email=$_SESSION['tutor_email'];
	
	
	?>	
		<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor Home</h2>
                    <h4></h4>
                </div>
    </header>

	<!-- container -->
	
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Tutor Home</h3>
	

					</div>
					
				</div>
			</div>
	<!-- /container -->

	 <footer id="footer">
 
		<div class="container">
   <!--	<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								
								
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="assets/js/google-map.js"></script>


</body>
</html>
