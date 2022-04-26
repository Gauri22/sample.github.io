<?php
require_once('includes/config.php');
$errors = array();
$guests = new guests;

if (!isset($_SESSION['Auth']['id'])) 
{
 	header("Location:login.php");
 	exit;
}

if (isset($_POST['add'])) 
{
	$errors = $guests->validate_guests();

 	if (!count($errors)) 
 	{
 		$_POST['user_id'] = $_SESSION['Auth']['id'];

 		if (isset($_POST['hobbies'])) 
 		{
 			$_POST['hobbies'] = implode(',', $_POST['hobbies']);
 		}

 		if ($_FILES['avatar']['error'] == 0) 
 		{
 			
 			$src = $_FILES['avatar']['tmp_name'];
 			
 			$dest = FTP_AVATAR_DIR.$_FILES['avatar']['name'];

 			if (move_uploaded_file($src, $dest)) 
 			{
 				$_POST['avatar'] = $_FILES['avatar']['name'];
 			}
 		}

 		$_POST['created'] = date('Y-m-d h:m:s');
 		if ($guests->save($guests->table,$_POST)) 
 		{
 			$_SESSION['message'] = "Guest Inserted Successfully";
 			header("Location:success.html");
 			exit;
  		}
 	} 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>registration</title>
        <link rel="stylesheet" href="css/base.css" type="text/css" media="screen" />
        <link rel="stylesheet" id="current-theme" href="css/bec/style1.css" type="text/css" media="screen" />
    </head>

    <body>
        <div id="container">
            <div id="header">
                <h1><a href="index.php">Registration</a></h1>
                <div id="user-navigation">
                    <ul class="wat-cf">
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a class="logout" href="logout.php">Logout</a></li>
                    </ul>
                </div>

            </div>
            <div id="wrapper" class="wat-cf">
                <div id="main">



                    <div class="block" id="block-forms">
                        <div class="secondary-navigation"></div>
                        <div class="content">
                            <h2 class="title">Fill Your Information</h2>
                            <div class="inner">
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
                                <form action="#" method="POST" class="form" enctype="multipart/form-data">
                                    <div class="group">
                                        <label class="label">Name<span class="mandatory">*</span></label>

                                        <input type="text" class="text_field" name="name"
                                            value="<?php echo isset($_POST['name='])?$_POST['name']:'';?>" />
                                        <span class="description">Ex: Gauri Itankar</span>
                                        <?php if(isset($errors['name'])){?> <div class="error">
                                            <?php echo $errors['name'];?> </div>
                                        <?php }?>
                                    </div>
                                    <div class="group">
                                        <div class="fieldWithErrors">
                                            <label class="label" for="post_title">Email Id</label>
                                        </div>
                                        <input type="text" class="text_field" name="email"
                                            value="<?php echo isset($_POST['email='])?$_POST['email']:'';?>" />
                                        <span class="description">Ex: test@example.com</span>
                                        <?php if(isset($errors['email'])){?> <div class="error">
                                            <?php echo $errors['email'];?> </div>
                                        <?php }?>
                                    </div>
                                    <div class="group">
                                        <label class="label">Address</label>
                                        <textarea class="text_area" rows="5" cols="80" name="address"
                                            value="<?php echo isset($_POST['email='])?$_POST['email']:'';?>"></textarea>
                                        <span class="description">Write here a long text</span>
                                        <?php if(isset($errors['address'])){?> <div class="error">
                                            <?php echo $errors['address'];?> </div>
                                        <?php }?>
                                    </div>
                                    <div class="group">
                                        <div class="fieldWithErrors">
                                            <label class="label" for="post_title">Phone No.</label>
                                        </div>
                                        <input type="text" class="text_field" name="phone_no"
                                            value="<?php echo isset($_POST['phone_no'])?$_POST['phone_no']:''; ?>" />

                                        <span class="description">Ex: ten Digit number</span>
                                        <?php if(isset($errors['phone_no'])){?> <div class="error">
                                            <?php echo $errors['phone_no'];?> </div>
                                        <?php }?>
                                    </div>
                                    <div class="group">
                                        <div class="fieldWithErrors">
                                            <label class="label" for="post_title">Gender</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="text_field" name="gender" value="M"
                                                <?php echo isset($_POST['gender']) && $_POST['gender'] == 'M '?'checked':'';?> />
                                            <label class="radio">Male</label>&nbsp;
                                            <input type="radio" class="text_field" name="gender" value="F"
                                                <?php echo isset($_POST['gender']) && $_POST['gender'] == 'F '?'checked':'';?> />
                                            <label class="radio">Female</label>
                                        </div>
                                    </div>
                                    <div class="group">
                                        <div class="fieldWithErrors">
                                            <label class="label" for="post_title">Avatar</label>
                                        </div>
                                        <input type="file" class="text_field" name="avatar" />
                                        <span class="description">jpeg or png</span>
                                        <?php if(isset($errors['avatar'])){?> <div class="error">
                                            <?php echo $errors['avatar'];?> </div>
                                        <?php }?>
                                    </div>
                                    <div class="group">
                                        <div class="fieldWithErrors">
                                            <label class="label" for="post_title">Hobbies</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" class="text_field" name="hobbies[]" value="Reading"
                                                <?php echo isset($_POST['hobbies']) && in_array('Reading', $_POST['hobbies'])?'checked':''; ?> />
                                            <label class="checkbox">Reading Books</label>&nbsp;
                                            <input type="checkbox" class="text_field" name="hobbies[]" value="Listening"
                                                <?php echo isset($_POST['hobbies']) && in_array('Listening', $_POST['hobbies'])?'checked':''; ?> />
                                            <label class="checkbox">Listening to Music</label>
                                        </div>
                                    </div>
                                    <div class="group navform wat-cf">
                                        <button class="button" type="submit" name="add">
                                            <img src="img/tick.png" alt="Save" /> Save
                                        </button>
                                        <span class="text_button_padding">or</span>
                                        <a class="text_button_padding link_button" href="#header">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    <div id="footer">
                        <div class="block">
                            <p>Copyright &copy; 2022 Your Site.</p>
                        </div>
                    </div>
                </div>

                <div id="sidebar">
                    <div class="block notice">
                        <h4>Notice Title</h4>
                        <p>Morbi posuere urna vitae nunc. Curabitur ultrices, lorem ac aliquam blandit, lectus eros
                            hendrerit eros, at eleifend libero ipsum hendrerit urna. Suspendisse viverra. Morbi ut
                            magna. Praesent id ipsum. Sed feugiat ipsum ut felis. Fusce vitae nibh sed risus commodo
                            pulvinar. Duis ut dolor. Cras ac erat pulvinar tortor porta sodales. Aenean tempor venenatis
                            dolor.</p>
                    </div>
                </div>

            </div>

        </div>

    </body>

</html>