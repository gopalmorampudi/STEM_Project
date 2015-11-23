<?php
session_start();
include"dbconnection.php";
$student_email=$_SESSION['student_email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Student|Login</title>
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
					<!--<img src="assets/images/logo.png" alt="Techro HTML5 template">--></a>
			<span style="color:#3d84e6"><h2>STEM</h2></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="Student_profile.php">View Profile</a></li>
					<li><a href="view_subject.php">Make appointment</a></li>
					<li><a href="student_search_appointments.php">Appointments</a></li>
					<li><a href="become_tutor_req.php">Become tutor</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li><a href="student_logout.php">Logout</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Change Password</h1>
					<p> </p>
                    
                </div>
    </header>


	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title" style="color:green;">
<?php
						if(isset($_SESSION['flag'])){
							if($_SESSION['flag']=='success'){
								echo 'Your Password Updated successfully';
							}else if($_SESSION['flag']=='failed'){
								echo 'Sorry we are unable to update your password';
							}
						}
					?>
  </h3>
						<!-- <p>
						Lorem Ipsum is inting and typesetting in simply dummy text of the printing and typesetting industry. 
						</p> -->
						
						<form class="form-light mt-20" method="post" action="insert_data.php?action=student_change_password" role="form" 
						onsubmit="return changePasswordValidations()" >
							<div class="form-group">
								<label>Current Password</label>
								<input type="password" name="oldpassword" id="oldPass" class="form-control" 
								onkeypress="noneErrors(oldPass,oldPassError)">
								<span id="oldPassError" style="color:red"></span>
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input type="password" name="newpassword" id="newPass" class="form-control"
								onkeypress="noneErrors(newPass,newPassError)">
								<span id="newPassError" style="color:red"></span>
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="confpassword" id="confPass" class="form-control"
								onkeypress="noneErrors(confPass,confPassError)">
								<span id="confPassError" style="color:red"></span>
							</div>
							
							<button type="submit" name="action" value="student_change_password" class="btn btn-two">Submit</button><p><br/></p>
						</form>
					</div>
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
						<div class="panel-body">
							<p class="simplenav">
								
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>



<script>
	function changePasswordValidations(){
		var oldPass=document.getElementById('oldPass').value;
		var newPass=document.getElementById('newPass').value;
        var confPass=document.getElementById('confPass').value;
		
        var confPassError=document.getElementById('confPassError');
        var newPassError=document.getElementById('newPassError');
        var oldPassError=document.getElementById('oldPassError');
		if(oldPass=='' || newPass=='' || confPass==''){
				if(oldPass==''){
					oldPassError.innerHTML="Please fill Old password field";
				}
				if(newPass==''){
					newPassError.innerHTML="Please fill New password field";
				}
				if(confPass==''){
					confPassError.innerHTML="Please fill Confirm password field";
				}
				return false;
		}
		if(newPass!=confPass){
				confPassError.innerHTML="New password and confirm password mismatch";
				return false;
			}
		return true;
	}
	function noneErrors(id1,id2){
	if(id1.value!=''){
		id2.innerHTML='';
	}
}
</script>


</body>
</html>
<?php
unset($_SESSION['flag']);
?>