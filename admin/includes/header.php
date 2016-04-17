<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Pannel</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet' type='text/css'>
<!-- jQuery file -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.tabify.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var $ = jQuery.noConflict();
$(function() {
$('#tabsmenu').tabify();
$(".toggle_container").hide(); 
$(".trigger").click(function(){
	$(this).toggleClass("active").next().slideToggle("slow");
	return false;
});
});
</script>
</head>
<body>
<div id="panelwrap">
  	
	<div class="header">
    <div class="title"><a href="index.php">Adminstrator Pannel</a></div>
    
    <div class="header_right">Welcome Admin, <a href="#" class="settings">Settings</a> <a href="logout.php" class="logout">Logout</a> </div>
    
    <div class="menu">
    <ul>
    <li><a href="index.php" <?php echo $type=="index"?'class="selected"':""?>>Main page</a></li>
    <li><a href="user.php" <?php echo $type=="user"?'class="selected"':""?>>Users</a></li>
    <li><a href="catogery.php" <?php echo $type=="catogery"?'class="selected"':""?>>Category</a></li>
    <li><a href="news.php" <?php echo $type=="news"?'class="selected"':""?>>News</a></li>
    <li><a href="alumuni.php" <?php echo $type=="alumuni"?'class="selected"':""?>>Alumuni</a></li>
    <li><a href="member.php" <?php echo $type=="member"?'class="selected"':""?>>Faculties Member</a></li>
    <li><a href="gallery.php" <?php echo $type=="gallery"?'class="selected"':""?>>Gallery</a></li>
    </ul>
    </div>
<?php if($type!=="index"){?>
    </div>
    <div class="submenu">
    <ul>
    <li><a href="?all" >View <?php echo ucfirst($type);?></a></li>
    <li><a href="?new" >New <?php echo ucfirst($type);?></a></li>
    <li><a href="?search" >Search  <?php echo ucfirst($type);?></a></li>
    </ul>
    </div>   
<?php }?>