<?php
session_start();
include "DBConnection.php";
$id=$_REQUEST['id'];
$date=$_REQUEST['date'];
$time=$_REQUEST['time'];
$student=$_REQUEST['student'];
$tutor=$_REQUEST['tutor'];
$subject=$_REQUEST['subject'];
 $query="select t.tutor_name from tutor t where t.tutor_id=$tutor";
$result=mysql_query($query);
$tutorName='';
if($res=mysql_fetch_row($result)){
$tutorName.=$res[0];
}

$query="select s.subject_name from subject s where s.subject_id=$subject";
$result=mysql_query($query);
$subName='';
if($res=mysql_fetch_row($result)){
$subName.=$res[0];
}
?>
<html>
<head>

</head>
<body>
<fieldset>
<legend>Appointment-form</legend>
<form action="send-appointment-req.php" method="post" target="_parent" onsubmit="return closeSelf(this);">
<table align="center">
<!--<tr>
<td>Tutor Id : </td><td><input type="text" name="tid" value="<?=$tutor?>"/></td>
</tr>-->
<tr>
<td>Tutor Name : </td><td>
<input type="hidden" name="id" value="<?=$id?>"/>
<input type="hidden" name="tid" value="<?=$tutor?>"/>
<input type="text" name="tName" value="<?=$tutorName?>"/></td>
</tr>
<tr>
<td>Course Id : </td><td><input type="text" name="sid" value="<?=$subject?>"/></td>
</tr>
<tr>
<td>Course Name : </td><td><input type="text" name="sName" value="<?=$subName?>"/></td>
</tr>
<tr>
<td>Date : </td><td><input type="date" name="dateSelected" value="<?=$date?>"/></td>
</tr>
<tr>
<td>Time : </td><td><input type="text" name="time" value="<?=$time?>"/></td>
</tr>
<tr>
<td>Purpose of appointment : </td><td><textarea name="purpose" rows="5" cols="20"></textarea></td>
</tr>
<tr>
<td><button>Fix-appointment</button></td>
</tr>
</table>
</form>
</fieldset>

</body>
</html>