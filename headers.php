
  <?php

if(isset($_COOKIE['email']) && isset($_COOKIE['password']))



{


$email = $_COOKIE['email'];

$password = $_COOKIE['password'];

$surname = $_COOKIE['surname'];



	include('Basicinfo.php');



   $_SESSION['username'] = $surname ;// Must be already set









}



else

{



	include('../welcome.php');

	exit();



}





?>






<?php

//COUNT LIKES & DISLIKES
$q = mysql_query("SELECT * FROM $ratings WHERE id='$id' AND rating='like'");
$likes = mysql_num_rows($q);
$q = mysql_query("SELECT * FROM $ratings WHERE id='$id' AND rating='dislike'");
$dislikes = mysql_num_rows($q);

//LIKE & DISLIKE IMAGES
$l = '../images/vote-yes-icon.png';
$d = '../images/vote-no-icon.png';

//CHECKS IF USER HAS ALREADY RATED CONTENT
$q = mysql_query("SELECT * FROM $ratings WHERE id='$id' AND user='$surname'");
$r = mysql_fetch_assoc($q); //CHECKS IF USER HAS ALREADY RATED THIS ITEM

//IF SO, THE RATING WILL HAVE A SHADOW
if($r["rating"]=="like"){
    $l = '../images/vote-yes-icon.png';
}
if($r["rating"]=="dislike"){
    $d = '../images/vote-no-icon.png';
}

//FORM & THE NUMBER OF LIKES & DISLIKES
$m = '<img id="like" witdh = "18px" height = "18px" onClick="rate($(this).attr(\'id\'))" src="'.$l.'"> '.$likes.' &nbsp;&nbsp; <img id="dislike" witdh = "18px" height = "18px" onClick="rate($(this).attr(\'id\'))" src="'.$d.'"> '.$dislikes;

?>