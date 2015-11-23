<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Tutor|Login</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body onload="checkFlag();">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">   
<div class="container"> 
  <nav class="navbar navbar-static-top" role="navigation">
           <div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					</a>
			<span style="color:#3d84e6"><h2>STEM</h2></span>
			</div>
             <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.php">Courses</a></li>
			
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
            </div><!-- /.navbar-collapse -->
            </div><!-- /.navbar-collapse -->
        </nav>
</div>
</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Login Here</h1>
                    <p>Education Development</p>
                </div>
    </header>


	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title" id="tutor_regStatus">Tutor Login</h3>
					
						
						<?php
						if(isset($_SESSION['flag'])=='success'){
							?>
							<input type="hidden" name="flag" id="flag" value="<?php echo $_SESSION['flag'];?>">
							<?php
						}else{
							?>
							<input type="hidden" name="flag" id="flag" value="">
							<?php
						}
						?>
						<form class="form-light mt-20" method="post" action="login.php" role="form" 
						onsubmit="return loginFormValidations();">
							<div class="form-group">
								<label>Email Id</label>
								<input type="text" name="username" id="email" class="form-control" placeholder="Enter Your email-id" onkeypress="noneErrors(email,emailError);">
								<span id="emailError" style="color:red"></span>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" onkeypress="noneErrors(password,passwordError);">
											<span id="passwordError" style="color:red"></span>
									</div>
								</div>
								
							</div>
							<button type="submit" name="action" value="tutor_login" class="btn btn-two">Sign In</button><p><br/></p>
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
					
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


<script>
function loginFormValidations(){
	var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;

	if(email=='' || password==''){
		if(email==''){	
			document.getElementById('emailError').innerHTML="Please fill email field";
			
		}
		if(password==''){
			document.getElementById('passwordError').innerHTML="Please fill password field";
		}
		return false;
	}
	return true;
}
function checkFlag(){
	var flag=document.getElementById('flag').value;
	if(flag=='success'){
		document.getElementById('tutor_regStatus').innerHTML='<font color="green">You have registred successfully, please wait for admin acceptence to login</font>';
	}else if(flag=='loginFailed'){
		document.getElementById('tutor_regStatus').innerHTML='<font color="red">Please check, your email id or password might be wrong</font>';
	}
	
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