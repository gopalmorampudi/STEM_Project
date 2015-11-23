<?php
require("configure.php");
$subject_id = ($_REQUEST["subject_id"] <> "") ? trim($_REQUEST["subject_id"]) : "";
if ($subject_id <> "") {
// $sql = "SELECT * FROM tbl_state WHERE country_id = :cid ORDER BY state_name";
 //echo $subject_id ;
$sql ="SELECT t.tutor_id,t.tutor_name FROM tutor t where t.status<>'pending' and t.subject like '%$subject_id%'";

try {
$stmt = $DB->prepare($sql);
// $stmt->bindValue(":cid", trim($country_id));
$stmt->execute();
$results = $stmt->fetchAll();
} catch (Exception $ex) {
    echo($ex->getMessage());
}
if (count($results) > 0) {
?>
<!--<form action="insert_data.php" method="GET">-->
<!--<label>Tutor: 
<select name="tutor_id" onchange="showSchedule(this);">
<option value="">Please Select</option>-->
<?php //foreach ($results as $rs) { ?>
<!--<option value="<?php //echo $rs["tutor_id"];?>"><?php //echo $rs["tutor_name"]; ?></option>-->
<?php// } ?>
<!--</select>
</label>

<button type="submit" name="action" value="tutor_schedule1">submit</button>
</form>-->
<?php foreach ($results as $rs) { ?>
<h1>
<a href="#<?=$rs["tutor_id"];?>" onclick="f(this);" id="<?=$rs["tutor_id"];?>"><?=$rs["tutor_name"]; ?></a></h1><br>

<?php
}
}
}
?>