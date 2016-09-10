<?php



require_once('dbcon/dbconn.php');





$firstname = $_REQUEST['firstname'];

$primaryemail = mysql_real_escape_string((string)$_REQUEST['primaryemail']);

$password = $_REQUEST['password'];





$checkifexist = "SELECT * FROM profile WHERE primaryemail = '$primaryemail'";

$query_ch_email = mysql_query($checkifexist,$connectionstring);	







   if (mysql_num_rows($query_ch_email) > 0){

 
    $notices = 'exist'; 

	

	echo $notices;

    }

	

	else{

		echo "not exist";

	

	}
	
   		

?>