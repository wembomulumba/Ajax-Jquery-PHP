<?php
include ('dbcon/dbconn.php');

$arr = array();
$rs = mysql_query("SELECT * FROM chat WHERE (chat.from  = 'joechim' AND chat.to = 'Jasmine') OR (chat.from  = 'Jasmine' AND chat.to = 'joechim') OR  (chat.from  = 'Jasmine' ) OR (chat.to = 'Jasmine') OR (chat.from  = 'joechim' ) OR (chat.to = 'joechim')   order by  id ASC ");
 
while($obj = mysql_fetch_object($rs)) {
$arr[] = $obj;
}
echo '{"messages":'.json_encode($arr).'}';		


				 					 
								  
?>