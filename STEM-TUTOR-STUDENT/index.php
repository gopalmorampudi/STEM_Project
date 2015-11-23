<?php
include("MainClass.class.php");
$object=new MainClass();
$subjectsArray=$object->getAllSubject();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>STEM|Courses</title>
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
  <nav class="navbar navbar-static-top" role="navigation">
           <div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<!-- <img src="assets/images/logo.png" alt="Techro HTML5 template">--></a>
			<span style="color:#3d84e6"><h2>STEM</h2></span>
			</div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.php">Courses</a></li>
					<!-- <li><a href="login.html">Student</a></li> -->
					 <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                        <ul class="dropdown-menu">
                            <li><a href="login_student.html">Login</a></li>
                            <li class="active"><a href="studentregister.php">Register</a></li>
                         </ul>
                    </li>
					<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutor<b class="caret"></b></a> 
                        <ul class="dropdown-menu">
                           <li><a href="login.html">Login</a></li>
                            <li class="active"><a href="register_tutor.php">Register</a></li>
                         </ul>
                    </li>
					<li><a href="contact.html">Contact</a></li>                  
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
</div>
</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Courses</h1>
                    <p></p>
                </div>
    </header>

    

	<div id="courses">
		<section class="container">
			<h3>Development Courses</h3>
			
			<?php
									foreach($subjectsArray as $subject){
								?>
				<div class="col-md-4">
					<div class="featured-box"> 
						<div class="text">
							<h3><?=$subject[1]?></h3>
							
						</div>
					</div>
				</div>
				<?php
									}
								?>
				
	

		</section>
	</div>
    
	<!-- container -->
	<div class="container">
		<div class="row">
			<!-- Article content -->
			<section class="col-sm-12 maincontent">
				<h3></h3>
				<p>
					
				</p>
				<h3></h3>
				<p></p>
			</section>
		</div>
	</div>
	<!-- /container -->
 <footer id="footer">
 
		<div class="container">
   

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					
					<div class="col-md-6 panel">
						<!-- <div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2015. Template by <a href="www.smartmindsteam.com" rel="develop">www.smartmindsteam.com</a>
							</p>
						</div> -->
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
</body>
</html>
