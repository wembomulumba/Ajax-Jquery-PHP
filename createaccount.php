<?php



require_once('dbcon/dbconn.php');

session_start(); //Do not remove this
//only assign a new timestamp if the session variable is empty
if (!isset($_SESSION['random_key']) || strlen($_SESSION['random_key'])==0){
    $_SESSION['random_key'] = strtotime(date('Y-m-d H:i:s')); //assign the timestamp to the session variable
}




    function generateKey() { // Function générate key
					$nbChar = '8'; 
					$string = "";
					$chaine = "1234567890"; 
					srand((double)microtime()*1000000);
					for($i=0; $i<$nbChar; $i++) {
						$string .= $chaine[rand()%strlen($chaine)];
					}
					return $string;
				}

				// Var
				$key = generateKey();
        $timer=time();




       $firstname =    mysql_real_escape_string($_REQUEST['firstname']);
			
			 $lastname =    mysql_real_escape_string($_REQUEST['lastname']);

			 $primaryemail = mysql_real_escape_string($_REQUEST['primaryemail']);

			$password  =    md5(mysql_real_escape_string($_REQUEST['password']));









     $checkifexist = "INSERT INTO profile (firstname, primaryemail, password, photo,lastname,key_m,status,timer,name,username)  
     VALUES ('$firstname','$primaryemail','$password','images/silhouette200.png','$lastname','$key','1','$timer','$firstname','$firstname')";

     mysql_query($checkifexist,$connectionstring);	



           setcookie("email",$primaryemail,time()+(3600*12),"/");

							setcookie("password",$password,time()+(3600*12),"/");

							setcookie("surname",$firstname,time()+(3600*12),"/");





                    $_SESSION['login'] = $firstname;
						         
						        $_SESSION['key'] = $key;
						        $_SESSION['name'] = $firstname; 
						        $_SESSION['status'] = '1';








                            echo "Your Account Has Been Created, Please check your email for confirmation";
							
							
							
							
							
				
include("../api/php-classes/xmlapi.php");   //XMLAPI cpanel client class

// Default whm/cpanel account info

$ip = "127.0.0.1";           // should be server IP address or 127.0.0.1 if local server
$account = "personhu";        // cpanel user account name
$passwd ="Patrick@123";        // cpanel user password
$port =2083;                 // cpanel secure authentication port unsecure port# 2082

$email_domain = 'personhub.com'; // email domain (usually same as cPanel domain)
$email_quota = 250; // default amount of space in megabytes  


/*************End of Setting***********************/


// check if overrides passed
$email_user = preg_replace('/\s+/', '', $firstname);
$email_pass = $_SESSION['random_key'];
$email_vpass = $_SESSION['random_key'];
$email_domain =  $email_domain;
$email_quota = $email_quota;
$dest_email = $primaryemail;

