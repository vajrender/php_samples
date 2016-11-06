<?php
  error_reporting(0);
 require 'security.php';
 require 'config.php';
 
 $records = array();
 
 if(!empty($_POST)){
	 if(isset($_POST['id'],$_POST['firstname'],$_POST['lastname'],$_POST['bio'])){
		 
		 $id = mysqli_real_escape_string($db,$_POST['id']);
		 $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
		 $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
		 $bio =      mysqli_real_escape_string($db,$_POST['bio']);
		 
		 if(!empty($id) && !empty($firstname) && !empty($lastname) && !empty($bio)){
			 
			 $insert = $db->prepare("insert into people(id,firstname,lastname,bio,created) values (?, ?, ?, ?, NOW())");
			 $insert->bind_param('isss',$id,$firstname,$lastname,$bio);
			 
			 if($insert->execute()){
				 header('Location: insert.php');
				 die();
			 }
		 }	 
	 }
 }
 
 if($results = $db->query("select * from people")){
	 if($results->num_rows){
		 while($row = $results->fetch_object()){
			 $records[] = $row;
		 }
		 $results->free();
	 }
 }
 ?>
 
 <html>
 <head>
 <title> insert values </title>
 <link rel = "stylesheet" type = "text/css" href="style.css">
 </head>
 <body>
 <?php
 if(!count($records)){
	 echo 'No records';
 }
 else{
?>
 <table>
 <thead>
 <tr>
     <th>FirstName</th>
	 <th>LastName</th>
	 <th>Bio</th>
	 <th>Created</th>
 </tr>
 </thead>
 <tbody>
 <?php
   foreach($records as $r){
?>
 <tr>
     <td> <?php echo escape($r->firstname) ?> </td>
	 <td> <?php echo escape($r->lastname) ?>  </td>
	 <td> <?php echo escape($r->bio) ?>  </td>
	 <td> <?php echo escape($r->created) ?>  </td>
 </tr>
 <?php
   }
 ?>
 </tbody>
 </table>
 <?php
 }
 ?>
 <hr>
 
 <form action = "" method = "post">
 <table>
 
 <tr>
 <div class = "field">
 <td><label for="id"> id </label></td>
 <td><input type="text" name = "id" id="id"></td>
 </div>
 </tr>
 
 <tr>
 <div class = "field">
 <td><label for="firstname"> firstname </label></td>
 <td><input type="text" name = "firstname" id="firstname"></td>
 </div>
 </tr>
 
 <tr>
 <div class = "field">
 <td><label for="lastname"> lastname </label></td>
 <td><input type="text" name = "lastname" id="lastname"></td>
 </div>
 </tr>
 
 <tr>
 <div class = "field">
 <td><label for="bio"> bio </label></td>
 <td><textarea name = "bio" id="bio"></textarea></td>
 </div>
 </tr>
 
 <tr>
 <input type ="submit" value = "insert">
 </tr>
 
  </table>
 </form>

 </body>
 </html>

  
   
