<?php
session_start();
include "DBConnection.php";
$iCount=$_REQUEST['icount'];
$BigArray=array();
$counter=0;
for($i=0;$i<$iCount;$i++){

	for($k=0;$k<4;$k++){
	$fhour=$_REQUEST['fhour'.$i.$k];
	$fminutes=$_REQUEST['fminutes'.$i.$k];
	$fperiod=$_REQUEST['fperiod'.$i.$k];
	$thour=$_REQUEST['thour'.$i.$k];
	$tminutes=$_REQUEST['tminutes'.$i.$k];
	$tperiod=$_REQUEST['tperiod'.$i.$k];
	$date=$_REQUEST['date'.$i];
	$day=$_REQUEST['day'.$i];
	
	 $query="insert into schedule(date_col,week_day,fhour,fminutes,fperiod,thour,tminutes,tperiod) values('$date','$day',$fhour,$fminutes,'$fperiod',$thour,$tminutes,'$tperiod')";
	$results=mysql_query($query);	
		if($results){
			$counter++;
		}
	}
	
}
if($counter!=0){
		$_SESSION['flag']='success';
		header('Location: make_schedule.php');
	}else{
		$_SESSION['flag']='failed';
		header('Location: make_schedule.php');
	}
?>