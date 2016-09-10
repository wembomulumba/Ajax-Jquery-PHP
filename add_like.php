<?php
	
	include('dbcon/dbconn.php');
	$email = $_COOKIE['email'];

    $password = $_COOKIE['password'];

    $surname = $_COOKIE['surname'];
	
	
	
	
	
	
	$checklogin2 = "select * from  profile WHERE primaryemail = '$email' AND password = '$password' limit 1";

$resquery = mysql_query($checklogin2,$connectionstring);





 

                          if($row2= mysql_fetch_array($resquery)){ 


						   $profileimage = $row2['photo'];

						 
						   }


	
	$postid = $_REQUEST['post_id'];
	
	
	$checklogin = "select * from  facebook_posts WHERE p_id = '$postid'";

   $resquery = mysql_query($checklogin,$connectionstring);
   
   
   // count the likes
   $checklogin2 = "select * from  likes WHERE p_id = '$postid'";

   $result = mysql_query($checklogin2);

   $num_rows = mysql_num_rows($result);
   
   
   /// to count the likes end here
   
   if($row= mysql_fetch_array($resquery)){ 
	
							$postowner = $row["f_name"];
							
    }
	
	
	
	
	
	$checkifexist = "INSERT INTO likes (p_id, userid, ownerid )  VALUES ('$postid','$surname','$postowner')";
    mysql_query($checkifexist,$connectionstring);	

	
	echo $num_rows;
	
	?>
	
	      
				
		
	
	
	
	
	
	

		
		
		
		