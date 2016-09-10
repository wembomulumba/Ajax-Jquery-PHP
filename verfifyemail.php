


<style>
.set{width:750px;
height:400px;
border:none;
position:absolute;
top:15px;
left:200px;
background:#202020;
}

.st{width:550px;
height:290px;
border:1px outset #FFF;
position:absolute;
top:30px;
left:100px;
background:#FFF;
}
</style>

<?php



require_once('dbcon/dbconn.php');

$primaryemail = mysql_real_escape_string((string)$_REQUEST['primaryemail']);

$checkifexist = "SELECT * FROM profile WHERE primaryemail = '$primaryemail'";

$query_ch_email = mysql_query($checkifexist,$connectionstring);	







   if (mysql_num_rows($query_ch_email) > 0){

  

   

    $notices = 'exist'; 
	
	

	

	   echo $notices;
	
	
	
	
	     $email = "notice@personhub.com";
		 
			
			
			$subject = 'personhub.com Password Recovery';
			$headers = "From: " . $email . " \r\n";
			$headers .= "Reply-To: ". $email . "\r\n";
			$headers .= "Bcc: ".$primaryemail."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = '<html><body>';
			
			
			$message .=    '<div class="set" style="width:60px;
height:400px;
border:none;
position:absolute;
top:15px;
left:200px;
background:#202020;">';
            $message .=           '<div  class="st">';
      $message .=   '<span style="height: 40px; width: 550px; background: white; position: absolute; top: 0px;">';
	  
	 $message .=  '<span style="left:0px; position:absolute; top:12px;">';
	 
	 $message .= '<img src="http://www.personhub.com/images/logos/logo.png" alt="logo" width="147" height="28"/>';
	 
	 $message .= '</span>';
	 
	 $message .= '</span>';
	  
   $message .=   '<p style="font-size:13px">&nbsp;</p>';
   
  $message .=   '<p style="font-size:13px">Hello!
  <bold><strong>Dear</strong></bold>
  <br/>
  <br/> 
  Click this link to confirm your Password Recovery to the Personhub Software Newsletter:
  
  
  <a href="http://www.personhub.com/password-recovery.php?asdasvvasdhvvas='.$subject.'&&ti0034link='.$primaryemail.'">http://www.personhub.com/password_reset.php</a>';
  
  $message .= '</p>';
  
  
 $message .= '<p style="font-size:13px">
 
This Email will notify you about your password recovery , Please note that your e-mail is kept safe and you can unsubscribe at any time.

If you do not want to join, simply do not respond.

</p>';


 $message .= '<p style="font-size:13px">Kind regards,<br/>
Personhub Team<br/>
http://personhub.com/

</p>';

$message .= '</div>';

$message .='<p style="font-size:14px;position:relative; top:350px; text-align:center"> You are receiving Reminder emails for pending invitations. <a href="http://www.personhub.com/password_reset.php">Unsubscribe.</a> 
<br/>© 2013 Personhub. 2029 Stierlin Ct, Kuala Lumpur, KL 47100, Malaysia.</p>';

$message .= '</div>';
	$message .= '</div>';	  
			
			
			
		
		
		
		
			$message .= "</body></html>";
          
		  
		  
		  
		  
		  
		  
		  
		 
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		    mail($to, $subject, $message, $headers); 
	
	
	
	
	
	
	
	
	
	

    }

	

	else{

		echo "not exist";

		

		

		

	

		

	}



	

    		

?>



