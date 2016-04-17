<?php  
session_start();

unset($_SESSION['mypass']);
setcookie("mycookie", NULL, time()-1);
header("location: login.php");