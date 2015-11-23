<?php
include("MainClass.class.php");
$object=new MainClass();
$subjectsArray=$object->getAllSubject();
?>
<?php
// session_start();
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
	<title>Student</title>
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
                    <h1>Do you want to become a tutor</h1>
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
								echo 'Your request has been sent to admin, admin will contact you soon';
							}else if($_SESSION['flag']=='failed'){
								echo '<font color="red">Sorry we are unable to send you request</font>';
							}
						}
					?>
						</h3>
						
						
						<form class="form-light mt-20" method="post" onsubmit="return checkForm();" action="send_become_tutor_req.php" role="form" >
							
							<div class="form-group">
								<label>Select courses you want to guide :</label><br>
								
								<?php
								$i=0;
									foreach($subjectsArray as $subject){
								?>
								<input type="checkbox" name="subject[]" onchange="chechNoneError();" id="sub<?=$i?>" value="<?=$subject[0]?>"><?=$subject[1]?>&nbsp;&nbsp;
								<?php
								$i++;
									}
								?>
								<span id="subError" style="color:red;"></span>
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phone_number" id="phone" class="form-control" placeholder="Enter Your Phone Number" onkeypress="noneErrors(phone,phoneError)">
								<span id="phoneError" style="color:red;"></span>
							</div>
							<div class="form-group">
								<label>Desciption :</label>
								<textarea rows="5" cols="30" name="desp" id="desc" placeholder="Enter some description about you skills" class="form-control" 
								onkeypress="noneErrors(desc,descError)"></textarea>
								<span id="descError" style="color:red;"></span>
							</div>
							<button type="submit" name="action" class="btn btn-two">Submit</button><p><br/></p>
						</form>
					</div>
				</div>
			</div>
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
function checkForm(){
	var subChecks = document.getElementsByName('subject[]');
			var subCount=0;
			for(var i=0;i<subChecks.length;i++){
				if(document.getElementById('sub'+i).checked){
					subCount++;
				}
			}
			
			var phone = document.getElementById('phone').value;
			var desc = document.getElementById('desc').value;
			if(phone == '' || desc == ''){
				if(phone==''){
					document.getElementById('phoneError').innerHTML='Please enter your phone number';
				}
				if(desc==''){
					document.getElementById('descError').innerHTML='Please enter some description about you skills';
				}
				if(subCount==0){
				document.getElementById('subError').innerHTML='Please select any one of course';
				}
				return false;
			}
			if(subCount==0){
				document.getElementById('subError').innerHTML='Please select any one of course';
				return false;
			}
	return true;
}
function noneErrors(id1,id2){
	if(id1.value!=''){
		id2.innerHTML='';
	}
}
function chechNoneError(){
	var subChecks = document.getElementsByName('subject[]');
			var subCount=0;
			for(var i=0;i<subChecks.length;i++){
				if(document.getElementById('sub'+i).checked){
					subCount++;
				}
			}
			if(subCount!=0){
				document.getElementById('subError').innerHTML='';
			}
}

</script>


</body>
</html>
<?php
unset($_SESSION['flag']);
?>