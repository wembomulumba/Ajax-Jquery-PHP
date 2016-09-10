<?php
require_once('dbcon/dbconn.php');
include('../JControllers/checksessions.php');
include('../JControllers/updateprofilecontroller.php');        
//date_default_timezone_set('Australia/Melbourne');
$date = date('m/d/Y h:i:s a', time());	


  $checkifexist = "UPDATE profile SET about_user = '$about_user', gender = '$gender' , hometown_country = '$country', hometown_state = '$homestate',   
  year_of_birth = '$year', month_of_birth = '$month', day_of_birth = '$day', institution_name = '$institut_name', mobile = '$telephone', 
  program_year = '$program_year' , language = '$language', hometow_city = '$hometowcity', recoveryemail = '$recoveryemail', work= '$work', 
  professiontitle = '$professiontitle', industry = '$industry', weburl = '$weburl' WHERE firstname  = '$firstname'";
  
mysql_query($checkifexist,$connectionstring);	

echo "<h2>You have successfully Updated your account !</h2> ";


?>

















