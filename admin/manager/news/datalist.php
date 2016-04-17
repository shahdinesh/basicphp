<?php
if(!isset($searchkey)){
$sql = "select * from $type";
$query = mysql_query($sql);
}
$count = mysql_num_rows($query);
?>
<div class="center_content">  
 
    <div id="right_wrap">
    <div id="right_content"> 
        <h2><?php echo ucfirst($type)?> Details</h2> 
                    
                    
<table id="rounded-corner">
<?php if($count>0){?>
    <thead>
    	<tr>
        	<th></th>
            <th>SN</th>
            <th>Title</th>
            <th>URL</th>
            <th>Summary</th>
            <th>Detail</th>
            <th>Create Date</th>
            <th>Hits</th>
            <th>Image</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php 
	  $sn = 1;
	  while($data = mysql_fetch_array($query)){
		  ?>
    	<tr class="odd">
            <td></td>
        	<td><?php echo $sn++; ?></td>
            <td><?php echo $data['title']; ?></td>
            <td><?php echo $data['url']; ?></td>
            <td><?php echo $data['summary']; ?></td>
            <td><?php echo $data['detail']; ?></td>
            <td><?php echo $data['postdate']; ?></td>
            <td><?php echo $data['hits']; ?></td>
            <td><img src="images/news/<?php echo $data['image'];?>" alt="" width="50" title="<?php echo $data['image'];?>"/></td>
            <td><?php echo $data['status']; ?></td>
            <td><a href="?edit&amp;id=<?php echo $data['id'];?>"><img src="images/edit.png" alt="" title="Edit" border="0" /></a></td>
            <td><a href="?del&amp;id=<?php echo $data['id'];?>" onclick="return confirm('Are you sure??');"><img src="images/trash.gif" alt="" title="Delete" border="0" /></a></td>
        </tr>
    <?php } ?>
    </tbody>
<?php }else{?>
	<tfoot>
    	<tr>
        	<td colspan="12">No Records!!</td>
        </tr>
    </tfoot> 
<?php }?>
</table>
    </div>
     </div><!-- end of right content-->

  <div class="clear"></div>
    </div> <!--end of center_content-->
