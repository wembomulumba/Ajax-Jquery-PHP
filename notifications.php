<?php  
 
 include("Notification.php");  
 $id = "otepa";  
 $notification = new Notification();  
 $notification->to_user = $id;  
 $notifications = $notification->getAllNotifications();  
 if ($notifications) {  
   echo $notification->newcount . "|";  
   $unseen_ids = array();  
   while ($object = mysql_fetch_object($notifications)) {  
     if ($object->seen == 0) $unseen_ids[] = $object->id;  
     switch($object->type) {  
       case "friend_request":  
         ?>  
         <li id="notification_<?=$object->id;?>">  
           <div style="width:350px;padding:5px;">  
             <a href="profile.php?id=<?=$object->from_user;?>"><img src="<?=$object->defaultpic;?>" style="float:left;" width="50px" height="50px"/>&nbsp;<?=$displayName;?></a> would like to be your friend!<br />  
             &nbsp;<a href="#" onclick="HandleRequest('accept','<?=$object->from_user;?>');">Accept</a>&nbsp;&nbsp;<a href="#" onclick="HandleRequest('deny','<?=$object->from_user;?>');">Deny</a>  
           </div><br style="clear:both;"/>  
         </li>  
         <?php  
         break;  
       case "mail":  
         ?>  
         <li id="notification_<?=$object->id;?>">  
           <div style="width:350px;padding:5px;">  
             <a href="profile.php?id=<?=$object->from_user;?>"><img src="<?=$object->defaultpic;?>" width="50px" height="50px"/></a>&nbsp;<a href="message.php?id=<?=$object->reference;?>"><?=$displayName;?> has sent you a message!</a>  
             <a href="javascript:void(0)" onclick="DeleteNotification(<?=$object->id;?>)" style="float:right;"><i class="icon-trash"></i></a>  
           </div>  
         </li>  
         <?php  
         break;  
                     //TODO: add cases for other notifications  
     }  
   }  
   echo "|".json_encode($unseen_ids);  
 }  
 ?>  