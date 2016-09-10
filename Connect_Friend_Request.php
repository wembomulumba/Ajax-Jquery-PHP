<?php



	require_once('dbcon/dbconn.php');

    include('../JControllers/checksessions.php');
	

	date_default_timezone_set('Asia/Malaysia');

    $date = date('Y-m-d H:i:s');

	$relationship = "friend";

    $friendID = mysql_real_escape_string($_POST['pid']);

    $status = 0;

	
    $sendrequestquery="INSERT INTO friends (friend1, friend2, status, relationship,request_sent_time,key3) VALUES     ('$surname','$friendID','$status','$relationship','$date','$surname$friendID')";
    mysql_query($sendrequestquery,$connectionstring);	
	
	echo "success";
	
	




?>