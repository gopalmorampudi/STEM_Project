<?php
include 'MainClass.class.php';
include 'StudentMainClass.class.php';
$type=$_REQUEST['type'];
$scheduleDataSet=array();
if($type=='setTutorSchedule'){
$obj=new MainClass();
$dataArray=array();
for($i=0;$i<=5;$i++){
	$subject=$_POST['subject'.$i];
	array_push($dataArray,$subject);
}
$status=$obj->setSchedule($dataArray);
if($status=='success'){
	header("Location: view_tutor_schedule.php?res=success");
}else{
	header("Location: view_tutor_schedule.php?res=failed");
}
}else if($type=='getTutorSchedule'){
	$id=$_REQUEST['id'];
	$sid=$_REQUEST['sid'];
	$obj=new StudentMainClass($id);
	$sql="select t.weekdays,t.schedule_id,t.tutor_id,t.c1_8AM,t.c2_9AM,t.c3_10AM,t.c4_11AM,t.c5_12AM,t.c6_1PM,t.c7_2PM,t.c8_3PM,
t.c9_4PM,t.c10_5PM,t.`status` from tutor_schedule t where t.tutor_id=".$id." order by t.tutor_id";
$result=mysql_query($sql);

while($res=mysql_fetch_row($result)){
		$dataSet=array();
		for($i=0;$i<sizeof($res);$i++){
			array_push($dataSet,$res[$i]);
		}
		array_push($scheduleDataSet,$dataSet);
}
$cnt=0;		 
if(sizeof($scheduleDataSet)!=0){
	foreach($scheduleDataSet as $data){
		for($i=0;$i<sizeof($data);$i++){
			if($sid==$data[$i]){
				$cnt++;
			}
		}
	}
if($cnt>0){
?>

<table border='3'>
<tr>
<td></td>
<td>8:00AM</td>
<td>9:00AM</td>
<td>10:00AM</td>
<td>11:00AM</td>
<td>12:00PM</td>
<td>1:00PM</td>
<td>2:00PM</td>
<td>3:00PM</td>
<td>4:00PM</td>
<td>5:00PM</td>
</tr>
<?php
$d=0;
	foreach($scheduleDataSet as $data){
		?>
		<tr class="active">
		<?php
		
		for($i=0;$i<sizeof($data);$i++){
			if($i==1 || $i==2 || $i==sizeof($data)-1){}
			else{
		 if($i>=3 && $i<=sizeof($data)-2){
			 ?>
			<td class="active"><?=($sid==$data[$i])?$obj->getSubjectName($data[$i]):""?></td>
			<?php
		 }else{
		?>		
			<td class="active"><?=$data[$i]?></td>
		<?php
			 }
		}
		}
		?>
		</tr>
		<?php
	}	
?>
		</table>
		<br>
		<div class="selectDate">
		<form action="tutor_student_classes.php" method="post">
		<input type="hidden" name="selectedTutor" id="selectedTutor" value="<?=$id?>"><br>
		<input type="hidden" name="selectedSubject" id="selectedSubject" value="<?=$sid?>"><br>
		<span>Select Date :</span><input type="date" name="selectedDate" id="selectedDate">
		<br><br>
		<span>Select Time :</span><select name="selectedTime" id="selectedTime">
			<option value="8:00AM">8:00AM</option>
			<option value="9:00AM">9:00AM</option>
			<option value="10:00AM">10:00AM</option>
			<option value="11:00AM">11:00AM</option>
			<option value="12:00PM">12:00PM</option>
			<option value="1:00PM">1:00PM</option>
			<option value="2:00PM">2:00PM</option>
			<option value="3:00PM">3:00PM</option>
			<option value="4:00PM">4:00PM</option>
			<option value="5:00PM">5:00PM</option>
		</select>
		<br><br><button type="submit" name="action" value="request_submit">Request submit</button>
		</form>
		</div>
	<?php
}else{
	echo 'Tutor Not Scheduled for that Subject..!';
}	
}else{
	echo 'Not Scheduled yet...!';
}
}else if($type=='day_schedule_update'){
	
  $user=$_SESSION['tutor_id'];
  $weekDay=$_REQUEST['weekday'];
	$subjectData=array();
	for($i=3;$i<13;$i++){
		array_push($subjectData,$_REQUEST['subject'.$i.$weekDay]);
	}
	
	/* print_r($subjectData); */
 $obj=new MainClass();
$status=$obj->updateDaySchedule($user,$weekDay,$subjectData);
if($status){
	header("Location: view_tutor_schedule.php?res=success");
}else{
	header("Location: view_tutor_schedule.php?res=success");
} 
}
?>
