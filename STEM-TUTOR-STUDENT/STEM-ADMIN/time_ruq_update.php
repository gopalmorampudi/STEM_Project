<?php
include 'dbconnection.php';
require_once('lib/swift_required.php');
 $tqid=$_REQUEST['tqid'];
 $sub_name=$_REQUEST['sub_name'];
 $studentName=$_REQUEST['studentName'];
 $date_selected=$_REQUEST['date_selected'];
 $time=$_REQUEST['time'];
 $qry="UPDATE `stu_req_inconvenient_time` SET `status`='Request Sends to Tutor' WHERE id=$tqid";
 $res=mysql_query($qry);
if($res){
	$br=<<<BR
  hello\r\n
  You have an Appointment, More Detailes below..\r\n 
  Student Name: $studentName.\r\n
  Subject Name: $sub_name.\r\n
  Date: $date_selected.\r\n
  Time: $time.\r\n
BR;
$new=$br;
// Create the message
$message=Swift_Message::newInstance() ;
//var_dump($message);
$message->setSubject('Acknowledgement');
// Set the From address 
$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));
// Set the To addresses
$sql="select * from tutor";
$res=mysql_query($sql);
$tutorarray=array();
while($tutorres=mysql_fetch_assoc($res)) {
$tutorarray[] = $tutorres;
}
if(!empty($tutorarray)){
foreach ($tutorarray as $tutor) {
$message->setTo($tutor["emailid"], $tutor["tutor_name"]);
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);
}
}
header("Location:std_Notifications.php");
}else{
header("Location:std_Notifications.php?fail");
} 
?>