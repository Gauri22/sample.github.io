<?php 
require_once('includes/config.php');
unset($_SESSION['Auth']);
header("Location:index.php");
exit; 
?>