<?php

require_once('dbcon/dbconn.php');
include('../JControllers/checksessions.php');
date_default_timezone_set('Asia/Malaysia');
$date = date('Y-m-d H:i:s');
$relationship = "friend";
$friendID = mysql_real_escape_string($_POST['pid']); // friend1 the one that send the request
$status = 1;
$Acceptrequestquery="UPDATE friends SET status = '$status' , request_accepted_time = '$date'   WHERE friend1 = '$friendID' AND friend2 = '$surname'  ";
mysql_query($Acceptrequestquery,$connectionstring);	

?>