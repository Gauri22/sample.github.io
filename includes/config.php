<?php

define('HTTP_DOMAIN', 'http://localhost/book3/');
define('FTP_DOMAIN', 'http://localhost/book3/');


define('FTP_AVATAR_DIR','images/');
define('HTTP_AVATAR_DIR',HTTP_DOMAIN.'images/');

require_once('models/db.php');
require_once('includes/database.php');

session_name('Auth');
session_start();


 ?>