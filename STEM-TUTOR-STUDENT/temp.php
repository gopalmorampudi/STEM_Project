<?php

 echo $date=date('Y-m-d l', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 echo $weekDay=date('l', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
 $weekDayCount=$weekDayArray[$weekDay];

 ?>