$msg = '';
if (!empty($email_user))
while(true) {




$xmlapi = new xmlapi($ip);

$xmlapi->set_port($port);  //set port number. cpanel client class allow you to access WHM as well using WHM port.

$xmlapi->password_auth($account, $passwd);   // authorization with password. not as secure as hash.

// cpanel email addpop function Parameters
$call = array(domain=>$email_domain, email=>$email_user, password=>$email_pass, quota=>$email_quota);
// cpanel email fwdopt function Parameters
$call_f  = array(domain=>$email_domain, email=>$email_user, fwdopt=>"fwd", fwdemail=>$dest_email);
$xmlapi->set_debug(0);      //output to error file  set to 1 to see error_log.

// making call to cpanel api
$result = $xmlapi->api2_query($account, "Email", "addpop", $call ); 
$result_forward = $xmlapi->api2_query($account, "Email", "addforward", $call_f); //create a forward  
//for debugging purposes. uncomment to see output
//echo 'Result\n<pre>';
//print_r($result);
//echo '</pre>';

if ($result->data->result == 1){
$msg = $email_user.'@'.$email_domain.' account created';
 if ($result_forward->data->result == 1){
     $msg = $email_user.'@'.$email_domain.' forward to '.$dest_email;
     }
} else {
$msg = $result->data->reason;
  break;
}

break;
}
	
				
				
				
							
							
							
			// save data on mongodb database				
							
							
							
			
			
			
			
			
			
			
			
							
							
							
							
							
							
			$email = "notice@personhub.com";
			$subject = 'Personhub Email confirmation';
			$headers = "From: " . $email . " \r\n";
			$headers .= "Reply-To: ". $email . "\r\n";
			$headers .= "Bcc: ".$primaryemail."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = '<html><body style="style="background-color:#666;">';
			
			
			
			
			
			$message .= '<table width="677" border="0" align="center" cellpadding="0" bgcolor"#666" cellspacing="0">';
     $message .=  '<tr>';
     $message .= '<td width="520" valign="top" bgcolor="#f3f8fc" style="color:#33333;
	      font-family: Tahoma, Verdana,sans-serif, Arial, Helvetica;">';
	
	   $message .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
     $message .= '<tr>';
     $message .= '<td height="75" colspan="2" bgcolor="black" class="pressrelease">';
	   
	$message .=   '<img style="margin-left:23px" src="http://www.personhub.com/images/logos/logo.png" width="169" height="42">';
	   
	   $message .= '</td>';
      $message .=  '</tr>';
      
   $message .= '</table>';
   

   
   $message .= '<table width="100%" height="1" border="0" cellspacing="0" cellpadding="0">';
      $message .=  '<tr>';
         $message .= '<td></td>';
		 
       $message .= '</tr>
      </table>';
	  
	  
    $message .=  '<table width="100%" height="407" border="0" align="center" cellpadding="0" cellspacing="0">';
	
    $message .=    '<tr>';
	
       $message .='<td height="407" valign="top" class="con" style="color:#3a3372;
	font-size:12px;
	padding-top: 20px;
	padding-right: 20px;
	padding-bottom: 10px;
	padding-left: 20px;  
	font-family: Tahoma, Verdana,sans-serif, Arial, Helvetica;">';
	
	
	$message .= "Welcome " . $firstname . " \r\n";
	
       $message .= '<p><img src="http://www.personhub.com/images/silhouette200.png" width="150" height="170" hspace="20" vspace="10" align="left"><strong style="color:#3a3372;
	font-size:12px;
	padding-top: 20px;
	padding-right: 20px;
	padding-bottom: 10px;
	padding-left: 20px;">';
	
	
	$message .='Confirm your Account Information </strong> <br>
               Note: Cover may not represent actual copy or condition available <br>
              Format: Hardcover<br>
              Status: 0</p>';
			  
       $message .= '<p align="justify">';
            
        $message .='Congratulation ! your account has been created; Kindly Click this link to confirm your Email Address to the Personhub Account
            </br>
</br>
            <a href="http://www.personhub.com/">Confirm</a>
            </br>
            </br>

Staying in touch with valuable contacts can help you in your career. Quickly connect to some people we think you know.
 <p>';
 
 
  $message .=          '</p>
             <p>
            </p>';
			
			$message .='
 <p>
            </p>            
Kind regards,
Personhub Team
            
            
            
            
            
            
            </p>';
			
			
           
            
      $message .= '<table cellspacing="0" cellpadding="0">';
        $message .=      '<TR>
               
              </TR>';
             
			  
       
                
          $message .= '<p></p><p style="font-size:14px;position:relative; top:43px; text-align:center"> You are receiving Reminder emails for pending invitations. <a href="http://www.personhub.com/password_reset.php">Unsubscribe.</a> 
<br/>© 2013 Personhub. 2029 Stierlin Ct, Kuala Lumpur, KL 47100, Malaysia.</p>';
                  
           
               
          
         $message .=   '</table>';
          $message .='</td>';
       $message .= '</tr>';
     $message .= '</table>';
     
     $message .= '<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#F3F8FC">';
      $message .=  '<tr>';
       $message .=   '<td bgcolor="#F3F8FC">&nbsp;</td>';
	   
      $message .=  '</tr>';
    $message .='</table></td>';
  $message .= '</tr>';
$message .=    '</table>';

			$message .= "</body></html>";

		    mail($primaryemail, $subject, $message, $headers); 
	
	

?>




