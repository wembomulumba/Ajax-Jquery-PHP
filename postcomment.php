<?php

require_once('dbcon/dbconn.php');



$commentedby = $_REQUEST['commentedby'];

$comment = addslashes($_REQUEST['comment']);



$post_id =  $_REQUEST['postid'];;



$createpost = "INSERT INTO postcomments (p_id, comment, commentedby)  VALUES ('$post_id','$comment','$commentedby')";

mysql_query($createpost,$connectionstring);								   		

?>