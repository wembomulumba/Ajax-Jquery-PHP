<?php

$userid = $_GET['ti0034link'];



include ('JasmineModel/dbcon/dbconn.php');





$checklogin2 = "select * from  profile WHERE primaryemail = '$userid'  limit 1";

$resquery = mysql_query($checklogin2,$connectionstring);





 

                if($row= mysql_fetch_array($resquery)){ 


						   $profileimage = $row['photo'];
						   $mobile = $row['mobile'];

						  

						 

						 

		

						   }







?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $userid ?>    - Please confirm your password to continue</title>



<link href="domino/css/mainx.css" rel="stylesheet" type="text/css" />

<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />

   <link href="domino/css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

 <script type="text/javascript" src="domino/js/jquery.js"></script>



    <script>!window.jQuery && document.write(unescape('%3Cscript src="domino/js/jquery-1.7.2.min.js"%3E%3C/script%3E'))</script>

	<script src="js/jquery-ui.min.js"></script>

	<script>!window.jQuery.ui && document.write(unescape('%3Cscript src="domino/js/jquery-ui-1.8.21.custom.min.js"%3E%3C/script%3E'))

    

    </script>

	<!-- mousewheel plugin -->

	<script src="domino/js/jquery.mousewheel.min.js"></script>

	<!-- custom scrollbars plugin -->

	<script src="domino/js/jquery.mCustomScrollbar.js"></script>

    

    

	<script>

		(function($){

			$(window).load(function(){

				$("#format").mCustomScrollbar();

			});

		})(jQuery);

	</script>  

    

    

    

    

    

    

    

    

    

    

    <script type="text/javascript" src="domino/js/jquery-1.9.0.js" ></script>







<script type="text/javascript">

       





        $(document).ready(function() {

		

		$('#updateprofile').click(function(e){

		

	         

		        

				

				 Updatenewaccount();

		   



		   

			 	return false;

		   

		   

		     });

			 

			 

			   

		   

		

    });









          

               function Updatenewaccount(){

				   

				 

					  var surname = $('#surname').val();

					  var password = $('#password').val();

					  var gender =    $('#gender').val();

					  var homestate = $('#homestate').val();

					  var country = $('#country').val();

					  var b_month = $('#month').val();

					  var b_year = $('#year').val();

					  var about_user = $('#about_user').val();

					 

					 

					  var program_year = $('#program_year').val();

					  

					   var institut_name = $('#institution_name').val();

				   

				     $.ajax({

			 

					 type:"POST",

					 url:"JasmineModel/Updatenewaccount.php",

					 data:"surname=" + surname + "&password=" + password + "&gender=" + gender + "&homestate=" + homestate + "&country=" + country                     + "&b_month=" + b_month + "&b_year=" + b_year + "&about_user=" + about_user + "&program_year=" + program_year + "&institut_name=" + institut_name,

					 success:function(updateresult){

				 

						 $('#warning').html(updateresult);

						 

					

						         var url = "UploadPhoto.php";    

                                $(location).attr('href',url);

						

						  }

			 

		   

		                });

	

				   

			   }





               

						

						

						

						

						

						

						

						 

						

					

						

						

						

					

					

					

					

					

				

			

          

</script>



    

    

    

    

    

    

    

    



<style type="text/css">

body,td,th {

	font-family: Verdana, Geneva, sans-serif;

	font-size: 12px;

	color: #999999;

}

body {

	

}



#content{

	color:#333;

	font-family:Verdana, Geneva, sans-serif;

	font-size-adjust:inherit;

	width:70%;

	

	

	

	

	

}



#format{

	color:#333;

	font-family:Verdana, Geneva, sans-serif;

	margin-top:100px;



	width:92%;

	margin-left:30px;

	font-size:14px;

	height:250px;

	

	

	

	

}





#format a {

	color:#03F;

	font-size:12px;

		

	

	font-family:Verdana, Geneva, sans-serif;

	

}

#box {

	

	margin-top:40px;

    margin-left:320px;

	border:1px double #979797;

	height:auto;

	

}







/*------------------------------------*\

	$WRAPPER

\*------------------------------------*/







