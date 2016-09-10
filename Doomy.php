// JavaScript Document

<?php

include ('dbcon/dbconn.php');



$arr = array();
$p_id = $_REQUEST['p_id'];

$rs = mysql_query("SELECT * FROM postcomments WHERE p_id = 'p_id' ");

 

while($obj = mysql_fetch_object($rs)) {

$arr[] = $obj;

}

echo '{"comments":'.json_encode($arr).'}';		





				 					 

								  

?>
