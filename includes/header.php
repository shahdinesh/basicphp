<?php include 'admin/includes/dbconfig.php'; 
		$sql = "select * from catogery where status = 1";
		$query = mysql_query($sql);
		$count = mysql_num_rows($query);
		
		
		$seotitle="Homepage";
		
		
		//for seotitle
		if(isset($_GET['go'])){
			$url=$_GET['go'];
			$s="select *from catogery where url='$url' and status='1'";
			$q=mysql_query($s);
			$d=mysql_fetch_array($q);
			$seotitle=$d['seotitle'];
			
			
			
			}
		
		
		
		
		
		//for details of news
		if(isset($_GET['url'])){
			$url=$_GET['url'];
			$s="select *from news where url='$url' and status='1'";
			$q=mysql_query($s);
			$d=mysql_fetch_array($q);
			$seotitle=$d['title'];
			
			
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
<title><?php echo $seotitle;?> -- Patan Multiple Campus</title>
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
	  if($count>0){
	  while($data = mysql_fetch_array($query)){
	  ?>
        <li <?php echo $type == $data['url']?'class="active"':""; ?>><a href="<?php echo $data['url'];?>.php?go=<?php echo $data['url'];?>" title="<?php echo $data['seodesc']; ?>"><?php echo $data['name'];?></a></li>
      <?php } }?>
      </ul>
    </div>
  </div>
</div>