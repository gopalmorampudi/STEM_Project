<html>
<head>
Reply Form
</head></center><br>
<body>
<center>
<form method="post" action="insert_data.php">
<table>
<tr> 
<td>Reply:</td>
<td><input type="text" name="reply"></td>
</tr>

<tr> 
<td>Replied By:</td>
<td><input type="text" name="replied_by">
<input type="hidden" name="complaint_id" value="<?=$_REQUEST['complaint_id']?>">
<input type="hidden" name="emailid" value="<?=$_REQUEST['emailid']?>">
<input type="hidden" name="subject_name" value="<?=$_REQUEST['subject_name']?>">
<input type="hidden" name="tutor_name" value="<?=$_REQUEST['tutor_name']?>">
<input type="hidden" name="description" value="<?=$_REQUEST['description']?>">
</td>
</tr>

<tr> 
<td colspan="2" align="center"><button type="submit" name="action" value="reply">submit</button></td>
</center>
</body>
</html>