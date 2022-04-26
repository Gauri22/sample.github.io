<?php 
require_once('includes/config.php');

$errors = array();

$users = new users;

if (isset($_POST['login']))
{
	$errors = $users->validate_login();

	if(!count($errors))
	{
		$condition = "email='".$_POST['email']."' and password = md5('".$_POST['password']."')";

		$check = $users->select($users->table,'',$condition);

		
		if (isset($check[0]['id'])) 
		{
			
			$_SESSION['Auth'] = $check[0];

			
			unset($check[0]['password']);
            $rslt1 = "Login Successfully.";
			header("Location:add_guest.php");
		}
		else
		{
			$rslt = "Login Failed. Please try again.";
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Guestbook</title>
        <link rel="stylesheet" href="css/base.css" type="text/css" media="screen" />
        <link rel="stylesheet" id="current-theme" href="css/bec/style1.css" type="text/css" media="screen" />
    </head>

    <body>
        <div id="container">
            <div id="header">
                <h1><a href="index.php">OnlineStudy4U</a></h1>


            </div>
            <div id="wrapper" class="wat-cf">


                <div id="box">

                    <div class="block" id="block-login">
                        <h2>Login</h2>
                        <div class="content login">
                            <?php if (count($errors)>0) { ?>
                            <div class="flash">
                                <div class="messsage error">
                                    <p>
                                        <?php echo implode('<br>',$errors); ?>

                                    </p>
                                </div>
                            </div>

                            <?php } ?>
                            <?php if(isset($rslt)){?>
                            <div class="flash">
                                <div class="message error">
                                    <p>
                                        <?php echo $rslt;?>
                                    </p>
                                </div>
                            </div>
                            <?php }?>

                            <?php if(isset($rslt1)){?>
                            <div class="flash">
                                <div class="message notice">
                                    <p>
                                        <?php echo $rslt1;?>
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
                                        <label class="label right">Email Address</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" class="text_field" name="email" />
                                    </div>
                                </div>
                                <div class="group wat-cf">
                                    <div class="left">
                                        <label class="label right">Password</label>
                                    </div>
                                    <div class="right">
                                        <input type="password" class="text_field" name="password" />
                                    </div>
                                </div>
                                <div class="group navform wat-cf">
                                    <div class="right">
                                        <button class="button" type="submit" name="login">
                                            <img src="img/key.png" alt="Save" /> Login
                                        </button>
                                        <span class="text_button_padding">or</span>
                                        <a class="text_button_padding link_button" href="index.php">Sign up on index
                                            page
                                        </a>


                                    </div>
                                </div>

                            </form>
                            <div class="group navform wat-cf">
                                <div class="right">

                                    <span class="text_button_padding">If you forgot the password. Please click on <a
                                            class="text_button_padding link_button" style="float:right;padding-top:0px;"
                                            href="forgot_password.php">Forgot Password</a></span>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

    </body>

</html>