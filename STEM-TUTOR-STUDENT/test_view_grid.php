<?php
// session_start();
include "DBConnection.php";
 $weekDayArray = array("Sunday"=>"0","Monday"=>"1", "Tuesday"=>"2", "Wednesday"=>"3","Thursday"=>"4","Friday"=>"5","Saturday"=>"6");
$user=$_SESSION['tutor_id'];
$date;
$weekDay;
$weekDayCount;
 $dateCounter=0;
$gArray;
 $cArray;
 if(isset($_REQUEST['date'])){
	 $getdate=$_REQUEST['date'];
 $gArray=explode('-',$getdate);
 $currdate=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 $cArray=explode('-',$currdate);
 if($gArray[2]>$cArray[2]){ $cc=$gArray[2]-$cArray[2];
  $date=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') +$cc, date('Y')));
  $weekDay=date('l', mktime(0, 0, 0, date('m'), date('d') +$cc, date('Y')));
  $weekDayCount=$weekDayArray[$weekDay];
 }
 else if($gArray[2]<$cArray[2]){ $cc=$cArray[2]-$gArray[2];
 $date=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') -$cc, date('Y')));
 $weekDay=date('l', mktime(0, 0, 0, date('m'), date('d')-$cc, date('Y')));
 $weekDayCount=$weekDayArray[$weekDay];
 }
 else {
	 $cc=0;
	 $date=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') , date('Y')));
 $weekDay=date('l', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 $weekDayCount=$weekDayArray[$weekDay];
 }
 //echo $date;
 //echo $weekDay;
 //echo $weekDayCount;
 $copyOf_cc=$cc;
  ?>
 <table border>
 <?php
  if($gArray[2]<$cArray[2]){
 for($i=$weekDayCount;$i>=1;$i--){
	 echo $copyOf_cc;
	 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') -$copyOf_cc, date('Y')));
	 ?>
	 <tr>
	 <td>
	 <?php
	 echo $date1;
	 $copyOf_cc--;
	 ?>
	 </td>
	 </tr>
	 <?php
 }
  }

	
 /* for($j=){
	 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') +$copyOf_cc, date('Y')));
 } */

 
 
 
 
 
 
 
 ?>
</table>
<?php
 
 //echo $weekDayCount=date('N', strtotime($date));
	 
 }else{
 $date=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 $weekDay=date('l', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 $weekDayCount=$weekDayArray[$weekDay];

 ?>
 <table border>
 <?php
 for($i=$weekDayCount;$i>=1;$i--){
	 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
$array1=array();
//$array2=array();
$date2=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
$sql="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$date2' order by tr.fhours;";
$result=  mysql_query($sql);
while($res=mysql_fetch_row($result)){
	$record=array();	
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($record,$res[6]);
	array_push($record,$res[7]);
	array_push($record,$res[8]);
	array_push($record,$res[9]);
	array_push($record,$res[10]);
	array_push($record,$res[11]);
	
	array_push($array1,$record);
}

 $c=count($array1);
	 
	// if(!strpos($date1,'Sunday')){
		 if(!strpos($date1,'Saturday')){
			?>
			<tr>
			<td>
			<span><?=$date1?></span>
			</td>
			
			<?php
				//for($k=0;$k<$c;$c++){
					foreach($array1 as $a){
				?>
				<td style="background:#999">
				<table>
					<tr>
					<td><?=$a[5].":".$a[6]." ".$a[7]?></td><td>-</td>
					<td><?=$a[8].":".$a[9]." ".$a[10]?></td>
					</tr>
					<tr>
					<td colspan="3"><center><?="Status :- ".$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
				}
				for($k=0;$k<13-$c;$c++){
					?>
					<td style="background:#999">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<?php
				}
					?>
			</tr>
			<?php
		//}
	}
}
$count=count($weekDayArray);
$count2=$count-$weekDayCount;
for($i=0;$i<=$count2;$i++){

$date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	 
$array1=array();
$date2=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));
$sql="select * from tutor_schedule2 tr where tr.tutor_id=$user and tr.date_day='$date2' order by tr.fhours;";
$result=  mysql_query($sql);
while($res=mysql_fetch_row($result)){
	$record=array();	
	array_push($record,$res[0]);
	array_push($record,$res[1]);
	array_push($record,$res[2]);
	array_push($record,$res[3]);
	array_push($record,$res[4]);
	array_push($record,$res[5]);
	array_push($record,$res[6]);
	array_push($record,$res[7]);
	array_push($record,$res[8]);
	array_push($record,$res[9]);
	array_push($record,$res[10]);
	array_push($record,$res[11]);
	array_push($array1,$record);
}

 $c=count($array1);
	 if(!strpos($date1,'Sunday')){
		// if(!strpos($date1,'Saturday')){
			 ?>
			<tr>
			<td>
			<span><?=$date1?></span>
			</td>		
				<?php
					foreach($array1 as $a){
				?>
				<!--<td style="background:<?=($a[11]=='Preferred')?'green':'gray'?>">-->
				<?php
				if($a[11]=='ok'){
				?>
				<td style="background:green">
				<?php
				}else if($a[11]=='class'){
				?>
				<td style="background:blue">
				<?php
				}else{
					?>
					<td style="background:#999">
					<?php
				}
				?> 	
				<table>
					<tr>
					<td>
					
					<?php if($a[5]<=9) echo '0'.$a[5];
						else echo $a[5];
					echo ":";
					if($a[6]<=9) echo '0'.$a[6];
						else echo $a[6];
					echo $a[7];
				?></td><td>-</td>
					<td><?php
					if($a[8]<=9) echo '0'.$a[8];
						else echo $a[8];
					echo ":";
					if($a[9]<=9) echo '0'.$a[9];
						else echo $a[9];
					echo $a[10];
					?></td>
					</tr>
					<tr>
					<td colspan="3"><center><?="Status :- ".$a[11]?></center></td>
					</tr>
					</table>
			</td>
					<?php
				}
				for($k=0;$k<13-$c;$c++){
					?>
					<td style="background:black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<?php
				}
					?>				
			</tr>
			<?php
		// }
	 }
	 $dateCounter++;
 }
?>
</table>
<?php 
 }
?>
<a href="?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $dateCounter-1 , date('Y')))?>">next--></a>