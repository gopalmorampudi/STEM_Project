<?php
include "DBConnection.php";
 $weekDayArray = array("Sunday"=>"0","Monday"=>"1", "Tuesday"=>"2", "Wednesday"=>"3","Thursday"=>"4","Friday"=>"5","Saturday"=>"6");
 
 $date=date('Y-m-d l');
 $weekDay=date('l');
 $weekDayCount=$weekDayArray[$weekDay];

 ?>
 <form action="saveSchedule.php" method="post">
 <table class="table table-bordered">
 <?php
 $diffDay=0;
 for($i=$weekDayCount;$i>=1;$i--){
	 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') - $i , date('Y')));
$array1=array();
 $c=count($array1);
		 if(!strpos($date1,'Saturday')){
			?>
			<tr>
			<td>
			<span><?=$date1?></span>
			<td><table>
		<tr><td style="background-color:#999;">From</td></tr><tr><td style="background-color:#999;">To</td></tr>
		</table></td>
			</td>
	<?php	
				for($k=0;$k<4-$c;$c++){
					?>
					<td style="background:#999">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<?php
				}
					?>
			</tr>
			<?php
	}
}

$count=count($weekDayArray);
$count2=$count-$weekDayCount;
$iCount=0;
for($i=0;$i<$count2;$i++){
 $date1=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
 $curr_date=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	
 $day=date('l', mktime(0, 0, 0, date('m'), date('d') + $i , date('Y')));	 
$array1=array();
 $c=count($array1);
			 ?>
			<tr>
			<td>
			<span><?=$date1?></span>
			<input type="hidden" name="date<?=$i?>" value="<?=$curr_date?>"/> 
			<input type="hidden" name="day<?=$i?>" value="<?=$day?>"/> 
			<td><table>
		<tr><td style="background-color:lightgreen;">From</td></tr><tr><td style="background-color:lightgreen;">To</td></tr>
		</table></td>
			</td>		
		<?php
				for($k=0;$k<4-$c;$c++){
		?>
		
<td style="background:lightgreen">
<input type="text"  placeholder="hh" size="1" maxlength="2" name="<?='fhour'.$i.$c?>" />&nbsp;<span>:</span>
<input type="text" id="<?='fminutes'.$i?>" name="<?='fminutes'.$i.$c?>" placeholder="mm" size="2" maxlength="2" />
<select id="<?='fperiod'.$i?>" name="<?='fperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
<br>

<input type="text"  placeholder="hh" size="1" maxlength="2" name="<?='thour'.$i.$c?>"/>&nbsp;<span>:</span>
<input type="text" id="<?='tminutes'.$i?>" name="<?='tminutes'.$i.$c?>" placeholder="mm" size="2" maxlength="2" />
<select id="<?='tperiod'.$i?>" name="<?='tperiod'.$i.$c?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
					</td>
					<?php
				}
					?>				
			</tr>
			<?php
$iCount++;
$diffDay++;
 }
?>
<input type="hidden" name="icount" value="<?=$iCount?>"/> 
<tr>
<th colspan="6"><br><button onclick="fill the form" id="<?='but'?>" style="width:100px;height:30px;background-color:lightgreen;border:none;border-radius:5px;box-shadow:black 2px 2px 2px;">Set</button></th>
</tr>
</table>
<a href="make_next_schedule.php?date=<?=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') +$diffDay , date('Y')));?>" style="float:right;" class="btn btn-primary">next></a>