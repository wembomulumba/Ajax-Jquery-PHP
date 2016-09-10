<?php

include ('dbcon/dbconn.php');



$arr = array();



$rand = rand(1,2);

 

$rs = mysql_query("SELECT * FROM profile   limit 6");

 

while($obj = mysql_fetch_object($rs)) {

$arr[] = $obj;

}

echo '{"members":'.json_encode($arr).'}';						 

						 

		

						   



?>