<?php
/* echo (date("l")).'-'.(date('d')).'<br>';
 echo $date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 5, date('Y'))).'<br>';
$parts = explode('-', $date);
echo $datePlusFive = date(
    'Y-m-d', 
    mktime(0, 0, 0, $parts[1], $parts[2] + 5, $parts[0])
    //              ^ Month    ^ Day + 5      ^ Year
); */
 ?>
 <br>
 <br>
 <?php
 //decrease date
 /* for($i=0;$i<6;$i++){
	 echo date('Y-m-d', strtotime(date('Y-m-d').' -'.$i.' day')).'<br>';
 }
 echo '<br>';
 echo '<br>';
 //increase date
 for($i=0;$i<6;$i++){
	 echo date('Y-m-d', strtotime(date('Y-m-d').' +'.$i.' day')).'<br>';
 } */
/*  $weekdays=array('Monday','tuesday','Wednesday','Thursday','Friday','Saturday');
 $inc=0;
 $dec=0;
 for($i=0;$i<sizeof($weekdays);$i++){
	 if(date("l")==$weekdays[$i]){
		 $inc++;
		 //echo (date("Y").'-'.date("m").'-'.(date("d")+1)).' : '.$weekdays[$i];
	 }else{
		 $dec++;
	 }
  }
 echo '<br>';
  for($i=0;$i<sizeof($weekdays);$i++){
	 if(date("l")==$weekdays[$i]){
		for($j=0;$j<$inc;$j++){
			echo (date("Y").'-'.date("m").'-'.(date("d")+$j)).' : '.$weekdays[$i];
			echo '<br>';
		} 
		
		echo '<br>';
		echo '<br>';
	 }else{
		 for($j=$dec;$j>0;$j--){
			echo (date("Y").'-'.date("m").'-'.(date("d")-$j)).' : '.$weekdays[$i];
			echo '<br>';
		} 
	 }
  } */
 ?>
 <br>
 <br>
 <?php
 echo $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
echo $prev_date = date('Y-m-d', strtotime($date .' -1 day'));
echo $next_date = date('Y-m-d', strtotime($date .' +1 day'));
?>

<a href="get_classes.php?date=<?=$prev_date;?>">Previous</a>
<a href="get_classes.php?date=<?=$next_date;?>">Next</a>