<?php 
require_once('includes/config.php');

$errors = array();


$users = new users;


if (!isset($_SESSION['Auth']['id'])) 
{
	header("Location:index.php");
	exit;
}

if (isset($_POST['change'])) 
{
	$errors = $users->validate_password();

	if (!count($errors)) 
	{
		
		$condition = "id='".$_SESSION['Auth']['id']."' ";

		
		$check = $users->select($users->table,'password',$condition);

		
		if (($check[0]['password'] == (md5($_POST['oldpassword']))) && ($_POST['newpassword'] == $_POST['confirmpassword'])) 
		{
			
			$_POST['password'] = md5($_POST['newpassword']);

		
			$update[] = $users->save($users->table,$_POST,$condition);

		
			if(count($update)) 
			{
				unset($_SESSION['Auth']);
				header("Location:change_password_success.php");
				exit;
			}
			else
			{
				$_SESSION['message'] = "Password could not be changed";
				exit;
			}
		}
		else
		{
			$_SESSION['message'] = "Your current password is not matched";
		}
	}
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Change Password</title>

        <link rel="stylesheet" href="css/base.css" type="text/css" media="screen" />
        <link rel="stylesheet" id="current-theme" href="css/bec/style1.css" type="text/css" media="screen" />
    </head>

    <body>
        <div id="container">
            <div id="header">
                <h1><a href="index.php">OnlineStudy4U</a></h1>
                <div id="user-navigation">
                    <ul class="wat-cf">
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a class="logout" href="logout.php">Logout</a></li>
                    </ul>
                </div>

            </div>
            <div id="wrapper" class="wat-cf">


                <div id="box">

                    <div class="block" id="block-login">
                        <h2>Change Password</h2>
                        <div class="content login">

                            <?php if(isset($_SESSION['message'])){?>
                            <div class="flash">
                                <div class="message notice">
                                    <p>
                                        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                                    </p>
                                </div>
                            </div>
                            <?php }?>
                            <!--<div class="flash">
                                <div class="message notice">
                                    <p>Logged in successfully</p>
                                </div>
                            </div>-->
                            <form action="" class="form login" method="post" enctype="multipart/form-data">
                                <div class="group wat-cf">
                                    <div class="left">
                                        <label class="label right">Old Password:</label>
                                    </div>
                                    <div class="right">
                                        <input type="password" class="text_field" name="oldpassword" />
                                    </div>
                                </div>
                                <div class="group wat-cf">
                                    <div class="left">
                                        <label class="label right">New Password:</label>
                                    </div>
                                    <div class="right">
                                        <input type="password" class="text_field" name="newpassword" />
                                    </div>
                                </div>
                                <div class="group wat-cf">
                                    <div class="left">
                                        <label class="label right">Confirm Password:</label>
                                    </div>
                                    <div class="right">
                                        <input type="password" class="text_field" name="confirmpassword" />
                                    </div>
                                </div>
                                <div class="group navform wat-cf">
                                    <div class="right">
                                        <button class="button" type="submit" name="change" value="Change">
                                            <img src="img/key.png" alt="Save" />Change
                                        </button>

                                        <button class="button" type="submit" name="" value="">
                                            <a href="index.php">Login</a>
                                        </button>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>

    </body>



</html>