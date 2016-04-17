<?php 
$type = "alumuni";
include 'includes/header.php';
?>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear"> 
      <!-- ###### -->
      <div id="content">
        <div id="top_featured" class="clear">
        <?php
			$sql = "select * from alumuni";
			$query = mysql_query($sql);
			$count = mysql_num_rows($query);
			$sn = 1;
			if($count>0){
			while($data = mysql_fetch_array($query)){
		  ?>
          <ul class="<?php echo $sn%2 == 1?'last':'clear'; ?>">
            <li>
              <h2><?php echo $data['name'];?></h2>
              <img src="admin/images/alumuni/<?php echo $data['image'];?>" alt=""  style="width:200px; "/>
              <p><?php echo $data['message'];?></p>
            </li>
          </ul>
      <?php 				$sn++; } }?>
        </div>
      </div>
      <!-- ###### --><!-- ###### --> 
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<?php include 'includes/footer.php';?>