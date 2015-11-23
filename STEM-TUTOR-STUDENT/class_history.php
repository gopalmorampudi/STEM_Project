<?php
session_start();
include "DBConnection.php";
$user=$_REQUEST['usertype'];
if($user=='student'){
$classtype=$_REQUEST['classtype'];
// $query="select * from tutor_student_classes t where t.student_email='$_SESSION["student_email"]'";
$email=$_SESSION['student_email'];
$query='';
$title='';
if($classtype=='requested'){
$query.="select tu.tutor_name,s.subject_name,t.date_selected,t.hours,t.minutes,t.period,t.`status` from tutor_student_classes t,tutor tu,subject s where t.student_email='$email' and t.tutor_id=tu.tutor_id and t.subject_id=s.subject_id and t.`status`='pending' order by t.date_selected";
$title.='Requeste Classes';
}else if($classtype=='completed'){
$query.="select tu.tutor_name,s.subject_name,t.date_selected,t.hours,t.minutes,t.period,t.`status` from tutor_student_classes t,tutor tu,subject s where t.student_email='$email' and t.tutor_id=tu.tutor_id and t.subject_id=s.subject_id and t.date_selected<=CURRENT_DATE() and t.`status`='completed' order by t.date_selected";
	$title.='Completed Class';
}else if($classtype=='future'){
$query.="select tu.tutor_name,s.subject_name,t.date_selected,t.hours,t.minutes,t.period,t.`status` from tutor_student_classes t,tutor tu,subject s where t.student_email='$email' and t.tutor_id=tu.tutor_id and t.subject_id=s.subject_id and t.date_selected>CURRENT_DATE() and t.`status`='schedule' order by t.date_selected";
	$title.='Future Classes';
}else if($classtype=='current'){
$query.="select tu.tutor_name,s.subject_name,t.date_selected,t.hours,t.minutes,t.period,t.`status` from tutor_student_classes t,tutor tu,subject s where t.student_email='$email' and t.tutor_id=tu.tutor_id and t.subject_id=s.subject_id and t.date_selected=CURRENT_DATE() and t.`status`='schedule' order by t.date_selected";
	$title.='Today Classes';
}
$result=mysql_query($query);
?>
<html>
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
<body onload="f();">
<input type="hidden" id="flag" value="<?=(isset($_SESSION['flag']))?$_SESSION['flag']:''?>"/>
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
					<li><a href="view_subject.php">View Courses</a></li>
					<li>
		<a href="class_history.php?usertype=student&classtype=current">Class Details</a></li>
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
                    <h1>View Courses</h1>
                    <p></p>
                </div>
    </header>
<!-- container -->
<div class="">
<ul>
<li>
<a href="class_history.php?usertype=student&classtype=current">
Today Classes
</a>
</li>
<li>
<a href="class_history.php?usertype=student&classtype=requested">
Requested Class
</a>
</li>
<li>
<a href="class_history.php?usertype=student&classtype=completed">
Completed Classes
</a>
</li>
<li>
<a href="class_history.php?usertype=student&classtype=future">
Up coming class
</a>
</li>
</ul>
<span>Select Date to search :<input type="date" id="d" onchange="change(this)"/></span>
</div>
<div id="cont">
	<div class="container">
				<div class="row">			
								<div class="col-md-12">
<h1><?=$title?></h1>
<br>
<table border="1">


<?php
$i=0;
while($res=mysql_fetch_row($result)){
	if($i==0){
?>
<tr><th>Tutor Name</th><th>Subject</th><th>Date</th><th>Time</th><th>Status</th></tr>
<?php
$i++;
}
?>
<tr>
<td><?=$res[0]?></td>
<td><?=$res[1]?></td>
<td><?=$res[2]?></td>
<td><?=$res[3].":".$res[4].$res[5]?></td>
<td><?=$res[6]?></td>
</tr>
<?php
}
if($i==0){
	echo 'No Classes Scheduled...';
}
?>
</table>
	</div>	
							</div>
							</div>
				</div>	
				 <?php
				 if($classtype=='current'){
  $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
  $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
  $next_date = date('Y-m-d', strtotime($date .' +1 day'));	
?>
<input type="hidden" id="date" value="<?=(isset($_REQUEST['date']))?$_REQUEST['date']:''?>"/>

<a href="class_history.php?usertype=student&classtype=current&date=<?=$prev_date;?>">Previous</a>
<a href="class_history.php?usertype=student&classtype=current&date=<?=$next_date;?>">Next</a>
<?php
				 }
?>
<script>
function f(){
	//alert(date.value);
	if(document.getElementById('date').value!=''){
	var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		//alert(xmlhttp.responseText);
		document.getElementById("cont").innerHTML="";
    document.getElementById("cont").innerHTML=xmlhttp.responseText;
    }
  }
  var url="get_classes.php?date="+document.getElementById('date').value;
xmlhttp.open("GET",url,true);
xmlhttp.send();
	}

}
function change(id){
			// alert(id.value);
			var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		//alert(xmlhttp.responseText);
		document.getElementById("cont").innerHTML="";
    document.getElementById("cont").innerHTML=xmlhttp.responseText;
    }
  }
  var url="get_classes_by_date.php?user=student&date="+id.value;
xmlhttp.open("GET",url,true);
xmlhttp.send();
		}
</script>				
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="assets/js/google-map.js"></script>

</body>
</html>
<?php
}
?>
