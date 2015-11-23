<?php
include 'MainClass.class.php';
$obj=new MainClass();
$megaContainer=$obj->getSubjects();
$userStatus='';
$user=$_SESSION['tutor_id'];
if(isset($_SESSION['tutor_id'])){
$userStatus.=$obj->isScheduled($user);
}
$weekdays=array('Monday','tuesday','Wednesday','Thursday','Friday','Saturday');
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
				<a class="navbar-brand" href="index.html">
					<!-- <img src="assets/images/logo.png" alt="Techro HTML5 template"> --></a>
			<span style="color:#3D84E6"><h2>STEM</h2></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="tutor_profile.php">Tutor Profile</a></li>
					<li class="active"><a href="view_tutor_schedule.php">View Courses</a></li>
					<li><a href="tutor_classes_details.php?usertype=tutor&classtype=current">Classes</a></li>
					<li><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor Schedule</h2>
                    <h4></h4>
                </div>
    </header>
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Tutor Schedule</h3>
<?php
if($userStatus=='no'){
?>
<form action="callableClasses.php" method="post">
<table border="1">
<tr>
<td></td>
<td>8:00AM</td>
<td>9:00AM</td>
<td>10:00AM</td>
<td>11:00AM</td>
<td>12:00AM</td>
<td>1:00PM</td>
<td>2:00PM</td>
<td>3:00PM</td>
<td>4:00PM</td>
<td>5:00PM</td>
</tr>
<?php
for($w=0;$w<sizeof($weekdays);$w++){
?>
<tr>
<th><?=$weekdays[$w]?></th>
<?php
for($i=1;$i<=10;$i++){
?>
<td>
<select name="<?='subject'.$w.'[]'?>">
<option value="null">Select Cource</option>
 <?php
foreach($megaContainer as $mega){
?>
		<option value="<?=$mega[0]?>"><?=$mega[1]?></option>
<?php
	}
?>
</select>
</td>
<?php
}
?>
</tr>
<?php
}
?>
<tr align="center"><td><button type="submit" name="type" value="setTutorSchedule">submit</button></td></tr>
</table>
</form>
<?php
}else{
$sql="select t.weekdays,t.schedule_id,t.tutor_id,t.c1_8AM,t.c2_9AM,t.c3_10AM,t.c4_11AM,t.c5_12AM,t.c6_1PM,t.c7_2PM,t.c8_3PM,
t.c9_4PM,t.c10_5PM,t.`status` from tutor_schedule t where t.tutor_id=".$user." order by t.tutor_id";
$result=mysql_query($sql);
$scheduleDataSet=array();
while($res=mysql_fetch_row($result)){
		$dataSet=array();
		for($i=0;$i<sizeof($res);$i++){
			array_push($dataSet,$res[$i]);
		}
		array_push($scheduleDataSet,$dataSet);
}		 
?>

		<table border='1'>
		<tr>
<td></td>
<td>8:00AM</td>
<td>9:00AM</td>
<td>10:00AM</td>
<td>11:00AM</td>
<td>12:00AM</td>
<td>1:00PM</td>
<td>2:00PM</td>
<td>3:00PM</td>
<td>4:00PM</td>
<td>5:00PM</td>
</tr>
<?php
?>
<?php
//print_r($scheduleDataSet);
	foreach($scheduleDataSet as $data){
		?>
		<form action="callableClasses.php" method="post">
		<tr>
		<?php
		for($i=0;$i<sizeof($data);$i++){
			if($i==1 || $i==2 || $i==sizeof($data)-1){}
			else{
		 if($i>=3 && $i<=sizeof($data)-2){
			 ?>
			<td><span id="<?='span'.$i.$data[0]?>"><?=$obj->getSubjectName($data[$i])?></span>
			<select name="<?='subject'.$i.$data[0]?>" id="<?='subject'.$i.$data[0]?>" style="display:none;">
			<option value="null">Select Cource</option>
			<?php
				foreach($megaContainer as $mega){
			?>
					<option value="<?=$mega[0]?>" <?=($mega[0]==$data[$i])?'selected':''?>><?=$mega[1]?></option>
			<?php
				}
			?>
			</select>
			</td>
			<?php
		 }else{
		?>		
			<td><?=$data[$i]?>
			<input type="hidden" name="weekday" value="<?=$data[$i]?>"/>
			</td>
		<?php
			 }
			}
		}
		?>
		<td><a href="#" onclick="upSubjects('<?=$data[0]?>',this)">EDIT</a>
		<button type="submit" id="<?=$data[0]?>" name="type" value="day_schedule_update" style="display:none">Update</button>
		<a id="<?=$data[0].'refresh'?>" href="view_tutor_schedule.php" style="display:none">Refresh</a>
		</td>
		
		</tr>
		</form>
		
		<?php
	}	
?>
		</table>
		<script>
		function upSubjects(day,aID){
			//alert(day);
			for(var i=3;i<=12;i++){
				document.getElementById('span'+i+day).style.display="none";
				aID.style.display="none"
				document.getElementById('subject'+i+day).style.display="block";
				document.getElementById(day).style.display="block";
				document.getElementById(day+'refresh').style.display="block";
			}
		}
		
		</script>
	
	<?php	
}
?>
	</div>
					
				</div>
			</div>
 <footer id="footer">
 
		<div class="container">
   <!--	<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								
							</p>
						</div>
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

