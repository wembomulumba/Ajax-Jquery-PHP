<?php  

$hostname = "localhost";
$localdatabase = "personhu_profiledb";
$dbusername = "personhu_root";
$dbpassword = "3D600I9T5JOT";
$connectionstring = mysql_connect($hostname,$dbusername,$dbpassword) or trigger_error(mysql_error(), E_USER_ERROR);
mysql_select_db($localdatabase,$connectionstring );

 class Notification {  
   var $type;  
   var $to_user;  
   var $from_user;  
   var $reference;  
   var $timestamp;  
   var $newcount; 
   
  
   public function getAllNotifications() {  
     $this->newcount = Notification::newCount($this->to_user);  
     $sql = "SELECT n.*,u.avatar,u.firstname FROM notification n INNER JOIN profile u ON u.firstname = n.to_user ORDER BY `timestamp` DESC LIMIT 10";  
     $result = mysql_query($sql, $connectionstring);  
     echo mysql_error();  
     if ($result) {  
       return $result;  
     }  
     return false; //none found  
   }  
   public function Add() {  
     $sql = "INSERT INTO notification (to_user,from_user,reference,type) VALUES ({$this->to_user},{$this->from_user},{$this->reference},'{$this->type}')";  
     mysql_query($sql,$connectionstring);  
   }  
   static function Seen($id) {  
     if (!isset($_COOKIE['surname'])) exit;  
     $sql = "UPDATE notification SET seen = 1 WHERE id = {$id} AND to_user = {$_COOKIE['surname']}";  
     mysql_query($sql,$connectionstring);  
   }  
   static function newCount($user) {  
     $sqlcnt = "SELECT count(*) FROM notification WHERE to_user = {$user} AND seen = 0";  
     $result = mysql_query($sqlcnt,$connectionstring);  
     $row = mysql_fetch_row($result);  
     return $row[0];  
   }  
   static function deleteNotification($id) {  
     if (!isset($_COOKIE['surname'])) exit;  
     $sql = "DELETE FROM notification WHERE id = {$id} AND to_user = {$_COOKIE['surname']}";  
     mysql_query($sql,$connectionstring);  
   }  
 }  
 ?>