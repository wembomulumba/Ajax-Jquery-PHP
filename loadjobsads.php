<?php
include ('dbcon/dbconn.php');
$rand= rand(1,5);

$rand2= rand(5,6);

$jobsql1= "select * from   jobsads limit $rand, $rand2";
$loadalljobsquery = mysql_query($jobsql1,$connectionstring);
$jobsql2= "select * from   jobsads WHERE reference = '$id' limit 1";
$loadalljobsquery2 = mysql_query($jobsql2,$connectionstring);



?>