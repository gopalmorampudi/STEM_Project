<?php
session_start();
include "DBConnection.php";
$id=$_REQUEST['id'];
$query="update tutor_student_classes set status='completed' where id=$id";
$result=mysql_query($query);
if($result){
	 $_SESSION['flag']='success';
	 header("Location: tutor_classes_details.php?usertype=tutor&classtype=completed");
}else{
	$_SESSION['flag']='failed';
	 header("Location: tutor_classes_details.php?usertype=tutor&classtype=current");
}
?>