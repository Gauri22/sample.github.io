<?php 
require_once('includes/config.php');

$errors = array();


if (isset($_POST['send'])) 
{
	$users = new users;

	$errors = $users->validate_forgot();

	
	if (!count($errors)) 
	{
		$condition = "email='".$_POST['email']."' ";

		
		$check = $users->select($users->table,'',$condition);

		
		if (!count($check)) 
		{
			$rslt1 = "Email id is not registered";
		}
		else
		{
			
			$password = rand();

		
			$_POST['password'] = md5($password);

			$_POST['modified'] = date('Y-m-d h:m:s');

			$condition = "id='".$check[0]['id']."'";
			
			$sql = $users->save($users->table,$_POST,$condition);

		
			$rslt = $password;
		}
	}
}
if (isset($_POST['login'])) {
    header("Location:index.php");
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
                <h1><a href="index.php">Forgot Password</a></h1>


            </div>
            <div id="wrapper" class="wat-cf">


                <div id="box">

                    <div class="block" id="block-signup">
                        <h2>Sign up</h2>
                        <div class="content">
                            <?php if (count($errors)>0) { ?>
                            <div class="flash">
                                <div class="messsage error">
                                    <p>
                                        <?php echo implode('<br>',$errors); ?>

                                    </p>
                                </div>
                            </div>

                            <?php } ?>

                            <?php if (isset($rslt1)) { ?>
                            <div class="flash">
                                <div class="messsage notice">
                                    <p>
                                        <?php echo $rslt1; ?>

                                    </p>
                                </div>
                            </div>

                            <?php } ?>

                            <?php if (isset($rslt)) { ?>
                            <div class="flash">
                                <div class="messsage notice">
                                    <p>
                                        <?php echo "Your New Password:" .$rslt; ?>

                                    </p>
                                </div>
                            </div>

                            <?php } ?>

                            <form method="post" enctype="multipart/form-data" class="form">
                                <div class="group wat-cf">
                                    <div class="left">
                                        <label class="label">Email</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" class="text_field" name="email" />
                                        <span class="description">Ex: test@example.com</span>
                                        <div class="error">Please enter email.</div>
                                    </div>
                                </div>

                                <div class="group navform wat-cf">
                                    <button class="button" type="submit" name="send">
                                        <img src="img/tick.png" alt="Save" /> Send
                                    </button>

                                    <button class="button" type="submit" name="login">
                                        <img src="img/tick.png" alt="Save" /> Login to continue.
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

    </body>

</html>