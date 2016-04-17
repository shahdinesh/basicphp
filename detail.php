<?php
$type="news"; 
include "includes/header.php";

?>

<div class="wrapper row3">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear"> 
      <!-- ###### -->
      <div id="content">
        <div id="top_featured" class="clear">
          <?php
			
		  ?>
          <ul class="clear">
            <li>
              <h2><?php echo $d['title']; ?></h2>
              <img src="admin/images/news/<?php echo $d['image']; ?>" alt=""  style="width:200px;"/>
              <p><?php echo $d['detail'];?></p>
              <?php
			  $hits=$d['hits'];
			
			  $hits++; 
			  
			  $shits = "update news set hits='$hits' where url='$url'";
			  $qhits=mysql_query($shits);			  
			  ?>
               Total Views=<?php echo $hits;?>
              
            </li>
          </ul>
        </div>
      </div>
      <!-- ###### --><!-- ###### --> 
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<?php include "includes/footer.php";?>