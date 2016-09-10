
<?php
error_reporting(0);
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])   )
{
session_start();
header("location: Home.php"); 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0043)http://w3lessons.info/demo/facebook-design/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="google-site-verification" content="2w3nkitqLaEYXfzfwIz_29jk3GQyYPz0D67oLroX1sY" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Keywords" content="online person in africa , live news in french , congo mikili news , reseau social au congo dr , site de ventes en ligne , ventes et achats en ligne" >
<meta name="Description" CONTENT="Online perserons , online people, personhub, personhub social networks, social networks, Welcome to Personhub- login, sign up and Learn More, chat discussion news feeds personhub, privacy on social network, buy and sell on social networks">
<title>Login or Sign Up to Personhub , Get Connected to professionals , sellers, buyers , freelancers Around the Globe , Be Updated with News , Business Directory and More </title>
<link rel="stylesheet" href="domino/css/style.css" type="text/css">
<script type="text/javascript" src="domino/js/jquery-1.9.0.js" ></script>
<script type="text/javascript">
               $(document).ready(function() {
		$('#createaccount').click(function(e){
		        var primaryemail = $('#primaryemail').val();
		         var firstname = $('#firstname').val();
		         var password = $('#password').val();
		        				passwordcomparaison();
				return false;
				 });
     $('#accessaccount').click(function(){
	             var myemail = $('#myemail').val();
		           var mypassword = $('#mypassword').val();
				       accesshomepage();
                return false;
                
    });
    
    
    
    
     


 
 });
  function accesshomepage(){
				    var myemail = $('#myemail').val();
		            var mypassword = $('#mypassword').val();
				     $.ajax({
					 type:"POST",
					 url:"JasmineModel/Loginscript.php",
					 data:"myemail=" + myemail + "&mypassword=" + mypassword ,
					 success:function(data2){
						loginresult = data2;
						 if(loginresult == "connecting"){
							  $('#loginwarning').html(loginresult);
							   var url = "Home.php";    
                                $(location).attr('href',url);
        }
              if(loginresult == "Wrong"){

							  $('#loginwarning').html(loginresult);
						 }
						  }
     });
}
   function passwordcomparaison(){
					 
					 
					  var password = $('#password').val();
					  
					  var checkpassword = $('#password2compare').val();
					  
					  
					  if (password != checkpassword){

							alert("Password not Matching");

						}
						
						else{
							isValidEmailAddress();
							
						}
					 
				 }

               function InsertNewaccount(){

				   
				     var primaryemail = $('#primaryemail').val();

					 var firstname = $('#firstname').val();
					 
					 var lastname = $('#lastname').val();

					 var password = $('#password').val();

				     $.ajax({

					 type:"POST",

					 url:"JasmineModel/createaccount.php",

					 data:"firstname=" + firstname + "&lastname="  + lastname + "&primaryemail=" + primaryemail + "&password=" + password ,

					 success:function(result){

				 
						 $('#warning').html(result);

						   var url = "completeregistration.php";    

                                $(location).attr('href',url);
 }

		                });

			   }

                 function isValidEmailAddress() {

			    var result = null;

					 var firstname = $('#firstname').val();

					 var password = $('#password').val();

		
                    var primaryemail = $('#primaryemail').val();
					

					var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

					if (filter.test(primaryemail)) {

					
					$.ajax({

					 type:"POST",

					 url:"JasmineModel/newaccount.php",

					 data:"firstname=" + firstname + "&primaryemail=" + primaryemail + "&password=" + password ,

					 success:function(data){

						result2 = data;

						if (result2 == "exist"){

							 $('#warning').html("This email exist already, Please your own login information");

						}

						if (result2 == "not exist"){
            
							InsertNewaccount();

						}

						
						  }

		                });

				}

				else {

			    $('#warning').html("this email is not correct");

				}

			
            };

</script>
</head>

