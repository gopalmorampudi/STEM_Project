<?php
include 'dbconnection.php';
$subject_id=$_REQUEST['subject_id'];

$subject_name=$_REQUEST['subject_name'];
	$sql="update subject set subject_name='$subject_name' where subject_id=$subject_id";
	$res=mysql_query($sql);
	if($res){
		echo "ss";
		//header('Location: action?new_subject');
	}else{
		echo "ff";
		//header('Location: view_subject.php?mesg=fail');
	}
?>