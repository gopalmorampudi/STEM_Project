<?php
session_start();
include "DBConnection.php";
$id=$_SESSION['tutor_id'];
$date=$_REQUEST['date'];
?>
<div class="container">
				<div class="row">			
								<div class="col-md-12">
<h1><?=($date==date("Y-m-d"))?'Today Classes':'Classes Details'?></h1>
<br>
<table border="1">
<?php

$query="select st.student_name,s.subject_name,t.date_selected,t.time_selected,t.`status`,t.id
from tutor_student_classes t,subject s,student st 
where t.student_email=st.emailid and t.date_selected='$date' 
and t.tutor_id=$id and t.subject_id=s.subject_id and t.`status`='schedule';";
$result=mysql_query($query);
$i=0;
while($res=mysql_fetch_row($result)){
	if($i==0){
?>
<tr><th>Student Name</th><th>Subject</th><th>Date</th><th>Time</th><th>Status</th>
<?php
if($date==date("Y-m-d")){
?>
	<th>Update</th>
<?php
}
?>
</tr>
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
<?php
if($date==date("Y-m-d")){
?>
	<td><a href="updated_class_complete.php?id=<?=$res[5]?>">Set status to completed</a></td>
<?php
}
?>
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
