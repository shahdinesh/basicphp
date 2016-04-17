<?php 
$type = "gallery";
include 'includes/header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Education Board
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/layout.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- prettyPhoto -->
<link rel="stylesheet" href="js/prettyphoto/prettyPhoto.css" type="text/css" />
<script type="text/javascript" src="js/prettyphoto/jquery.prettyPhoto.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'dark_rounded',
        overlay_gallery: false,
        social_tools: false
    });
});
</script>
</head>
<!-- / prettyPhoto -->
<body id="top">
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="gallery" class="clear">
      <h2 class="title">Latest Images From The University</h2>
      <ul>
      <?php
      $sql = "select * from gallery where status = 1";
	  $query = mysql_query($sql);
	  while($data = mysql_fetch_array($query)){
	  ?>
        <li><a href="admin/images/gallery/<?php echo $data['image'];?>" rel="prettyPhoto[gallery1]" title="<?php echo $data['title'];?>" ><img src="admin/images/gallery/<?php echo $data['image'];?>" alt="<?php echo $data['title']; ?>" /></a></li>       
      <?php }?>
      </ul>
    </div>
    <!-- ####################################################################################################### -->
    <div class="pagination">
      <ul>
        <li class="prev"><a href="#">&laquo; Previous</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li class="splitter">&hellip;</li>
        <li><a href="#">6</a></li>
        <li class="current">7</li>
        <li><a href="#">8</a></li>
        <li><a href="#">9</a></li>
        <li class="splitter">&hellip;</li>
        <li><a href="#">14</a></li>
        <li><a href="#">15</a></li>
        <li class="next"><a href="#">Next &raquo;</a></li>
      </ul>
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4"></div>
<!-- ####################################################################################################### -->
<div class="wrapper"></div>
</body>
</html>
<?php include 'includes/footer.php';?>