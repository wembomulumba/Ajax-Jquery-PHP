<?php
define ('DBPATH','localhost');
define ('DBUSER','personhu_root');
define ('DBPASS','3D600I9T5JOT');
define ('DBNAME','personhu_profiledb');


session_start();



global $dbh;

$dbh = mysql_connect(DBPATH,DBUSER,DBPASS);

mysql_selectdb(DBNAME,$dbh);



if ($_GET['action'] == "chatheartbeat") { chatHeartbeat(); }

if ($_GET['action'] == "sendchat") { sendChat(); }

if ($_GET['action'] == "closechat") { closeChat(); }

if ($_GET['action'] == "startchatsession") { startChatSession(); } 



if (!isset($_SESSION['chatHistory'])) {

	$_SESSION['chatHistory'] = array();

}



if (!isset($_SESSION['openChatBoxes'])) {

	$_SESSION['openChatBoxes'] = array();	

}



function chatHeartbeat() {

	

	$sql = "select * from chat where (chat.to = '".mysql_real_escape_string($_COOKIE['surname'])."' AND recd = 0) order by id ASC";

	$query = mysql_query($sql);

	$items = '';



	$chatBoxes = array();



	while ($chat = mysql_fetch_array($query)) {



		if (!isset($_SESSION['openChatBoxes'][$chat['from']]) && isset($_SESSION['chatHistory'][$chat['from']])) {

			$items = $_SESSION['chatHistory'][$chat['from']];

		}



		$chat['message'] = sanitize($chat['message']);



		$items .= <<<EOD

					   {

			"s": "0",

			"f": "{$chat['from']}",

			"m": "{$chat['message']}"

	   },

EOD;



	if (!isset($_SESSION['chatHistory'][$chat['from']])) {

		$_SESSION['chatHistory'][$chat['from']] = '';

	}



	$_SESSION['chatHistory'][$chat['from']] .= <<<EOD

						   {

			"s": "0",

			"f": "{$chat['from']}",

			"m": "{$chat['message']}"

	   },

EOD;

		

		unset($_SESSION['tsChatBoxes'][$chat['from']]);

		$_SESSION['openChatBoxes'][$chat['from']] = $chat['sent'];

	}



	if (!empty($_SESSION['openChatBoxes'])) {

	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {

		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {

			$now = time()-strtotime($time);

			$time = date('g:iA M dS', strtotime($time));



			$message = "Seen at $time";

			if ($now > 180) {

				$items .= <<<EOD

{

"s": "2",

"f": "$chatbox",

"m": "{$message}"

},

EOD;



	if (!isset($_SESSION['chatHistory'][$chatbox])) {

		$_SESSION['chatHistory'][$chatbox] = '';

	}



	$_SESSION['chatHistory'][$chatbox] .= <<<EOD

		{

"s": "2",

"f": "$chatbox",

"m": "{$message}"

},

EOD;

			$_SESSION['tsChatBoxes'][$chatbox] = 1;

		}

		}

	}

}



	$sql = "update chat set recd = 1 where chat.to = '".mysql_real_escape_string($_COOKIE['surname'])."' and recd = 0";

	$query = mysql_query($sql);



	if ($items != '') {

		$items = substr($items, 0, -1);

	}

header('Content-type: application/json');

?>

{

		"items": [

			<?php echo $items;?>

        ]

}



<?php

			exit(0);

}



function chatBoxSession($chatbox) {

	

	$items = '';

	

	if (isset($_SESSION['chatHistory'][$chatbox])) {

		$items = $_SESSION['chatHistory'][$chatbox];

	}



	return $items;

}



function startChatSession() {

	$items = '';

	if (!empty($_SESSION['openChatBoxes'])) {

		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {

			$items .= chatBoxSession($chatbox);

		}

	}





	if ($items != '') {

		$items = substr($items, 0, -1);

	}



header('Content-type: application/json');

?>

{

		"username": "<?php echo $_COOKIE['surname'];?>",

		"items": [

			<?php echo $items;?>

        ]

}



<?php





	exit(0);

}



function sendChat() {

	$from = $_COOKIE['surname'];

	$to = $_POST['to'];

	$message = $_POST['message'];



	$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());

	

	$messagesan = sanitize($message);



	if (!isset($_SESSION['chatHistory'][$_POST['to']])) {

		$_SESSION['chatHistory'][$_POST['to']] = '';

	}



	$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD

					   {

			"s": "1",

			"f": "{$to}",

			"m": "{$messagesan}"

	   },

EOD;

























include ('dbcon/dbconn.php');

$checklogin2 = "select * from  profile WHERE firstname = '$from' limit 1";

$resquery = mysql_query($checklogin2,$connectionstring);







                          if($row= mysql_fetch_array($resquery)){ 

						 

						  

						   $profileimage = $row['photo'];

						 

						 

		

						   }




	unset($_SESSION['tsChatBoxes'][$_POST['to']]);



	$sql = "insert into chat (chat.from,chat.to,message,sent,photo) values ('".mysql_real_escape_string($from)."', '".mysql_real_escape_string($to)."','".mysql_real_escape_string($message)."',NOW(),'$profileimage')";

	$query = mysql_query($sql);

	echo "1";

	exit(0);

}



function closeChat() {



	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);



	echo "1";

	exit(0);

}



function sanitize($text) {

	$text = htmlspecialchars($text, ENT_QUOTES);

	$text = str_replace("\n\r","\n",$text);

	$text = str_replace("\r\n","\n",$text);

	$text = str_replace("\n","<br>",$text);

	return $text;

}