<?php

class users extends DB
{
	var $table = "users";

	function validate_signup()
	{
		$errors = array();

		if (empty($_POST['name']))
		{
			$errors['name'] = "You must enter your Name";
		}
		elseif(!preg_match("#^[-A-Za-z' ]*$#", $_POST['name']))
		{
			$errors['name']="Please enter valid name";
		}

		if (empty($_POST['email']))
		{
		 	$errors['email'] = "You must enter email";
		}
		elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
		{
			$errors['email'] = "Please enter valid email";
		}

		if (empty($_POST['password'])) 
		{
			$errors['password']  = "You must enter Password";
		}

		return $errors;
	}

	function validate_login()
	{
		$errors = array();
		
		if (empty($_POST['email']))
		{
		 	$errors['email'] = "You must enter email";
		}
		elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
		{
			$errors['email'] = "Please enter valid email";
		}

		if (empty($_POST['password'])) 
		{
			$errors['password']  = "You must enter Password";
		}

		return $errors;
	}

	function validate_forgot()
	{
		$errors = array();

		if (empty($_POST['email']))
		{
		 	$errors['email'] = "Enter your registered email";
		}
		elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
		{
			$errors['email'] = "Please enter valid email";
		}

		return $errors;
	}
	

	function validate_password()
	{
		$errors = array();

		if (empty($_POST['oldpassword'])) 
		{
			
			$errors['oldpassword'] = "Please enter old password";
		}
		if (empty($_POST['newpassword'])) 
		{
			
			$errors['newpassword'] = "Please enter new password";
		}
		if (empty($_POST['confirmpassword'])) 
		{
			
			$errors['confirmpassword'] = "Please enter confirm password";
		}

		return $errors;
	}
}
  ?>