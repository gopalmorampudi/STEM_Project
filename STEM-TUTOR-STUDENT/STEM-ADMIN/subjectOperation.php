<?php
session_start();
include 'dbconnection.php';
require_once('lib/swift_required.php');
//common action for all inserting
$action=$_REQUEST['action'];
//Update subjects
if($action=='update_subject'){
$subject_id=$_REQUEST['subject_id'];
$subject_name=$_REQUEST['subject_name'];
$dept_id=$_REQUEST['dept_id'];
echo $sql="UPDATE `subject` SET `subject_name`='$subject_name',`dept_id`='$dept_id' WHERE subject_id=$subject_id";
$res=mysql_query($sql);
if($res){
header('Location: view_subject.php?mesg=success');
}else{
header('Location: view_subject.php?mesg=fail');
}
}
//Delete subjects
if($action=='Subdelete'){
$subject_id=$_REQUEST['subject_id'];
$sql="delete from subject where subject_id='$subject_id'";
$res=mysql_query($sql);
if($res){
header('Location: view_subject.php?mesg=success');
}else{
header('Location: view_subject.php?mesg=fail');
}
}
?>