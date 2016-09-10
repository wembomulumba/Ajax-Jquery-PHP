<?php
require_once('dbcon/dbconn.php');
include('../JControllers/checksessions.php');
include('Basicinfo.php');

$description =   addslashes($_REQUEST['description']);
$posted_by = $surname;
$userid = $surname;
$photo = $profileimage;


$cover = $_REQUEST['cover'];
$EVENT_START_TIME = $_REQUEST['EVENT_START_TIME'];
$EVENT_END_TIME = $_REQUEST['EVENT_END_TIME'];
$EVENT_LOCATION = $_REQUEST['EVENT_LOCATION'];
$EVENT_CREATOR_ID = $surname;
$EVENT_NAME = $_REQUEST['EVENT_NAME'];
$EVENT_DESCRIPTION = addslashes($_REQUEST['EVENT_DESCRIPTION']);
$EVENT_HOST = $_REQUEST['EVENT_HOST'];



$createevent = "INSERT INTO events (photo, cover,EVENT_START_TIME, EVENT_END_TIME,EVENT_LOCATION,EVENT_CREATOR_ID,EVENT_NAME,EVENT_DESCRIPTION,EVENT_HOST)  VALUES ('$photo','$cover','$EVENT_START_TIME','$EVENT_END_TIME','$EVENT_LOCATION','$EVENT_CREATOR_ID','$EVENT_NAME','$EVENT_DESCRIPTION','$EVENT_HOST')";
mysql_query($createevent,$connectionstring);	
							   		
?>