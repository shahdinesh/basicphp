<?php
session_start();

if(isset($_COOKIE['mycookie'])){
	$_SESSION['mypass'] = $_COOKIE['mycookie'];
}
if(!isset($_SESSION['mypass'])){
	header("location: login.php");
}