<?php



require_once('dbcon/dbconn.php');




           

			

		     $firstname = mysql_real_escape_string($_REQUEST['firstname']);

			

			$password  =    md5($_REQUEST['password']);


			

$createnewpassword = "UPDATE profile SET password = '$password' WHERE firstname  = '$firstname' ";

mysql_query($createnewpassword,$connectionstring);	

echo "<h2>You have successfully Updated your Password!</h2> ";



	

    		

?>