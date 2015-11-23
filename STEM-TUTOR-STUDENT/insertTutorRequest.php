<?php
session_start();
include "dbconnection.php"; 
$date= $_POST['date'];
$from_time= $_POST['from_time'];
$from_mints= $_POST['from_mints'];
$fnoon= $_POST['fnoon'];
$to_time= $_POST['to_time'];
$to_mints= $_POST['to_mints'];
$tnoon= $_POST['tnoon'];
 $tutor_id=$_SESSION['tutor_id'];
 $ftime=$from_time.":".$from_mints." ".$fnoon;
 $ttime=$to_time.":".$to_mints." ".$tnoon;
$reason= $_POST['reason'];
$description= $_POST['description'];  
$query="INSERT INTO `tutor_request`(`tutorid`, `data`, `from_time`, `to_time`, `reason`, `description`)
 VALUES ('$tutor_id','$date','$ftime','$ttime','$reason','$description')";
 $res=mysql_query($query);
 
 
if($res && $res1){
	// echo "secess";
	$_SESSION['flag']='reqsuccess';
	header('Location: test.php');
}else{
	// echo "fail";
	$_SESSION['flag']='reqfailed';
	header('Location: test.php');
}
 ?>