#contact-form input[type="text"],

#contact-form input[type="email"],

#contact-form input[type="tel"],

#contact-form input[type="url"],

#contact-form textarea,

#contact-form button[type="submit"] {

	font:400 12px/12px "Helvetica Neue", Helvetica, Arial, sans-serif;

}

#contact-form {

	text-shadow:0 1px 0 #FFF;

	border-radius:4px;

	-webkit-border-radius:4px;

	-moz-border-radius:4px;

	background:#F9F9F9;

	padding:25px;

}

#contact-form h3 {

	color:#060;

	display:block;

	font-size:28px;

}

#contact-form h4 {

	margin:5px 0 15px;

	display:block;

	font-size:13px;

}

#contact-form label span {

	cursor:pointer;

	color:#06C;

	display:block;

	margin:5px 0;

	font-weight:900;

}

#contact-form input[type="text"],

#contact-form input[type="email"],

#contact-form input[type="tel"],

#contact-form input[type="url"],

#contact-form textarea {

	width:88%;

	box-shadow:inset 0 1px 2px #DDD, 0 1px 0 #FFF;

	-webkit-box-shadow:inset 0 1px 2px #DDD, 0 1px 0 #FFF;

	-moz-box-shadow:inset 0 1px 2px #DDD, 0 1px 0 #FFF;

	border:1px solid #CCC;

	background:#FFF;

	margin:0 0 5px;

	padding:10px;

	border-radius:5px;

}

#contact-form input[type="text"]:hover,

#contact-form input[type="email"]:hover,

#contact-form input[type="tel"]:hover,

#contact-form input[type="url"]:hover,

#contact-form textarea:hover {

	-webkit-transition:border-color 0.3s ease-in-out;

	-moz-transition:border-color 0.3s ease-in-out;

	transition:border-color 0.3s ease-in-out;

	border:1px solid #AAA;

}

#contact-form textarea {

	height:100px;

	max-width:88%;

}

#contact-form button[type="submit"] {

	cursor:pointer;

	width:100%;

	border:none;

	background:#C30 ;

	

	color:#FFF;

	margin:6 6 5px;

	padding:10px;

	border-radius:5px;

}

#contact-form button[type="submit"]:hover {

	

        background: #C30 ;

        

        

	-webkit-transition:background 0.3s ease-in-out;

	-moz-transition:background 0.3s ease-in-out;

	transition:background-color 0.3s ease-in-out;

}

#contact-form button[type="submit"]:active {

	box-shadow:inset 0 1px 3px rgba(0,0,0,0.5);

}

#contact-form input:focus{

	 border-color:white;

        -moz-box-shadow: 0px 0px 12px #fff;

        -webkit-box-shadow: 0px 0px 12px #fff;

        box-shadow: 0px 0px 12px #fff;

	

	

}

#contact-form textarea:focus {

	outline:0;

	border:1px solid #999;

	 border-color:white;

        -moz-box-shadow: 0px 0px 12px #fff;

        -webkit-box-shadow: 0px 0px 12px #fff;

        box-shadow: 0px 0px 12px #fff;

}

::-webkit-input-placeholder {

    color:#888;

}

:-moz-placeholder {

    color:#888;

}

::-moz-placeholder {

    color:#888;

}

:-ms-input-placeholder {

    color:#888;

}









</style>

</head>



<body>



<!-- Top navigation bar -->

<div id="topNav">

    <div class="fixed">

        <div class="wrapper">

            <div class="backTo"><a href="#" title=""><img src="images/logos/logo.png" width="178" height="36" /></a></div>

            <div class="userNav">

                <ul>

                <li></li>

                <li><a href="#" title=""><span>&nbsp;</span></a></li>

                <li><a href="#" title=""><span>Language</span></a></li>

                <li><a href="#" title=""><span><select><option>french</option><option>English</option><option>Portugaze</option><option>Lingala</option></select></span></a></li>



                    

                   

                </ul>

            </div>

            <div class="fix"></div>

        </div>

    </div>

</div>

<div>



