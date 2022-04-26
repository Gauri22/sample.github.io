<?php
class guests extends DB
{
	var $table = "guests";

	function validate_guests()
	  {
		  $errors = array();
		  
		  if(empty($_POST['name']))
		  {
			  $errors['name'] = "Please enter name.";
		  }
		  elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['name']))
		  {
				$errors['name'] = "Please enter valid name.";
		  }
				
		
		  if(empty($_POST['email']))
		  {
			  $errors['email'] = "Please enter email address.";
		  }
		  elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		  {
				$errors['email'] = "Please enter valid email address.";
		  }
				
		  if(empty($_POST['address']))
			{
			$errors['address'] = "Please enter valid address";
			}
		  
		   if(empty($_POST['phone_no']))
		   {
			  $errors['phone_no'] = "Please enter phone no.";
		   }
		  elseif(!preg_match("#^[0-9 -]*$#",$_POST['phone_no']))
		  {
				$errors['phone_no'] = "Please enter valid phone no.";
		  }
				
			if(empty($_POST['gender']))
			{
			$errors['gender'] = "Please enter gender";
			}
			
				
			if(empty($_FILES['avatar']['name']))
			{
			$errors['avatar'] = "Please upload photo";
			}

			
			$types = array('image/jpeg','image/jpg','image/png');
			if($_FILES['avatar']['error'] == 0 && !in_array($_FILES['avatar']['type'], $types))
				$errors['avatar'] = "Please upload the image of valid type.";
			
			if(empty($_POST['hobbies']))
			{
			$errors['hobbies'] = "Please enter hobbies";
			}

		  return $errors;
	  }

}

?>