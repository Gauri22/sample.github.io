<?php 
require_once("includes/config.php");

$errors = array();
$users = new users;

if(isset($_POST['Signup']))
{
	$errors  = $users->validate_signup();

	if(!count($errors))
	{

		$condition = "email= '".$_POST['email']."' " ;

		$check = $users->select($users->table,'email',$condition);

		if(count($check))
		{
			$rslt = "This Email is already registered";
		}
		else
		{
			$_POST['password'] = md5($_POST['password']);

			$_POST['created'] = date('Y-m-d h:m:s');

			$sql[] = $users->save($users->table,$_POST);

			if (count($sql)) 
			{
				header("Location:login.php");
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i"
            rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/owl.carousel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />






    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Header section -->
        <header class="header-section sticky-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="site-logo"
                            style="color: white; font-size:35px; font-weight:bold;font-family:Georgia, 'Times New Roman', Times, serif">
                            OnlineStudy4U
                        </div>
                        <div class="nav-switch">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <a href="login.php" class="site-btn header-btn">Login</a>
                        <nav class="main-menu">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#aboutUs">About us</a></li>
                                <li><a href="#courses">Courses</a></li>
                                <li><a href="add_guest.php">Register</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header section end -->


        <!-- Hero section -->
        <section class="hero-section set-bg" data-setbg="img/bg.jpg">
            <div class="container">
                <div class="hero-text text-white">
                    <h2>Get The Best Online Courses</h2>
                    <p>The students are demanding the learning spport that is appropriate for their situation or
                        context. Nothing more, nothing less.<br>and they want it at the moment the need arises. Online
                        learning will be a key for providing that learning
                        support.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <?php if(isset($rslt)){?>
                        <div class="flash">
                            <div class="message msg">
                                <p>
                                    <?php echo $rslt;?>
                                </p>
                            </div>
                        </div>
                        <?php }?>

                        <form class="intro-newslatter" method="POST" enctype="multipart/form-data" action="">
                            <?php if(isset($errors['name'])){?> <div class="msg" style="color: white;">
                                <?php echo $errors['name'];?> </div>
                            <?php }?>
                            <input type="text" placeholder="Name" name="name"
                                value="<?php echo isset($_POST['name='])?$_POST['name']:'';?>">

                            <?php if(isset($errors['email'])){?> <div class="msg" style="color: white;">
                                <?php echo $errors['email'];?> </div>
                            <?php }?>
                            <input type="text" class="" placeholder="E-mail" name="email"
                                value="<?php echo isset($_POST['email='])?$_POST['email']:'';?>">

                            <?php if(isset($errors['password'])){?> <div class="msg" style="color: white;">
                                <?php echo $errors['password'];?> </div>
                            <?php }?>
                            <input type="password" class="" placeholder="password" name="password"
                                value="<?php echo isset($_POST['password='])?$_POST['password']:'';?>">

                            <button class="site-btn" name="Signup">Sign Up Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero section end -->


        <section id="aboutUs">
            <div class="inner_wrapper about-us aboutUs-container fadeInLeft animated wow bg-light">
                <div class="container">
                    <BR></BR>
                    <h1 style="text-align: center;"> About Us</h1>
                    <h6 style="text-align: center;"> Our courses are perfect source of education inspiration.</h6>
                    <div class=" inner_section"><br> <br>
                        <div class="row">
                            <div class="col-md-6"> <img class="img-fluid fadeInLeftBig delay-9s animated wow"
                                    src="img/linkedin-sales-solutions-1LyBcHrH4J8-unsplash.jpg" align=""> </div>
                            <div class="col-md-6">
                                <p>We are offering all our fantastic classes online. If you want to try one week of
                                    online classes, we are offering 1 week trail at half-price. All of the classes are
                                    taught by the Wonderful teachers. we use video conferencing
                                    calls so you will get lots of opportunity to practise your speaking with students
                                    from all over the world!
                                </p>

                                <p>Why We take online courses with Everest?
                                </p>

                                <ul class="about-us-list">
                                    <li class="points">🌍 MEET OTHER STUDENT FROM AROUND THE WORLD</li>
                                    <li class="points">🧑‍🏫 ACCREDITED, EXPERIENCED TEACHERS</li>
                                    <li class="points">🏛️ LIVE INTERACTIVE CLASSES</li>
                                    <li class="points">📚 FLEXIBLE, STUDY FROM ANY COUNTRY IN THW WORLD </li>
                                    <li class="points">📈 CLASSES AVAILABLE AT ALL LEVELS</li>
                                    <li class="points">👉 START CLASSES ON ANY MONDAY</li>
                                    <li class="points">⏲️ STRUCTURED CLASSES AT THE SAME TIME EVERY DAY</li>
                                    <li class="points">👍 ALLMATERIAL PROVIDED ONLINE</li>
                                    <BR></BR>
                                    <BR></BR>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- categories section -->
        <section class="categories-section spad" id="courses">
            <div class="container">
                <div class="section-title">
                    <h2>Our Course Categories</h2>
                    <p>If you want to expand your knowledge at home but aren't sure what to learn, our list of learning
                        ideas ad courses is the perfect source of education inspiation.</p>
                </div>
                <div class="row">
                    <!-- categorie -->
                    <div class="col-lg-4 col-md-6">
                        <div class="categorie-item">
                            <div class="ci-thumb set-bg" data-setbg="img/categories/1.jpg"></div>
                            <div class="ci-text">
                                <h5>IT Development</h5>
                                <p> Software Development From A to Z - OOP, UML, Agile, Python, Application Security</p>
                                <span> RS. 700 <button><a href="card1.html"> Buy Now</a>
                                    </button></span>
                            </div>
                        </div>
                    </div>
                    <!-- categorie -->
                    <div class="col-lg-4 col-md-6">
                        <div class="categorie-item">
                            <div class="ci-thumb set-bg" data-setbg="img/categories/2.jpg"></div>
                            <div class="ci-text">
                                <h5>Web Design</h5>
                                <p>Professional Learning with Projects</p>
                                <span> RS. 500 <button><a href="card.html"> Buy Now</a>
                                    </button></span>

                            </div>
                        </div>
                    </div>
                    <!-- categorie -->
                    <div class="col-lg-4 col-md-6">
                        <div class="categorie-item">
                            <div class="ci-thumb set-bg" data-setbg="img/categories/3.jpg"></div>
                            <div class="ci-text">
                                <h5>Illustration & Drawing</h5>
                                <p>Portrait Sketchbooking, Explore the Human Face, Creative Watercolor Sketching for
                                    Beginners</p>
                                <span> RS. 300 <button><a href="card2.html"> Buy Now</a>
                                    </button></span>

                            </div>
                        </div>
                    </div>
                    <!-- categorie -->
                    <div class="col-lg-4 col-md-6">
                        <div class="categorie-item">
                            <div class="ci-thumb set-bg" data-setbg="img/categories/4.jpg"></div>
                            <div class="ci-text">
                                <h5>Social Media</h5>
                                <p>Online Marketing Courses to Improve Your Social Media Skills</p>
                                <span> RS. 200 <button><a href="card3.html"> Buy Now</a>
                                    </button></span>

                            </div>
                        </div>
                    </div>
                    <!-- categorie -->
                    <div class="col-lg-4 col-md-6">
                        <div class="categorie-item">
                            <div class="ci-thumb set-bg" data-setbg="img/categories/5.jpg"></div>
                            <div class="ci-text">
                                <h5>Photoshop</h5>
                                <p>Top Photoshop courses in Graphic Design & Illustration,Adobe Photoshop CC, Advanced
                                    Training Course </p>
                                <span> RS. 400 <button><a href="card4.html"> Buy Now</a>
                                    </button></span>

                            </div>
                        </div>
                    </div>
                    <!-- categorie -->
                    <div class="col-lg-4 col-md-6">
                        <div class="categorie-item">
                            <div class="ci-thumb set-bg" data-setbg="img/categories/6.jpg"></div>
                            <div class="ci-text">
                                <h5>Cryptocurrencies</h5>
                                <p> Bitcoin and Cryptocurrencies, Blockchain Fundamentals, FinTech…</p>
                                <span> RS. 900 <button><a href="card5.html"> Buy Now</a>
                                    </button></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- categories section end -->






        <!-- footer section -->
        <section id="contact">
            <footer class="footer-section spad pb-0">
                <div class="footer-top">
                    <div class="footer-warp">
                        <div class="row">
                            <div class="widget-item col-lg-3 col-sm-6">
                                <h4>Contact Info</h4>
                                <ul class="contact-list">
                                    <li>Sai Ram Square Wanadongri,<br>Hingna Road Nagpur-441110</li>
                                    <li>8637727511</li>
                                    <li>ashwinikashti@gmail.com</li>
                                </ul>
                            </div>
                            <div class="widget-item col-lg-3 col-sm-6">
                                <h4>Engeneering</h4>
                                <ul>
                                    <li><a href="">Applied Studies</a></li>
                                    <li><a href="">Computer Engeneering</a></li>
                                    <li><a href="">Software Engeneering</a></li>
                                    <li><a href="">Informational Engeneering</a></li>
                                    <li><a href="">System Engeneering</a></li>
                                </ul>
                            </div>
                            <div class="widget-item col-lg-3 col-sm-6">
                                <h4>Graphic Design</h4>
                                <ul>
                                    <li>
                                        <a href="">Visual identity grahic design</a>
                                    </li>
                                    <li>
                                        <a href="">Marketing and advertising graphic design </a>
                                    </li>
                                    <li>
                                        <a href="">User interface ghraphic design</a>
                                    </li>
                                    <li>
                                        <a href="">Publication graphic design</a>
                                    </li>
                                    <li>
                                        <a href="">Motion graphic design</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget-item col-lg-3 col-sm-6">
                                <h4>Development</h4>
                                <ul>
                                    <li>
                                        <a href="">Back-end web development</a>
                                    </li>
                                    <li>
                                        <a href="">Full-stack web development</a>
                                    </li>
                                    <li>
                                        <a href="">Web designer</a>
                                    </li>
                                    <li>
                                        <a href="">Web Programmer</a>
                                    </li>
                                    <li>
                                        <a href="">Webmaster</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-warp">
                        <ul class="footer-menu">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="add_guest.php">Register</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </section>
        <!-- footer section end -->


        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/circle-progress.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>

</html>