<div id="content">



  <div id="box">

  

  

  <div id="completesignup">

  	<form id="contact-form" action="contact.php" method="post">

			<h3>Complete your Registration</h3>

			



			<div>

				<label>

					<span>Surname: (required)</span>

					<input placeholder="Please enter your name" name="name" type="text" value="<?php echo $surname ?> " id="surname" tabindex="1" required autofocus>

				</label>

			</div>

            

            

			<div>

				<label>

					<span>Confirm Password</span>

					<input placeholder="Please enter your name" name="password" type="password" id="password" tabindex="1" required autofocus>

				</label>

			</div>

            

            

            <div>

				<label>

					<span>Gender</span>

				<select id="gender" style="width:160px">

                           

                           <option value="male" title="Afghanistan">Male</option>

	                      <option value="femele" selected="selected" title="Iland Islands">Femele</option>

	

				

                </select>

                

                </label>

			</div>

            

			

            <div>

				<label>

					<span>hometown Country</span>

				   <select id="country" style="width:160px">

                           

                           <option value="Afghanistan" title="Afghanistan">Afghanistan</option>

	<option value="Iland Islands" selected="selected" title="Iland Islands">Iland Islands</option>

	<option value="Albania" title="Albania">Albania</option>

	<option value="Algeria" title="Algeria">Algeria</option>

	<option value="American Samoa" title="American Samoa">American Samoa</option>

	<option value="Andorra" title="Andorra">Andorra</option>

	<option value="Angola" title="Angola">Angola</option>

	<option value="Anguilla" title="Anguilla">Anguilla</option>

	<option value="Antarctica" title="Antarctica">Antarctica</option>

	<option value="Antigua and Barbuda" title="Antigua and Barbuda">Antigua and Barbuda</option>

	<option value="Argentina" title="Argentina">Argentina</option>

	<option value="Armenia" title="Armenia">Armenia</option>

	<option value="Aruba" title="Aruba">Aruba</option>

	<option value="Australia" title="Australia">Australia</option>

	<option value="Austria" title="Austria">Austria</option>

	<option value="Azerbaijan" title="Azerbaijan">Azerbaijan</option>

	<option value="Bahamas" title="Bahamas">Bahamas</option>

	<option value="Bahrain" title="Bahrain">Bahrain</option>

	<option value="Bangladesh" title="Bangladesh">Bangladesh</option>

	<option value="Barbados" title="Barbados">Barbados</option>

	<option value="Belarus" title="Belarus">Belarus</option>

	<option value="Belgium" title="Belgium">Belgium</option>

	<option value="Belize" title="Belize">Belize</option>

	<option value="Benin" title="Benin">Benin</option>

	<option value="Bermuda" title="Bermuda">Bermuda</option>

	<option value="Bhutan" title="Bhutan">Bhutan</option>

	<option value="Bolivia, Plurinational State of" title="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>

	<option value="Bonaire, Sint Eustatius and Saba" title="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>

	<option value="Bosnia and Herzegovina" title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>

	<option value="Botswana" title="Botswana">Botswana</option>

	<option value="Bouvet Island" title="Bouvet Island">Bouvet Island</option>

	<option value="Brazil" title="Brazil">Brazil</option>

	<option value="British Indian Ocean Territory" title="British Indian Ocean Territory">British Indian Ocean Territory</option>

	<option value="Brunei Darussalam" title="Brunei Darussalam">Brunei Darussalam</option>

	<option value="Bulgaria" title="Bulgaria">Bulgaria</option>

	<option value="Burkina Faso" title="Burkina Faso">Burkina Faso</option>

	<option value="Burundi" title="Burundi">Burundi</option>

	<option value="Cambodia" title="Cambodia">Cambodia</option>

	<option value="Cameroon" title="Cameroon">Cameroon</option>

	<option value="Canada" title="Canada">Canada</option>

	<option value="Cape Verde" title="Cape Verde">Cape Verde</option>

	<option value="Cayman Islands" title="Cayman Islands">Cayman Islands</option>

	<option value="Central African Republic" title="Central African Republic">Central African Republic</option>

	<option value="Chad" title="Chad">Chad</option>

	<option value="Chile" title="Chile">Chile</option>

	<option value="China" title="China">China</option>

	<option value="Christmas Island" title="Christmas Island">Christmas Island</option>

	<option value="Cocos (Keeling) Islands" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>

	<option value="Colombia" title="Colombia">Colombia</option>

	<option value="Comoros" title="Comoros">Comoros</option>

	<option value="Congo" title="Congo">Congo</option>

	<option value="Congo, the Democratic Republic of the" title="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>

	<option value="Cook Islands" title="Cook Islands">Cook Islands</option>

	<option value="Costa Rica" title="Costa Rica">Costa Rica</option>

	<option value="Cote d'Ivoire" title="C�te d'Ivoire">C�te d'Ivoire</option>

	<option value="Croatia" title="Croatia">Croatia</option>

	<option value="Cuba" title="Cuba">Cuba</option>

	<option value="Cura�ao" title="Cura�ao">Cura�ao</option>

	<option value="Cyprus" title="Cyprus">Cyprus</option>

	<option value="Czech Republic" title="Czech Republic">Czech Republic</option>

	<option value="Denmark" title="Denmark">Denmark</option>

	<option value="Djibouti" title="Djibouti">Djibouti</option>

	<option value="Dominica" title="Dominica">Dominica</option>

	<option value="Dominican Republic" title="Dominican Republic">Dominican Republic</option>

	<option value="Ecuador" title="Ecuador">Ecuador</option>

	<option value="Egypt" title="Egypt">Egypt</option>

	<option value="El Salvador" title="El Salvador">El Salvador</option>

	<option value="Equatorial Guinea" title="Equatorial Guinea">Equatorial Guinea</option>

	<option value="Eritrea" title="Eritrea">Eritrea</option>

	<option value="Estonia" title="Estonia">Estonia</option>

	<option value="Ethiopia" title="Ethiopia">Ethiopia</option>

	<option value="Falkland Islands (Malvinas)" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>

	<option value="Faroe Islands" title="Faroe Islands">Faroe Islands</option>

	<option value="Fiji" title="Fiji">Fiji</option>

	<option value="Finland" title="Finland">Finland</option>

	<option value="France" title="France">France</option>

	<option value="French Guiana" title="French Guiana">French Guiana</option>

	<option value="French Polynesia" title="French Polynesia">French Polynesia</option>

	<option value="French Southern Territories" title="French Southern Territories">French Southern Territories</option>

	<option value="Gabon" title="Gabon">Gabon</option>

	<option value="Gambia" title="Gambia">Gambia</option>

	<option value="Georgia" title="Georgia">Georgia</option>

	<option value="Germany" title="Germany">Germany</option>

	<option value="Ghana" title="Ghana">Ghana</option>

	<option value="Gibraltar" title="Gibraltar">Gibraltar</option>

	<option value="Greece" title="Greece">Greece</option>

	<option value="Greenland" title="Greenland">Greenland</option>

	<option value="Grenada" title="Grenada">Grenada</option>

	<option value="Guadeloupe" title="Guadeloupe">Guadeloupe</option>

	<option value="Guam" title="Guam">Guam</option>

	<option value="Guatemala" title="Guatemala">Guatemala</option>

	<option value="Guernsey" title="Guernsey">Guernsey</option>

	<option value="Guinea" title="Guinea">Guinea</option>

	<option value="Guinea-Bissau" title="Guinea-Bissau">Guinea-Bissau</option>

	<option value="Guyana" title="Guyana">Guyana</option>

	<option value="Haiti" title="Haiti">Haiti</option>

	<option value="Heard Island and McDonald Islands" title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>

	<option value="Holy See (Vatican City State)" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>

	<option value="Honduras" title="Honduras">Honduras</option>

	<option value="Hong Kong" title="Hong Kong">Hong Kong</option>

	<option value="Hungary" title="Hungary">Hungary</option>

	<option value="Iceland" title="Iceland">Iceland</option>

	<option value="India" title="India">India</option>

	<option value="Indonesia" title="Indonesia">Indonesia</option>

	<option value="Iran, Islamic Republic of" title="Iran, Islamic Republic of">Iran, Islamic Republic of</option>

	<option value="Iraq" title="Iraq">Iraq</option>

	<option value="Ireland" title="Ireland">Ireland</option>

	<option value="Isle of Man" title="Isle of Man">Isle of Man</option>

	<option value="Israel" title="Israel">Israel</option>

	<option value="Italy" title="Italy">Italy</option>

	<option value="Jamaica" title="Jamaica">Jamaica</option>

	<option value="Japan" title="Japan">Japan</option>

	<option value="Jersey" title="Jersey">Jersey</option>

	<option value="Jordan" title="Jordan">Jordan</option>

	<option value="Kazakhstan" title="Kazakhstan">Kazakhstan</option>

	<option value="Kenya" title="Kenya">Kenya</option>

	<option value="Kiribati" title="Kiribati">Kiribati</option>

	<option value="Korea, Democratic People's Republic of" title="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>

	<option value="Korea, Republic of" title="Korea, Republic of">Korea, Republic of</option>

	<option value="Kuwait" title="Kuwait">Kuwait</option>

	<option value="Kyrgyzstan" title="Kyrgyzstan">Kyrgyzstan</option>

	<option value="Lao People's Democratic Republic" title="Lao People's Democratic Republic">Lao People's Democratic Republic</option>

	<option value="Latvia" title="Latvia">Latvia</option>

	<option value="Lebanon" title="Lebanon">Lebanon</option>

	<option value="Lesotho" title="Lesotho">Lesotho</option>

	<option value="Liberia" title="Liberia">Liberia</option>

	<option value="Libya" title="Libya">Libya</option>

	<option value="Liechtenstein" title="Liechtenstein">Liechtenstein</option>

	<option value="Lithuania" title="Lithuania">Lithuania</option>

	<option value="Luxembourg" title="Luxembourg">Luxembourg</option>

	<option value="Macao" title="Macao">Macao</option>

	<option value="Macedonia, the former Yugoslav Republic of" title="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>

	<option value="Madagascar" title="Madagascar">Madagascar</option>

	<option value="Malawi" title="Malawi">Malawi</option>

	<option value="Malaysia" title="Malaysia">Malaysia</option>

	<option value="Maldives" title="Maldives">Maldives</option>

	<option value="Mali" title="Mali">Mali</option>

	<option value="Malta" title="Malta">Malta</option>

	<option value="Marshall Islands" title="Marshall Islands">Marshall Islands</option>

	<option value="Martinique" title="Martinique">Martinique</option>

	<option value="Mauritania" title="Mauritania">Mauritania</option>

	<option value="Mauritius" title="Mauritius">Mauritius</option>

	<option value="Mayotte" title="Mayotte">Mayotte</option>

	<option value="Mexico" title="Mexico">Mexico</option>

	<option value="Micronesia, Federated States of" title="Micronesia, Federated States of">Micronesia, Federated States of</option>

	<option value="Moldova, Republic of" title="Moldova, Republic of">Moldova, Republic of</option>

	<option value="Monaco" title="Monaco">Monaco</option>

	<option value="Mongolia" title="Mongolia">Mongolia</option>

	<option value="Montenegro" title="Montenegro">Montenegro</option>

	<option value="Montserrat" title="Montserrat">Montserrat</option>

	<option value="Morocco" title="Morocco">Morocco</option>

	<option value="Mozambique" title="Mozambique">Mozambique</option>

	<option value="Myanmar" title="Myanmar">Myanmar</option>

	<option value="Namibia" title="Namibia">Namibia</option>

	<option value="Nauru" title="Nauru">Nauru</option>

	<option value="Nepal" title="Nepal">Nepal</option>

	<option value="Netherlands" title="Netherlands">Netherlands</option>

	<option value="New Caledonia" title="New Caledonia">New Caledonia</option>

	<option value="New Zealand" title="New Zealand">New Zealand</option>

	<option value="Nicaragua" title="Nicaragua">Nicaragua</option>

	<option value="Niger" title="Niger">Niger</option>

	<option value="Nigeria" title="Nigeria">Nigeria</option>

	<option value="Niue" title="Niue">Niue</option>

	<option value="Norfolk Island" title="Norfolk Island">Norfolk Island</option>

	<option value="Northern Mariana Islands" title="Northern Mariana Islands">Northern Mariana Islands</option>

	<option value="Norway" title="Norway">Norway</option>

	<option value="Oman" title="Oman">Oman</option>

	<option value="Pakistan" title="Pakistan">Pakistan</option>

	<option value="Palau" title="Palau">Palau</option>

	<option value="Palestinian Territory, Occupied" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>

	<option value="Panama" title="Panama">Panama</option>

	<option value="Papua New Guinea" title="Papua New Guinea">Papua New Guinea</option>

	<option value="Paraguay" title="Paraguay">Paraguay</option>

	<option value="Peru" title="Peru">Peru</option>

	<option value="Philippines" title="Philippines">Philippines</option>

	<option value="Pitcairn" title="Pitcairn">Pitcairn</option>

	<option value="Poland" title="Poland">Poland</option>

	<option value="Portugal" title="Portugal">Portugal</option>

	<option value="Puerto Rico" title="Puerto Rico">Puerto Rico</option>

	<option value="Qatar" title="Qatar">Qatar</option>

	<option value="R�union" title="R�union">R�union</option>

	<option value="Romania" title="Romania">Romania</option>

	<option value="Russian Federation" title="Russian Federation">Russian Federation</option>

	<option value="Rwanda" title="Rwanda">Rwanda</option>

	<option value="Saint Barth�lemy" title="Saint Barth�lemy">Saint Barth�lemy</option>

	<option value="Saint Helena, Ascension and Tristan da Cunha" title="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>

	<option value="Saint Kitts and Nevis" title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>

	<option value="Saint Lucia" title="Saint Lucia">Saint Lucia</option>

	<option value="Saint Martin (French part)" title="Saint Martin (French part)">Saint Martin (French part)</option>

	<option value="Saint Pierre and Miquelon" title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>

	<option value="Saint Vincent and the Grenadines" title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>

	<option value="Samoa" title="Samoa">Samoa</option>

	<option value="San Marino" title="San Marino">San Marino</option>

	<option value="Sao Tome and Principe" title="Sao Tome and Principe">Sao Tome and Principe</option>

	<option value="Saudi Arabia" title="Saudi Arabia">Saudi Arabia</option>

	<option value="Senegal" title="Senegal">Senegal</option>

	<option value="Serbia" title="Serbia">Serbia</option>

	<option value="Seychelles" title="Seychelles">Seychelles</option>

	<option value="Sierra Leone" title="Sierra Leone">Sierra Leone</option>

	<option value="Singapore" title="Singapore">Singapore</option>

	<option value="Sint Maarten (Dutch part)" title="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>

	<option value="Slovakia" title="Slovakia">Slovakia</option>

	<option value="Slovenia" title="Slovenia">Slovenia</option>

	<option value="Solomon Islands" title="Solomon Islands">Solomon Islands</option>

	<option value="Somalia" title="Somalia">Somalia</option>

	<option value="South Africa" title="South Africa">South Africa</option>

	<option value="South Georgia and the South Sandwich Islands" title="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>

	<option value="South Sudan" title="South Sudan">South Sudan</option>

	<option value="Spain" title="Spain">Spain</option>

	<option value="Sri Lanka" title="Sri Lanka">Sri Lanka</option>

	<option value="Sudan" title="Sudan">Sudan</option>

	<option value="Suriname" title="Suriname">Suriname</option>

	<option value="Svalbard and Jan Mayen" title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>

	<option value="Swaziland" title="Swaziland">Swaziland</option>

	<option value="Sweden" title="Sweden">Sweden</option>

	<option value="Switzerland" title="Switzerland">Switzerland</option>

	<option value="Syrian Arab Republic" title="Syrian Arab Republic">Syrian Arab Republic</option>

	<option value="Taiwan, Province of China" title="Taiwan, Province of China">Taiwan, Province of China</option>

	<option value="Tajikistan" title="Tajikistan">Tajikistan</option>

	<option value="Tanzania, United Republic of" title="Tanzania, United Republic of">Tanzania, United Republic of</option>

	<option value="Thailand" title="Thailand">Thailand</option>

	<option value="Timor-Leste" title="Timor-Leste">Timor-Leste</option>

	<option value="Togo" title="Togo">Togo</option>

	<option value="Tokelau" title="Tokelau">Tokelau</option>

	<option value="Tonga" title="Tonga">Tonga</option>

	<option value="Trinidad and Tobago" title="Trinidad and Tobago">Trinidad and Tobago</option>

	<option value="Tunisia" title="Tunisia">Tunisia</option>

	<option value="Turkey" title="Turkey">Turkey</option>

	<option value="Turkmenistan" title="Turkmenistan">Turkmenistan</option>

	<option value="Turks and Caicos Islands" title="Turks and Caicos Islands">Turks and Caicos Islands</option>

	<option value="Tuvalu" title="Tuvalu">Tuvalu</option>

	<option value="Uganda" title="Uganda">Uganda</option>

	<option value="Ukraine" title="Ukraine">Ukraine</option>

	<option value="United Arab Emirates" title="United Arab Emirates">United Arab Emirates</option>

	<option value="United Kingdom" title="United Kingdom">United Kingdom</option>

	<option value="United States" title="United States">United States</option>

	<option value="United States Minor Outlying Islands" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>

	<option value="Uruguay" title="Uruguay">Uruguay</option>

	<option value="Uzbekistan" title="Uzbekistan">Uzbekistan</option>

	<option value="Vanuatu" title="Vanuatu">Vanuatu</option>

	<option value="Venezuela, Bolivarian Republic of" title="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>

	<option value="Viet Nam" title="Viet Nam">Viet Nam</option>

	<option value="Virgin Islands, British" title="Virgin Islands, British">Virgin Islands, British</option>

	<option value="Virgin Islands, U.S." title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>

	<option value="Wallis and Futuna" title="Wallis and Futuna">Wallis and Futuna</option>

	<option value="Western Sahara" title="Western Sahara">Western Sahara</option>

	<option value="Yemen" title="Yemen">Yemen</option>

	<option value="Zambia" title="Zambia">Zambia</option>

	<option value="Zimbabwe" title="Zimbabwe">Zimbabwe</option>

                            </select>

				</label>

			</div>

			<div>

				<label>

					<span>hometown State</span>

					<input placeholder="State where you live" type="tel" name="homestate" id= "homestate" tabindex="3" required>

				</label>

			</div>

            

            <div>

				<label>

					<span>University or College</span>

					<input placeholder="Where you studied" type="tel" name="homestate" id= "institution_name" tabindex="3" required>

				</label>

			</div>

            

              <div>

				<label>

					<span>Program Year </span>

					 <select id="program_year" style="width:160px">

                           

                   <option value="2000" title="2000">2000</option>

                   <option value="2000" title="2000">2000</option>

	              <option value="1999"  title="1999">1999</option>

                  <option value="1940"  title="Iland Islands">1998</option>

                  <option value="1977" title="Afghanistan">1997</option>

	

                  <option value="1990" selected="selected" title="Iland Islands">1990</option>

    

    

					</select>

				</label>

			</div>

            

            

            

            

            <div>

				<label>

					<span>Month of Birth</span>

					<select id="month" style="width:160px">

                           

                           <option value="january" title="january">January</option>

	<option value="febuary" selected="febuary" title="Iland Islands">Febuary</option>

    <option value="march" selected="march" title="march">March</option>

      <option value="Afghanistan" title="Afghanistan">April</option>

	<option value="Iland Islands" selected="selected" title="Iland Islands">May</option>

    <option value="Iland Islands" selected="selected" title="Iland Islands">Juin</option>

	  <option value="Afghanistan" title="Afghanistan">Juillet</option>

	<option value="Iland Islands" selected="selected" title="Iland Islands">August</option>

    <option value="Iland Islands" selected="selected" title="Iland Islands">September</option>

     <option value="Iland Islands" selected="selected" title="Iland Islands">October</option>

      <option value="Iland Islands" selected="selected" title="Iland Islands">November</option>

       <option value="Iland Islands" selected="selected" title="Iland Islands">December</option>

    

					</select>

                   

                    

                 <span>Year of Birth</span>

				  <select id="year" style="width:160px">

                           

                   <option value="2000" title="2000">2000</option>

	<option value="1999" selected="1999" title="1999">1999</option>

    <option value="1940" selected="selected" title="Iland Islands">1998</option>

      <option value="1977" title="Afghanistan">1997</option>

	

    <option value="1990" selected="selected" title="Iland Islands">1990</option>

    

    

					</select>

                    

    

    

			  </label>

				</label>

			</div>

            

            

            

            

            

			<div>

				<label>

					<span>About You</span>

					<textarea placeholder="Include all the details you can" name="" id="about_user" tabindex="5" required></textarea>

				</label>

			</div>

			<div id="warning">

            

            </div>

            

            <div>

				<button name="submit" type="submit" id="updateprofile" data-text="...Updating">Update</button>

			</div>

		</form>

  

  

  </div>

  

