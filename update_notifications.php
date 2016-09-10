<?php    

 if (!isset($_COOKIE['surname'])) exit; 
 include("Notification.php"); 
 $id = $_COOKIE['surname'];  
 $action = $_REQUEST['action'];  
 switch($action) {  
   case "seen":  
     if (isset($_REQUEST['notifications'])) {  
       $notifications = json_decode($_REQUEST['notifications']);  
       foreach ($notifications as $notification) {  
         if (is_numeric($notification)) Notification::Seen($notification);  
       }  
     }  
     break;  
   case "delete":  
     $notification = $_REQUEST['notification'];  
     if (is_numeric($notification)) Notification::deleteNotification($notification);  
     break;  
 }  
 ?>  