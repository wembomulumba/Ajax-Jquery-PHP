<?php
include ('dbcon/dbconn.php');

$arr = array();
$rs = mysql_query("SELECT * FROM posts ORDER BY p_id DESC");
 
while($obj = mysql_fetch_object($rs)) {
$arr[] = $obj;
}
echo '{"posts":'.json_encode($arr).'}';		


				 					 
								  
?>


