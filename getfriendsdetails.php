<?php

include ('dbcon/dbconn.php');





$getfrindcom = "select * from  profile WHERE firstname = '$profilename' limit 1";

$resquery2 = mysql_query($getfrindcom,$connectionstring);





 

                          if($row2= mysql_fetch_array($resquery2)){ 


						  
						   $emailaddress2 = $row2['primaryemail'];
						   
						   $profileimage2 = $row2['photo'];

						   $year_of_birth2 =$row2['year_of_birth'];

						   $month_of_birth2 = $row2['month_of_birth'];

						   $day_of_birth2 = $row2['day_of_birth'];

						   $hometown_state2 = $row2['hometown_state'];

						   $hometown_country2 = $row2['hometown_country'];

						   $institution_name2 = $row2['institution_name'];

						   $program_year2 = $row2['program_year'];

						   $about_use2r = $row2['about_user'];

						   $mobile2 = $row2['mobile'];

						   $gender2 = $row2['gender'];

						 

						 

		

						   }



?>