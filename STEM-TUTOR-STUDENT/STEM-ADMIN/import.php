<?php
session_start();
include 'dbconnection.php';
if (isset($_POST["Import"])) {
$filename = $_FILES["file"]["tmp_name"];
$name = $_FILES["file"]["name"];
$ext = end((explode(".", $name))); # extra () to prevent notice
if($ext!='csv'){
$_SESSION['res']="unknown";
header("Location:uploadExcelData.php");
echo $ext;
}else{
if ($_FILES["file"]["size"] > 0) {
$file = fopen($filename, "r");
$i=0;
while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
if($i!=0){
//It wiil insert a row to our subject table from our csv file`
$sql = "INSERT INTO `excel_date`(`Year`, `Term`, `Department`, `Number`, `Section`, `Name`, `InstructorID`) 
values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
$result = mysql_query($sql);
}
$i=1;
}
if(!$result) {
$_SESSION['res1']='fail';
header("Location:uploadExcelData.php");
}else{
$_SESSION['res']="sucess";
header("Location:excelData.php");	
}

fclose($file);
}
}
}
?>		 