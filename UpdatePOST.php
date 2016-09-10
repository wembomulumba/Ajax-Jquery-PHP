<?php
require_once('dbcon/dbconn.php');


$description =   addslashes($_REQUEST['description']);
$posted_by = $_REQUEST['posted_by'];
$userid = $_REQUEST['userid'];
$photo = $_REQUEST['photo'];

$createpost = "INSERT INTO posts (description, userid, posted_by, photo)  VALUES ('$description','$userid','$posted_by','$photo')";
mysql_query($createpost,$connectionstring);								   		
?>