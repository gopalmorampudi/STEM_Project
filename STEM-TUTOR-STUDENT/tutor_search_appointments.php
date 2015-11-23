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
					<li><a href="tutor_profile.php">Tutor Profile</a></li>
					<li><a href="test.php">Shedule</a></li>
					<li><a href="tutorRequest.php">Request to admin</a></li>
					<li class="active"><a href="tutor_search_appointments.php">Appointments</a></li>
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
                    <h1>View Appointments</h1>
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
<form action="tutor_search_appointments.php" method="post">
<input  type="date" name="date" class="form-control" style="width: 150px; float:left; margin: 0px 5px" required/>
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
$tutor_id=$_SESSION['tutor_id'];
$currentdate="";
if(isset($_REQUEST['date']))
$currentdate = $_REQUEST['date'];
else
$currentdate = date('Y-m-d');
$sql="select a.a_date, a.from_hour, a.to_hour,a.from_min, a.to_min, sdt.student_name, sub.subject_name from appointments a, student sdt, tutor t, subject sub where sub.subject_id=a.course_code and a.instructor_id= t.tutor_id and a.a_date='$currentdate' and a.instructor_id=$tutor_id and a.`status`='app_fixed'";
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
	echo "<b>Student Name: </b> " .$row['student_name'];
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
