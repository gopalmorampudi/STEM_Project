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
	<title>Student|Tutor|Register</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php">
					<span style="color:#3D84E6"><h2>STEM</h2></span></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="tutor_profile.php">Tutor Profile</a></li>
					<li><a href="#">View Subjects</a></li>
					<li><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor profile</h2>
                     <h4>Hi <?=$_SESSION['t_name']?> </h4>
                </div>
    </header>

	<!-- container -->
	<?php
    include "DBConnection.php";
	$tutor_email=$_SESSION['tutor_email'];
	$sql="select tutor_id,tutor_name,emailid,phone_number,address,subject,working_hours,working_days from tutor where emailid='$tutor_email'";
 $res=mysql_query($sql);
	if($rs=mysql_fetch_array($res)){
	?>	
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Tutor Profile</h3>
						<form class="form-light mt-20" action="insert_data.php" method="post" role="form">
							<div class="form-group">
								<label>Id</label>
								<input type="text" class="form-control" name="tutor_id" value="<?=$rs[0]?>" readonly>
							</div>
							<div class="form-group">
								<label>UserName</label>
								<input type="text" class="form-control" name="tutorname" value="<?=$rs[1]?>">
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" name="email" class="form-control" value="<?php echo $rs[2]?>">
									</div>
								</div>
								
							</div>
                             <div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phno" class="form-control" value="<?php echo $rs[3]?>">
							</div>
							<div class="form-group" >
								<label>Select Subject</label><br>
	                 <?php  $subj=$rs['subject'];
$sql1="select subject_id,subject_name from subject";
$result1=mysql_query($sql1);
while($proarray1=mysql_fetch_row($result1)){
	$a=strstr($subj,$proarray1[1]);
if($a){
	?>
	<input type="checkbox" checked='checked' name="subject[]" value="<?=$proarray1[1]?>" /><?php echo $proarray1[1]?> &nbsp;&nbsp;
	<?php
}else{
	?>
	<input type="checkbox" name="subject[]" value="<?=$proarray1[1]?>" /><?php echo $proarray1[1]?> &nbsp;&nbsp;
	<?php
}
}
?>
				
							</div>
							 <div class="form-group">
								<label>Working Hours</label>
								<select class="form-control"  name="hours" >
								<option value="<?php echo $rs[6]?>"><?php echo $rs[6]?></option>
								  <option value="01">01</option>
								   <option value="02">02</option>
								   <option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
							</select>

							</div>
							 <div class="form-group" >
								<label>Working Days</label>
								<select class="form-control" name="days" >
								<option value="<?php echo $rs[7]?>"><?php echo $rs[7]?></option>
								  <option value="01">01</option>
								   <option value="02">02</option>
								   <option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								
							</select>

							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text"class="form-control" name="address" value="<?php echo $rs[4]?>" id="address" style="height:80px;">
							</div>
							<button type="submit" name="action" value="update_profile" class="btn btn-two">Update</button><p><br/></p>
							
						</form>
	<?php }?>
					</div>
					
				</div>
			</div>
	<!-- /container -->

	 <footer id="footer">
 
		<div class="container">
   	<!-- <div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div> -->

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="tutor_profile.php">View Profile</a> | 
								<a href="#">View Subjects</a> |
								<a href="tutor_changepwd.php">Change Password</a> |
								<a href="logout.php">Logout</a> |
								
							</p>
						</div>
					</div>

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

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="assets/js/google-map.js"></script>


</body>
</html>
