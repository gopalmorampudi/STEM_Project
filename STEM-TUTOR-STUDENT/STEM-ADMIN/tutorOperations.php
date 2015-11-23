<?php
include 'dbconnection.php';
require_once('lib/swift_required.php');
$action=$_REQUEST['action'];
if($action=="Accept"){
$tutor_id=$_REQUEST['tutor_id'];
$tutor_name=$_REQUEST['tutor_name'];
echo $emailid=$_REQUEST['emailid'];
$password=$_REQUEST['password'];
$qry="UPDATE `tutor` SET `status`='Accept' WHERE tutor_id=$tutor_id";
$res=mysql_query($qry);
if($res){
$br=<<<BR
  hello $tutor_name\r\n
  Your Request as been Accepted...,\r\n 
  Login into Your Username And Password Detailes below..\r\n 
  UserName:  $emailid\r\n 
  Password: $password\r\n 
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
$message->setTo(array($emailid));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);
header("Location:request_tutor.php?sucess");
}else{
header("Location:request_tutor.php?fail");
}
}
if($action=="Reject"){
$tutor_id=$_REQUEST['tutor_id'];
$tutor_name=$_REQUEST['tutor_name'];
$emailid=$_REQUEST['emailid'];
$sql="DELETE FROM `tutor` WHERE tutor_id=$tutor_id";
$delres=mysql_query($sql);
if($delres){
$br=<<<BR
  hello $tutor_name\r\n
  Your Request as been Rejected...,\r\n 
  Please Register Again..\r\n 
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
$message->setTo(array($emailid));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);	
header("Location:request_tutor.php?sucess");
}else{
header("Location:request_tutor.php?fail");
}
}
?>