<?php
session_start();

include "includes/dbconfig.php";

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql="select * from user where username='$username' and password='$password' and status='1'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);

if($data){
	if(isset($_POST['rem'])){
		$time=time()+60*60*60;
		setcookie("mycookie",$username,$time);
		}
	
	
		$_SESSION['mypass'] = $username;
	header("location: index.php");
}
	else{
		$error = "Invalid username and password";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="loginpanelwrap">
  	
	<div class="loginheader">
    <div class="logintitle"><font size="+2" color="#0000FF">Login Pannel</font></div>
    </div>
    <?php 
include "includes/message.php";
?>
       <form action="" method="post"> 
    <div class="loginform">
        <div class="loginform_row">
        <label>Username:</label>
        <input name="username" type="text" class="loginform_input" id="username" placeholder="Your Username" />
        </div>
        <div class="loginform_row">
        <label>Password:</label>
        <input type="password" class="loginform_input" name="password" id="password" placeholder="Your Password" />
        </div>
        <div class="loginform_row">
        <input name="login" type="submit" class="loginform_submit" id="login" value="Login" />
        </div> 
        <div class="loginform_row">
          <input type="checkbox" name="rem" id="rem" />
          <label for="rem"></label>
          Remember Me
         
        </div>
        <div class="clear"></div>
  </form>
    </div>
</body>
</html>