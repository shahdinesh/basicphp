<?php include 'admin/includes/dbconfig.php'; 
		$title = "Patan Multiple Campus";
		
if(isset($_GET['url'])){
	  if($data){
		  $url = $_GET['url'];
		$sql = "select * from catogery where status = 1 and url = $url";
		$query = mysql_query($sql);
		$data = mysql_fetch_array($query);
		  $title = $data['title'];
		  $desc = $data['seodesc'];
	  }
}
		 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Education Board
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.min.js"></script>
<!-- Homepage Specific -->
<script type="text/javascript" src="js/galleryviewthemes/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/galleryviewthemes/jquery.timers.1.2.js"></script>
<script type="text/javascript" src="js/galleryviewthemes/jquery.galleryview.2.1.1.min.js"></script>
<script type="text/javascript" src="js/galleryviewthemes/jquery.galleryview.setup.js"></script>
<!-- / Homepage Specific -->
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.php">Patan Multiple Campus</a></h1>
      <p>True Education Center</p>
    </div>
    <div class="fl_right">
      <form action="#" method="post" id="sitesearch">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;" onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="image" src="images/search.gif" id="search" alt="Search" />
        </fieldset>
      </form>
    </div>
    <div id="topnav">
      <ul>
      <?php
	  $sql = "select * from catogery where status = 1 ";
		$query = mysql_query($sql);
	  while($data = mysql_fetch_array($query)){
	  ?>
        <li <?php echo $type == $data['url']?'class="active"':""; ?>><a href="<?php echo $data['url']?>.php" title="<?php echo 
		$data['seotitle']; ?>"><?php echo $data['name'];?></a></li>
      <?php  }?>
        <li class="last"><a href="">Scholarship	</a></li>
      </ul>
    </div>
  </div>
</div>