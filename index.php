<?php 
$type = "index";
include "includes/header.php";

?>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="hpage_featured" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="featured_slide">
      <ul>
	<?php 
		$sql = "select * from gallery where main = 1";
		$query = mysql_query($sql);
		$count = mysql_num_rows($query);
 
	  if($count>0){
	  while($data = mysql_fetch_array($query)){
	  ?>
        <li><img src="admin/images/gallery/<?php echo $data['image'];?>" alt="" />
          <div class="panel-overlay">
            <h2><?php echo $data['title'];?></h2>
            <p><?php echo $data['caption'];?> </p>
          </div>
        </li>
      <?php } }?>
      </ul>
    </div>
    <!-- ###### -->
    <div class="intro clear">
      <div class="welcome clear"><img class="imgl" src="images/colz.jpg"  style="width:125px;" alt="" />
        <div class="fl_right">
         <h2>Welcome to Our College</h2>
          <p>Our college is very good college in the world. There are verity of cources running in our college. Please do come and visit our college for further information.<br /><a href="aboutus.php">For more information</a></p>
        </div>
      </div>
      <div class="welcome clear"><img class="imgl" src="images/din.jpg"  style="width:100px;" alt="" />
        <div class="fl_right">
         <h2>A word form Dean</h2>
          <p>Our college is very good college in the world. There are verity of cources running in our college. Please do come and visit our college for further information.</p>
        </div>
      </div>
      
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear"> 
      <!-- ###### -->
      <div id="content">
        <div id="latestnews">
          <h2>Latest News &amp; Events</h2>
	<?php 
		$sql = "select * from news where status = 1 order by postdate desc limit 2";
		$query = mysql_query($sql);
		$count = mysql_num_rows($query);
 		$sn = 1;
	  if($count>0){
	  while($data = mysql_fetch_array($query)){
	  ?>
      <ul class="<?php echo $sn%2 == 0?'last':'clear'; ?>">
            <li>
              <h2><?php echo $data['title']; ?></h2>
              <img src="admin/images/news/<?php echo $data['image']; ?>" alt=""  style="width:200px;"/>
              <p><?php echo $data['summary'];?></p>
              <p class="readmore"><a href="detail.php?url=<?php echo $data['url'];?>">Continue Reading &raquo;</a></p>
            </li>
      <?php $sn++; } }?>
              <p class="readmore"><a href="news.php">View more news</a></p>
         </ul>
        </div>
      </div>
      <!-- ###### --><!-- ###### --> 
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<?php include "includes/footer.php";?>