<div id="format">

<h1>Please Read those terms and conditions</h1>

<label>Last revised on March 24, 2010</label>



<h2>Terms and Conditions</h2>

 <p>

LinkedIn desires to offer a website where our Users share truthful and accurate information. We respect the intellectual property rights of others and desire to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedIn provides a process for submission of complaints concerning content posted by our Usersand procedures are described in the sections that follow.

edIn desires to offer a website where our Users share truthful and accurate information. We respect the intellectual property rights of others and desire to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedIn

edIn desires to offer a website where our Users share truthful and accurate information. We respect the intellectual property rights of others and desire to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedInedIn desires to offer a website where our Users share truthful and accurate information. We respect the intellectual property rights of others and desire to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedIn

 to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedIn provides a process for submission of complaints concerning content posted by our Usersand procedures are described in the sections that follow.

edIn desires to offer a website where our Users share truthful and accurate information. We respect the intellectual property rights of others and desire to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedIn

edIn desires to offer a website where our Users share truthful and accurate information. We respect the intellectual property rights of others and desire to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedInedIn desires to offer a website where our Users share truthful and accurate information. We respect the intellectual property rights of others and desire to offer a website which contains no content that violates those rights. Our User Agreement requires that information posted by Users be accurate, lawful and not in violation of the intellectual property rights of third parties. To promote these objectives, LinkedIn











