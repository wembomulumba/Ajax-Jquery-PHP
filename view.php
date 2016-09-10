<?php

//GOES TO ID 1 AUTOMATICALLY IF THERE'S NO ID IN THE URL
if(!$_GET["id"]){
    header("Location: Home.php?id=1");
} else {
    $id = $_GET["id"];
}

include("db.php"); //INCLUDES THE IMPORTANT MySQL SETTINGS

$q = mysql_query("SELECT * FROM $content WHERE id='$id'"); //GETS THE CONTENT ID
$r = mysql_fetch_assoc($q);
$con = $r["content"]; //CONTENT OF THE ID
$id = $r["id"]; //NEW ID VARIABLE, USED TO CHECK IF IT'S IN THE DATABASE

?>
<script src="http://wcetdesigns.com/assets/javascript/jquery.js"></script>
<script>
function rate(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data = 'rating='+rating+'&id=<?php echo $id; ?>';

$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings").html(e); //REPLACES THE TEXT OF view.php
}
});
}
</script>
<style>
/*GIVES THE POINTER TO THE BUTTONS ON MOUSEOVER*/
#like, #dislike {
cursor: pointer;
}
</style>
<?php

//IF $id EXISTS, THEN COUNT LIKES & DISLIKES
if($id){
    include 'headers.php'; //FILE WITH THE NUMBER OF RATINGS, BUTTON IMAGE URLS, AND WHETHER USER HAS RATED

    //EVERYTHING HERE DISPLAYED IN HTML
    echo $con.'<br><br><br><div id="ratings">'.$m.'</div>';
}
else
{
    echo "Invalid ID";
}

?>