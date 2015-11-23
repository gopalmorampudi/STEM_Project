<?php
session_start();
include "DBConnection.php";

  $selectedSubject=$_REQUEST['selectedSubject'];
  $selectedDate=$_REQUEST['selectedDate'];
  $hours=$_REQUEST['hours'];
  $minutes=$_REQUEST['minutes'];
  $time= $hours.':'.$minutes.' '.$_REQUEST['period'];
  $student_id=$_SESSION['student_id'];
  $description=$_REQUEST['description'];

  $query="INSERT INTO stu_req_inconvenient_time(student_id,subject_id,date_selected,time,description) values($student_id,$selectedSubject,'$selectedDate','$time','$description')";

$result=mysql_query($query);
 if($result){
	$_SESSION['flag']='success';
	header('Location: view_subject.php?success');
}else{
	$_SESSION['flag']='failed';
	header('Location: view_subject.php?failed');
} 

?>