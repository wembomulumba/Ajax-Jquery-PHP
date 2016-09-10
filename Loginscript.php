<?php



require_once('dbcon/dbconn.php');

$email = mysql_real_escape_string((string)$_REQUEST['myemail']);

$password = md5(mysql_real_escape_string($_REQUEST['mypassword']));



$checklogin = "select * from  profile WHERE (primaryemail = '$email' or firstname='$email') AND password = '$password' limit 1";

$resquery = mysql_query($checklogin,$connectionstring);

  if($row= mysql_fetch_array($resquery)){ 

 



				     

                    $useremail = $row["primaryemail"];
                    $surname = $row["firstname"];
                    $userpass = md5($row["password"]);
                    
                    $_SESSION["login"] = $surname;
                    $_SESSION["id"] = $row['id']; 
                    $_SESSION["key"] = $row['key_m'];
                    $_SESSION["name"] = $surname;
                    $_SESSION["status"] = $row['status'];




                    

				       

							setcookie("email",$email,time()+(3600*12),"/");

							setcookie("password",$password,time()+(3600*12),"/");

							setcookie("surname",$surname,time()+(3600*12),"/");

							

							

							

							

							

							

							

							echo "connecting";

					       

						

		                       }

						



							 else {

								

								

									echo "Wrong";

							

									}



   

	





 

                        

	







?>