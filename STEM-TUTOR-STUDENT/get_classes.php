<?php
session_start();
include "DBConnection.php";
$date=$_REQUEST['date'];
?>
<div class="container">
				<div class="row">			
								<div class="col-md-12">
<h1><?=($date==date("Y-m-d"))?'Today Classes':'Classes Details'?></h1>
<br>
<table border="1">
<?php
$email=$_SESSION['student_email'];

$query="select tu.tutor_name,s.subject_name,t.date_selected,t.time_selected,t.`status` 
from tutor_student_classes t,tutor tu,subject s 
where t.student_email='$email' and t.date_selected='$date' 
and t.tutor_id=tu.tutor_id and t.subject_id=s.subject_id and t.`status`='schedule'";
$result=mysql_query($query);
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
<td><?=$res[3]?></td>
<td><?=$res[4]?></td>
</tr>
<?php
}
if($i==0){
	echo 'No Classes Scheduled today...';
}
?>
</table>
	</div>
								
							</div>
							</div>
