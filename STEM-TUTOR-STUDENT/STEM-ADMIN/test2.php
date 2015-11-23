<?php
  if(isset($_REQUEST['date']))
	echo $date=$_REQUEST['date'];
 else 
	echo $date='2015-11-16';
echo '<br>';
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
	echo '1<BR>';
for($i=0;$i<7;$i++){
	echo $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') -$diffDay , date('Y')));
	echo "<br>";
	$diffDay--;
}
?>
<a href="test2.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') -$diffDay , date('Y')));?>">previous</a>
<?php
}else if($curr_dateArray[0]==$dateArray[0] && $curr_dateArray[1]>$dateArray[1]){
	echo '2<br>';
	for($i=0;$i<7;$i++){
	echo $date1=date('Y-m-d l', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')));
	echo "<br>";
	$diffDay--;
}
?>
<a href="test2.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m')+$diffMonth, date('d') +$diffDay , date('Y')));?>">previous</a>
<?php
}else if($curr_dateArray[0]>$dateArray[0]){
	echo '3';
	for($i=0;$i<7;$i++){
	echo $date1=date('Y-m-d l', mktime(0, 0, 0, date('m')-$diffMonth, date('d') -$diffDay , date('Y')-$diffYear));
	echo "<br>";
	$diffDay++;
}
?>
<a href="test2.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m')-$diffMonth, date('d') -$diffDay , date('Y')-$diffYear));?>">previous</a>
<?php
}
?>