.<a href=""> Our policy </a>

</p>







</div>

    

    </div>

<div>







<!-- Login form area -->

<!-- Footer -->

<div id="footer" align="center" style="position: fixed;">

	<div class="wrapper">

    <a href="" title="">About us &nbsp;&nbsp;&nbsp;</a> <a href="" title="">Feedback&nbsp;&nbsp;&nbsp;</a> <a href="" title="">Helps&nbsp;&nbsp;&nbsp;</a> <a href="" title="">Contact Us&nbsp;&nbsp;&nbsp;</a>  <a href="" title="">Developper&nbsp;&nbsp;&nbsp;</a>  <a href="" title="">Advitiser&nbsp;&nbsp;&nbsp;</a>  <a href="" title="">Report a Friend&nbsp;&nbsp;&nbsp;</a><a href="" title="">Terms and Conditions&nbsp;&nbsp;&nbsp;</a> <a href="" title="">Policy&nbsp;&nbsp;&nbsp;</a><span>&copy; Copyright 2012. All rights reserved. <a href="" title="">Ndoto</a></span>

    </div>

</div>



<script>

	(function() {



		// Create input element for testing

		var inputs = document.createElement('input');

		

		// Create the supports object

		var supports = {};

		

		supports.autofocus   = 'autofocus' in inputs;

		supports.required    = 'required' in inputs;

		supports.placeholder = 'placeholder' in inputs;

	

		// Fallback for autofocus attribute

		if(!supports.autofocus) {

			

		}

		

		// Fallback for required attribute

		if(!supports.required) {

			

		}

	

		// Fallback for placeholder attribute

		if(!supports.placeholder) {

			

		}

		

		// Change text inside send button on submit

		var send = document.getElementById('contact-submit');

		if(send) {

			var dataText = send.getAttribute('data-text');

			send.onclick = function() {

				send.innerHTML = dataText;

			}

		}

	

	})();

	</script>



</body>

</html>