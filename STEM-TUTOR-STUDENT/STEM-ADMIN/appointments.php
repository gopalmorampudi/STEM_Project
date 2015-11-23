<?php
session_start();
include 'dbconnection.php';
if (empty($_SESSION['adminuser']))
	header("Location:index.php");
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin | STEM</title>
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="./dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /></head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
<!-- Logo -->
<a href="#" class="logo"><span class="logo-mini"><b>Admin</b></span><span class="logo-lg"><b>STEM</b></span> </a>
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>	
<!-- Sidebar toggle button-->
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="logo-lg"><b>Admin</b></span> </a>
</li>
</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
<div class="user-panel">
<ul class="sidebar-menu">
<li class="header">MENU NAVIGATION</li>
<li class="treeview">
<a href="#"><span>Department</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="view_dept.php">
<span>View Departments</span>
<i class="fa fa-angle-left pull-right"></i>
</a></li>
<li>
<a href="add_department.php">
<span>Add Department</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
</ul>
</li>
<li class="treeview">
 <a href="#">
<span>Courses </span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="view_subject.php">
<span>View Courses</span>
<i class="fa fa-angle-left pull-right"></i>
 </a>
 </li>
<li>
<a href="add_subjects_form.php">
<span>Add Courses</span> 
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
</ul>
</li>
<li class="treeview">
  <a href="#">
<span>Tutor</span><i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li>
  	<a href="view_all_tutor.php">
  	<span>View All Tutors</span>	
  	<i class="fa fa-angle-left pull-right"></i>
  	</a></li>
   <li>
<a href="request_tutor.php">
<span>Request Tutors</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
  </ul>
  </li>
  <li class="treeview">
  <a href="#">
<span>Schedule</span><i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li>
  	<a href="make_schedule.php">
  	<span>Make Schedule</span>	
  	<i class="fa fa-angle-left pull-right"></i>
  	</a></li>
   <li>
<a href="view_schedule.php">
<span>View Schedule</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>

  </ul>
  </li>  
<li class="treeview">
<a href="#">
<span>Students</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<!--<li><a href="student_course_request.php"></i>Student Course Request</a></li>-->
<li><a href="view_all_student.php">
<span>View All Students</span>
<i class="fa fa-angle-left pull-right"></i>
</a></li>
</ul>
</li>
<li class="treeview active">
<a href="appointments.php">
<span>View Appointments</span>
<i class="fa fa-angle-left pull-right text-green"></i>
</a>
</li>
<li class="treeview">
<a href="tutor_Notifications.php">
<span>Tutors Notifications</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
<a href="std_Notifications.php">
<span>Student Notifications</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
<a href="student_course_notifications.php">
<span>Student Course Notifications</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
<a href="std_become_tutor.php">
<span>Student As Tutor</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
  <a href="#">
<span>Excel Sheet Data</span><i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li>
<a href="excelData.php">
<span>View Excel Data</span>	
<i class="fa fa-angle-left pull-right"></i>
</a></li>
   <li>
<a href="uploadExcelData.php">
<span>Upload Excel Data</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
  </ul>
  </li>
<li class="treeview">
<a href="enquiries.php">
<span>Enquiries</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
<a href="changepass.php?action=admin">
<span>change Password</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
<a href="logout.php">
<span>Logout</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
</ul>
</section>
<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1></i>
Tutor
<small>Detailes tables</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"></i>Appointments</a></li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h1 class="box-title">
<a></i><b>Scheduled Student Request </b></a>
</h1>
</div>	
<div class="box-body">
<table id="example1"  class="table table-bordered table-striped">
<thead>
<tr>
<th>Tutor Name</th>
<th>Student Name</th>
<th>Subject Name</th>
<th>Date</th>
<th>Time</th>
<th>Operations</th>
</tr>
</thead>
<tbody>
<?php
$sql="select t.tutor_name,t.emailid temail,s.student_name,s.emailid semail,sub.subject_name,ap.appointment_id,ap.a_date,ap.from_hour,ap.to_hour,ap.from_min,ap.to_min,ap.from_period,ap.to_period,ap.purpose, ts.id from tutor t, student s, appointments ap, subject sub,tutor_schedule2 ts where t.tutor_id=ap.instructor_id and s.student_id=ap.student_id and sub.subject_id=ap.course_code and ts.id=ap.row_id and ap.status='app_req'";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0){
while($res=mysql_fetch_assoc($result)) {
?>		
<tr>
<td><?=$res['tutor_name'] ?></td>
<td><?=$res['student_name'] ?></td>
<td><?=$res['subject_name'] ?></td>
<td><?=$res['a_date'] ?></td>
<td>
<?php
$fhour = $res['from_hour'];
$thour = $res['to_hour'];
$fmint = $res['from_min'];
$tmint = $res['to_min'];
echo $time= $fhour.":".$fmint.' '.$res['from_period']." - ". $thour.":".$tmint.' '.$res['to_period'];
?></td>
<td>
<form action="appointments_update.php" method="post">
<input type="hidden" name="appId" value="<?=$res['appointment_id'] ?>">
<input type="hidden" name="id" value="<?=$res['id'] ?>">
<input type="hidden" name="tutor_name" value="<?=$res['tutor_name'] ?>">
<input type="hidden" name="tutor_email" value="<?=$res['temail'] ?>">
<input type="hidden" name="student_name" value="<?=$res['student_name'] ?>">
<input type="hidden" name="student_email" value="<?=$res['semail'] ?>">
<input type="hidden" name="apdate" value="<?=$res['a_date'] ?>">
<input type="hidden" name="aptime" value="<?=$time ?>">
<input type="submit" name="action" value="Accept" class="btn btn-primary">
</form>
<form action="appointments_update.php" method="post">
<input type="hidden" name="appId" value="<?=$res['appointment_id'] ?>">
<input type="submit" name="action" value="Reject" class="btn btn-primary">
</form>
</td>
</tr>
<?php
}
}
else {
?>	
<tr>
<td></td>
<td></td>
<td>
<h4><b>No New Apointments Available here</b></h4>
</td>
<td></td>
<td></td>
<td></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<!-- Control Sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
<footer class="main-footer">
<div class="pull-right hidden-xs">
</div>
</footer>
<script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="./plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="./plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="./dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging" : true,
			"lengthChange" : false,
			"searching" : false,
			"ordering" : true,
			"info" : true,
			"autoWidth" : false
		});
	}); 
</script>
</body>
</html>
