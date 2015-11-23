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
	<title>STEM|Tutor</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body >

	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
				</a>
			<span style="color:#3D84E6"><h2>STEM</h2></span>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="tutor_profile.php">Tutor Profile</a></li>
					<li><a href="test.php">Shedule</a></li>
					<li class="active"><a href="tutorRequest.php">Request to admin</a></li>
					<li><a href="tutor_search_appointments.php">Appointments</a></li>
					<li><a href="tutor_changepwd.php">Change Password</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			
		</div>
	</div>
	<header id="head" class="secondary">
            <div class="container">
                    <h2>Tutor Schedule</h2>
                    <h4></h4>
					
                </div>
    </header>
<!-- container -->
<div class="container">
<div class="row">
<div class="col-md-6">

<form class="form-light mt-20" action="insertTutorRequest.php" method="post" >
<div class="form-group">
<label>Date</label>

<input type="date" class="form-control" name="date" placeholder="Date" value="<?=(isset($_REQUEST['date']))?$_REQUEST['date']:''?>">
</div>
<div class="form-group">
<label>Time</label>
<div class="col-md-12">
<div class="col-md-8">
<?php
$array1;
if(isset($_REQUEST['time'])){
	$array1=explode('-',$_REQUEST['time']);
}
?>
<input type="text" value="<?=$array1[0]?>" name="from_time"  placeholder="HH" style="width: 50px; float: left; margin: 10px;" class="form-control">
<input type="text" value="<?=$array1[1]?>" name="from_mints" placeholder="MM" style="width: 50px; float: left; margin: 10px;" class="form-control">
<select class="form-control" style="width: 80px; margin: 10px;" name="fnoon">
<option value="AM" <?=($array1[2]=='AM')?"selected":''?>>AM</option>
<option value="PM" <?=($array1[2]=='PM')?"selected":''?>>PM</option>
</select>
</div>
<div class="col-md-8">
<input type="text" value="<?=$array1[3]?>" name="to_time"  placeholder="HH" style="width: 50px; float: left; margin: 10px;" class="form-control">
<input type="text" value="<?=$array1[4]?>" name="to_mints" placeholder="MM" style="width: 50px; float: left; margin: 10px;" class="form-control">
<select class="form-control" style="width: 80px; margin: 10px;" name="tnoon">
<option value="AM" <?=($array1[5]=='AM')?"selected":''?>>AM</option>
<option value="PM" <?=($array1[5]=='PM')?"selected":''?>>PM</option>
</select>
</div>
</div>
</div>
<div class="form-group">
<label>Reason</label>
<select class="form-control" name="reason">
<option value="class cancellation">class cancellation</option>
<option value="sick">sick</option>
<option value="personal work">personal work</option>
<option value="other">other</option>
</select>
</div>
<div class="form-group">
<label>Message</label>
<textarea class="form-control" name="description" placeholder="Write you message here..." style="height:100px;"></textarea>
</div>
<button type="submit" class="btn btn-two">Send message</button><p><br/></p>
</form>
</div>

</div>
</div>
<script>
function checkFlag(){
	var flag=document.getElementById('flag').value;
	if(flag=='reqsuccess'){
		document.getElementById('title_log').innerHTML="<font color='green'>Your message has been sent successfully</font>";
	}else if(flag=='loginFailed'){
		document.getElementById('title_log').innerHTML="<font color='red'>Due to some issues we are unable to send your request....!</font>";
	}
	
}
</script>
</body>
</html>
