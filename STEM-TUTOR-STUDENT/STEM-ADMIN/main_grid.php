<?php
session_start();
include "DBConnection.php";
// echo $date1 = date('l', mktime(0, 0, 0, date('m'), date('d') +0, date('Y'))).'<br>';
//$weekDaysArray=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

?>
<form action="tut_sched_grid.php" method="post">
<table align="center" class="table" border style="border-collapse:collapse;">
<?php
for($i=0;$i<7;$i++){
 $date=date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $i, date('Y')));
 $test=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d') + $i, date('Y')));
  $weekDayName=date('l', mktime(0, 0, 0, date('m'), date('d') + $i, date('Y')));
 //ltrim($weekDayName," ");
// if(!strpos($test,'Sunday')){
	 //if(!strpos($test,'Saturday')){
	// echo (!strpos($weekDayName,'Sunday'));
?>

<tr>
<th>
<?=$date?><br><?=$weekDayName?>
<input type="hidden" name='date' value="<?=$date?>"/>
<input type="hidden" name='weekday' value="<?=$weekDayName?>"/>
<input type="hidden" name='icount' value="<?=$i?>"/>
</th>
<?php
for($j=0;$j<4;$j++){
?>
<td>
<!--<span>Set From Time </span><br/>
<div id="<?='d1'.$i.$j?>">
<select id="<?='fhour'.$i.$j?>" name="<?='fhour'.$i.$j?>">
<option value="">HH</option>
<?php
for($time=1;$time<=24;$time++){
?>
<option value="<?=$time?>"><?=$time?></option>
<?php
}
?>
</select>-->
<input type="text"  placeholder="hh" size="1" maxlength="2" />&nbsp;<span>:</span>
<input type="text" id="<?='fminutes'.$i.$j?>" name="<?='fminutes'.$i.$j?>" placeholder="mm" size="2" maxlength="2" />
<select id="<?='thour'.$i.$j?>" name="<?='thour'.$i.$j?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
<br>
<span>Set To Time</span>
<br>
<!--<select id="<?='thour'.$i.$j?>" name="<?='thour'.$i.$j?>">
<option value="">HH</option>
<?php
for($time=1;$time<=24;$time++){
?>
<option value="<?=$time?>"><?=$time?></option>
<?php
}
?>
</select>-->
<input type="text"  placeholder="hh" size="1" maxlength="2" />&nbsp;<span>:</span>
<input type="text" id="<?='tminutes'.$i.$j?>" name="<?='tminutes'.$i.$j?>" placeholder="mm" size="2" maxlength="2" />
<select id="<?='tperiod'.$i.$j?>" name="<?='tperiod'.$i.$j?>">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
<br/><br/>
<select name="<?='options'.$j?>" id="<?='options'.$j?>">
<option value="">Select option</option>
<option value="Preferred">Preferred</option>
<option value="Unavailable">Unavailable</option>
</select>&nbsp;&nbsp;&nbsp;
</div>
<div id="<?='d2'.$i.$j?>">

</div>
</td>

<?php
}
?>
<td>
<!--<button onclick="fill the form" id="<?='but'.$i?>">Set</button>-->
</td>
</tr>

<?php
//}
//}
}
?>
<tr><td rowspan="5"><button onclick="fill the form" id="<?='but'?>">Set</button></td><</tr>
</table>
</form>