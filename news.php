<?php 
$type = "news";
include 'includes/header.php';
if(isset($_GET['news'])){
	header ('location: index.php');
	}
?>
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear"> 
      <!-- ###### -->
      <div id="content">
        <div id="top_featured" class="clear">
          <?php
			$sql = "select * from news where status = 1 order by postdate desc";
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
      <?php 				$sn++; } }?>
          </ul>
        </div>
      </div>
      <!-- ###### --><!-- ###### --> 
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<?php include 'includes/footer.php';?>