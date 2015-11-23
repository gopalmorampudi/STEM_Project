<?php
  if(isset($_REQUEST['date']))
	$date=$_REQUEST['date'];
 /* else 
	$date='2015-10-2'; */
$curr_date=date("Y-m-d");
$dateArray=explode("-",$date);
$curr_dateArray=explode("-",$curr_date);
$diffDay=$dateArray[2]-$curr_dateArray[2];
$diffMonth=$dateArray[1]-$curr_dateArray[1];
$diffYear=$dateArray[0]-$curr_dateArray[0];
 echo $diffDay.'<br>';
echo $diffMonth.'<br>';
echo $diffYear.'<br>';

if($curr_dateArray[0]==$dateArray[0] && $curr_dateArray[1]==$dateArray[1]){
 for($i=0;$i<7;$i++){
	echo $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));
	echo "<br>";
	$diffDay++;
} 
?>
<a href="test1.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));?>">next></a>
<?php
}else if($curr_dateArray[0]==$dateArray[0] && $curr_dateArray[1]<$dateArray[1]){
	for($i=0;$i<7;$i++){
	echo $date1=date('Y-m-d l', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')));
	echo "<br>";
	$diffDay++;
}
?>
<a href="test1.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')));?>">next></a>
<?php
}else if($curr_dateArray[0]<$dateArray[0]){
	for($i=0;$i<7;$i++){
	echo $date1=date('Y-m-d l', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')+$diffYear));
	echo "<br>";
	$diffDay++;
}
?>
<a href="test1.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')+$diffYear));?>">next></a>
<?php
}
?>
