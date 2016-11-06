<?php
  error_reporting(0);
 require 'security.php';
 require 'config.php';
  
  $username = mysqli_real_escape_string($db,$_POST['user']);
  $password = mysqli_real_escape_string($db,$_POST['pass']);
  
   $sql = "select id from user where username = '$username' and password = '$password' ";
   
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $count = mysqli_num_rows($result);
   
   if($count == 1){
	   echo "login successful. Welcome " .$username;
   }
   else{
	   echo "failed to login";
   }
   
?>