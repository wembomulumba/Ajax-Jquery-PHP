<?php
include ('dbcon/dbconn.php');
 
 $currentview = $_GET['friend'];

$checklogin2 = "select * from  profile WHERE firstname = '$currentview' limit 1";
$resquery = mysql_query($checklogin2,$connectionstring);


 
                          if($row= mysql_fetch_array($resquery)){ 
						  
						  
						   $profileimage = $row['photo'];
						   $currentuser = $row['firstname'];
						   $year_of_birth =$row['year_of_birth'];
						   $month_of_birth = $row['month_of_birth'];
						   $day_of_birth = $row['day_of_birth'];
						   $hometown_state = $row['hometown_state'];
						   $hometown_country = $row['hometown_country'];
						   $institution_name = $row['institution_name'];
						   $program_year = $row['program_year'];
						   $about_user = $row['about_user'];
						   $mobile = $row['mobile'];
						   $gender = $row['gender'];
						 
						 
		
						   }

?>