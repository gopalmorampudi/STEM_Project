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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="./dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /></head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
<a href="#" class="logo"><span class="logo-mini"><b>Admin</b></span><span class="logo-lg"><b>STEM</b></span> </a>
<nav class="navbar navbar-static-top" role="navigation">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>	
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="logo-lg"><b>Admin</b></span> </a>
</li>
</ul>
</div>
</nav>
</header>
<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
<ul class="sidebar-menu">
<li class="header">MENU NAVIGATION</li>
<li class="treeview active">
<a href="#"><span>Department</span>
<i class="fa fa-angle-left pull-right text-green"></i>
</a>
<ul class="treeview-menu">
<li class="active"><a href="view_dept.php">
<span>View Departments</span>
<i class="fa fa-angle-left pull-right text-green"></i>
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
<li><a href="view_all_student.php">
<span>View All Students</span>
<i class="fa fa-angle-left pull-right"></i>
</a></li>
</ul>
</li>
<li class="treeview ">
<a href="appointments.php">
<span>View Appointments</span>
<i class="fa fa-angle-left pull-right"></i>
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
</aside>
<div class="content-wrapper">
<section class="content-header">
<h1></i>
Departments 
<small>Detailes table</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"></i>Departments </a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h1 class="box-title">
<a></i><b>All Department List</b></a>
</h1>
</div>	
<div class="box-body">
<table id="example1"  class="table table-bordered table-striped">
<thead>
<tr>
<th>Departments</th>

</tr>
</thead>
<tbody>
<?php
$sql="select * from departments";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0){
$brdarray=array();
while($subres=mysql_fetch_assoc($res)) {
$subjectarray[] = $subres;
}
if(!empty($subjectarray)){
foreach ($subjectarray as $subject) {
?>		
<tr>
<!--<td><?=$subject['dept_id']?></td>-->
<td><?=$subject['dept_name']?></td>
</tr>
<?php
}
}
}
else {
?>	
<tr>
<td>
<h4><b>No Departments Available here</b></h4>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
</div>
<aside class="control-sidebar control-sidebar-dark">
<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane" id="control-sidebar-home-tab">
<h3 class="control-sidebar-heading">Recent Activity</h3>
<ul class="control-sidebar-menu">
<li>
<a href="javascript::;">
<i class="menu-icon fa fa-birthday-cake bg-red"></i>
<div class="menu-info">
<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
<p>Will be 23 on April 24th</p>
</div>
</a>
</li>
<li>
<a href="javascript::;">
<i class="menu-icon fa fa-user bg-yellow"></i>
<div class="menu-info">
<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
<p>New phone +1(800)555-1234</p>
</div>
</a>
</li>
<li>
<a href="javascript::;">
<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
<div class="menu-info">
<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
<p>nora@example.com</p>
</div>
</a>
</li>
<li>
<a href="javascript::;">
<i class="menu-icon fa fa-file-code-o bg-green"></i>
<div class="menu-info">
<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
<p>Execution time 5 seconds</p>
</div>
</a>
</li>
</ul>

<h3 class="control-sidebar-heading">Tasks Progress</h3>
<ul class="control-sidebar-menu">
<li>
<a href="javascript::;">
<h4 class="control-sidebar-subheading">
Custom Template Design
<span class="label label-danger pull-right">70%</span>
</h4>
<div class="progress progress-xxs">
<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
</div>
</a>
</li>
<li>
<a href="javascript::;">
<h4 class="control-sidebar-subheading">
Update Resume
<span class="label label-success pull-right">95%</span>
</h4>
<div class="progress progress-xxs">
<div class="progress-bar progress-bar-success" style="width: 95%"></div>
</div>
</a>
</li>
<li>
<a href="javascript::;">
<h4 class="control-sidebar-subheading">
Laravel Integration
<span class="label label-warning pull-right">50%</span>
</h4>
<div class="progress progress-xxs">
<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
</div>
</a>
</li>
<li>
<a href="javascript::;">
<h4 class="control-sidebar-subheading">
Back End Framework
<span class="label label-primary pull-right">68%</span>
</h4>
<div class="progress progress-xxs">
<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
</div>
</a>
</li>
</ul>
</div>
<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
<div class="tab-pane" id="control-sidebar-settings-tab">
<form method="post">
<h3 class="control-sidebar-heading">General Settings</h3>
<div class="form-group">
<label class="control-sidebar-subheading">
Report panel usage
<input type="checkbox" class="pull-right" checked />
</label>
<p>
Some information about this general settings option
</p>
</div>
<div class="form-group">
<label class="control-sidebar-subheading">
Allow mail redirect
<input type="checkbox" class="pull-right" checked />
</label>
<p>
Other sets of options are available
</p>
</div>
<div class="form-group">
<label class="control-sidebar-subheading">
Expose author name in posts
<input type="checkbox" class="pull-right" checked />
</label>
<p>
Allow the user to show his name in blog posts
</p>
</div>
<h3 class="control-sidebar-heading">Chat Settings</h3>
<div class="form-group">
<label class="control-sidebar-subheading">
Show me as online
<input type="checkbox" class="pull-right" checked />
</label>
</div>
<div class="form-group">
<label class="control-sidebar-subheading">
Turn off notifications
<input type="checkbox" class="pull-right" />
</label>
</div>
<div class="form-group">
<label class="control-sidebar-subheading">
Delete chat history
<a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
</label>
</div>
</form>
</div>
</div>
</aside>
<div class="control-sidebar-bg"></div>
</div>
<footer class="main-footer">
<div class="pull-right hidden-xs">

</div>

</footer>
<script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="./plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="./plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<script src="./dist/js/app.min.js" type="text/javascript"></script>
<script src="./dist/js/demo.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
$("#example1").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});
</script>
</body>
</html>
