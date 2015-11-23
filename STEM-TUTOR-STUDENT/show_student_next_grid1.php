<?php
include "dbconnection.php";
$date=$_REQUEST['date'];
// $date='2015-11-22';
$curr_date=date("Y-m-d");
$dateArray=explode("-",$date);
$curr_dateArray=explode("-",$curr_date);
$diffDay=$dateArray[2]-$curr_dateArray[2];
$diffMonth=$dateArray[1]-$curr_dateArray[1];
$diffYear=$dateArray[0]-$curr_dateArray[0];

 $user=$_REQUEST['id'];
  $sid=$_REQUEST['sid'];
/*  $user=40;
 $sid=4; */
 $iCount=0;
?>
<table class="table table-bordered" border>
<?php
if($curr_dateArray[0]==$dateArray[0] && $curr_dateArray[1]==$dateArray[1]){
	$iCount=0;
	include('student_sched_next1.php');
?>
<tr>
<td><input type="hidden" id="nextDate" value="<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $diffDay , date('Y')));?>"/></td>
</tr>
<?php
}else if($curr_dateArray[0]==$dateArray[0] && $curr_dateArray[1]<$dateArray[1]){
	$iCount=0;
	include('student_sched_next2.php');
	?>
<tr>
<td><input type="hidden" id="nextDate" value="<?=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') + $diffDay , date('Y')));?>"/></td>
</tr>
<?php
}else if($curr_dateArray[0]<$dateArray[0]){
	$iCount=0;
	include('student_sched_next3.php');
	?>
<tr>
<td><input type="hidden" id="nextDate" value="<?=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') + $diffDay , date('Y') +$diffYear));?>"/></td>
</tr>
<?php
}
?>	
</table>
<a href='#' style="float:left;" onclick="getPreviousGrid();" class="btn">&lt;previous</a>
<a href='#' style="float:right;" onclick="getNextGrid();" class="btn">next&gt;</a><br><br>
	