<body class="login">
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"> <a href="index.php"><img src="images/logos/logo.png" width="55" height="50"/></a> </div>
    
         
        <div id="header-main-right">
          <div id="header-main-right-nav">
        <form method="post" action="" id="login_form" name="login_form">
          <table border="0" style="border:none">
            <tbody><tr>
              <td><input type="text" tabindex="1" id="myemail" placeholder="Email Address " name="email" class="inputtext radius1" value=""></td>
              <td><input type="password" tabindex="2" id="mypassword" placeholder="Password" name="pass" class="inputtext radius1"></td>
              <td><input type="submit" class="fbbutton" name="accessaccount" id="accessaccount" value="Sign in">  <div id="loginwarning">
            </div>  </td>
            </tr>
            <tr>
            <td><label><input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"><span style="color:#ccc;">Remember Me</span></label>
            </td>
            <td><label><a href="password_reset.php" style="color:#ccc; text-decoration:none">forgot your password?</a></label></td>
            </tr>
          </tbody></table>
        </form>
      </div>
          </div>
      </div>
</div>
<!-- header ends here -->

<h4  style="margin-left:70px;color:#084B8A; font-size:17px; font-style:font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; ">Welcome to Personhub , Get Connected to professionals ,Sellers & Buyers, Post Job Ads, chat  </h4>
<h4  style="margin-left:70px;color:#084B8A; font-size:17px; font-style:font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; ">Job Opportunities, advertise or  Promote your Products here , Read News , Business Directory...</h4>





<div class="loginbox radius" style="">
<h2 style="color:#141823; text-align:center;">Get started – it’s free.</h2>
	<div class="loginboxinner radius">
    	<div class="loginheader">
    		<h2 class="title">Share your , Life Experience, Create a Store and Much More</h2>
    	</div><!--loginheader-->
        
        <div class="loginform">
                	
        	<form id="login" action="#" method="post">
            <p>
                    <input type="text" id="firstname" name="username" placeholder="First Name" value="" class="radius mini"> <input type="text" id="lastname" name="username" placeholder="Last Name" value="" class="radius mini">
                </p>
            	<p>
                    <input type="text" id="primaryemail" name="username" placeholder="Your Email" value="" class="radius">
                </p>
                <p>
                    <input type="password" id="password" name="password" placeholder="Password" class="radius">
                </p>
                <p>
                    <input type="password" id="password2compare" name="password" placeholder="Confirm Password" class="radius">
                </p>
                
                <p>
                <a href="center/terms.html">By clicking Join Now, you agree to Personhub's User Agreement</a>, Privacy Policy and Cookie Policy.

                </p>
                
                <p>
                	<button class="radius title" id="createaccount" name="client_login">Sign Up</button>
                </p>
                
                 <div id="warning"></div>
            </form>
        </div><!--loginform-->
    </div><!--loginboxinner-->
</div><!--loginbox-->




<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50826608-1', 'personhub.com');
  ga('send', 'pageview');

</script>




<div id="footer" align="center" style="border-top:1px double #EEEEEE; background:#FFF">
<div class="wrapper">
  <a href="directory/" title="">Business Directiry&nbsp;&nbsp;&nbsp;</a><a href="news/" title="">World News &nbsp;&nbsp;&nbsp;</a><a href="center/about-us.html" title="">About us &nbsp;&nbsp;&nbsp;</a> <a href="webdesign/contact-us.php" title="">Feedback&nbsp;&nbsp;&nbsp;</a> <a href="center/contact-us.php" title="">Helps&nbsp;&nbsp;&nbsp;</a> <a href="center/contact-us.php" title="">Contact Us&nbsp;&nbsp;&nbsp;</a>  <a href="webdesign/" title="">Developper&nbsp;&nbsp;&nbsp;</a>  <a href="Jobs/" title="">Advitiser&nbsp;&nbsp;&nbsp;</a>  <a href="directory/" title="">Report a Friend&nbsp;&nbsp;&nbsp;</a><a href="center/terms.html" title="Agreement.html">Terms and Conditions&nbsp;&nbsp;&nbsp;</a> <a href="center/privacy.html" title="">Policy&nbsp;&nbsp;&nbsp;</a><span>&copy; Copyright 2014. All rights reserved. <a href="index.php" style="color:black" title="">personhub by Mulumba Otepa fabrice</a></span>
  


</div>

  
  
    </div>
</body>
</html>
