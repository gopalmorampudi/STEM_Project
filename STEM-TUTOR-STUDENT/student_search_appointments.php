<?php
session_start();
include"dbconnection.php";
 
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
					<!-- <img src="assets/images/logo.png" alt="Techro HTML5 template">--></a>
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
                    <h1>View Appointments</h1>
                    <p></p>
                </div>
    </header>
<!-- container -->
<div class="container container-ht1" >
<div class="row">	
<br/>
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="row">
<label style="float:left; font-size: 26px; ">Search By Date:</label>
<form action="student_search_appointments.php" method="post">
<input  type="date" name="date" class="form-control" style="width: 150px; float:left; margin: 0px 5px;" required/>
<button type="submit" name="submit" class="form-control btn btn-primary" style="width: 100px;">Search</button>
</form>
<br/>
<div class="col-md-12">
	<table class="table table-bordered">
    <thead>
      <tr>
      	<th>Date</th>
        <th>Timings</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
<?php
$student_id=$_SESSION['student_id'];
$currentdate="";
if(isset($_REQUEST['date']))
$currentdate = $_REQUEST['date'];
else
$currentdate = date('Y-m-d');
$sql="select a.a_date, a.from_hour, a.to_hour,a.from_min, a.to_min, t.tutor_name, sub.subject_name from appointments a, student sdt, tutor t, subject sub where sub.subject_id=a.course_code and a.student_id= sdt.student_id and a.a_date='$currentdate' and a.student_id=$student_id and a.`status`='app_fixed'";
$res=mysql_query($sql);
$rowcount=mysql_num_rows($res);
if($rowcount>0){
while($row=mysql_fetch_assoc($res)) {
?>
  <tr>
<td><?=$row['a_date'];?></td>
<td>
	<?php
	echo $formTime="<b>From Time:- </b> " . $row['from_hour'].":".$row['from_min'] ;
	echo "<br>";
	echo $toTime="<b>To Time:- </b> " .$row['to_hour'].":".$row['to_min'] ;
	?>
</td>
<td>
	<?php
	echo "<b>Tutor Name: </b> " .$row['tutor_name'];
	echo "<br>";
	echo "<b>Subject Name: </b> " .$row['subject_name'];
	?>
</td>
  </tr>
  <?php
  }
}else
	{
?>	    
   <tr>
   	
   	<td colspan="3" align="center"><b>No Results Found</b></td>
   	
   </tr>   
  <?php }
	?>
    </tbody>
  </table>
  
 
</div>
</div>
<br/>
</div>
<div class="col-md-3">
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
</body>
</html>
