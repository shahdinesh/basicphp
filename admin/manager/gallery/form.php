
    <div class="center_content">  
 
    <div id="right_wrap">
    <div id="right_content">             
    <h2>Fill the Form</h2>
    <div id="tab1" class="tabcontent">
	<?php if(isset($_GET['new'])){?>
        <h3>New <?php echo ucfirst($type) ?></h3>
	<?php }else{?>
        <h3>Edit <?php echo ucfirst($type) ?></h3>
	<?php }?>
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            
            </div>
        
          <div class="form_row">
         <label>Display on Main page:</label>
            <select class="form_select" name="main" id="main">
              <?php
		$active = 'selected="selected"';
		$inactive = '';
		if(isset($data)){
			if($data['status'] == "0"){
				$active = '';
				$inactive = 'selected="selected"';
			}
		}
		?>
              <option value="1"  <?php echo $active?>>Yes</option>
              <option value="0" <?php echo $inactive?>>No</option>
            </select>
            </div>
            
           <div class="form_row">
            <label>Title:</label>
            <input type="text" class="form_input" name="title" placeholder="Enter Title" id="title" value="<?php echo $title;?>" />
            </div>
         
            <div class="form_row">
            <label>Caption:</label>
            <textarea class="form_input" name="caption" id="caption" /><?php echo $caption; ?> 
            </textarea>
            </div>
           
            <div class="form_row">
            <label>Photo:</label>
            <input type="file" class="form_input" name="image" placeholder="Choose Picture" id="image" value="<?php echo $image; ?>"  />
            <?php
        if(!empty($image)){
			
			if(file_exists($ipath.$image)){
		?>
        	<img src="<?php echo $ipath.$image; ?>" width="120" />
            <?php
			}
			?>
            <input type="hidden" name="oldImage" value="<?php echo $image;?>"  />
        <?php
		}
		?>
            </div>
            
            <div class="form_row">
            <label>Status:</label>
            <select class="form_select" name="status" id="status">
         <?php
		$active = 'selected="selected"';
		$inactive = '';
		if(isset($data)){
			if($data['status'] == "0"){
				$active = '';
				$inactive = 'selected="selected"';
			}
		}
		?>     
              
              <option value="1"  <?php echo $active?>>Active</option>
              <option value="0" <?php echo $inactive?>>Inactive</option>
            </select>
            </div>
		<?php if(!isset($_GET['edit'])){?>
            <div class="form_row">
            <input name="create" type="submit" class="form_submit" id="create" value="Submit" />
            </div> 
            <?php }else{?>
            <div class="form_row">
              <input name="update" type="submit" class="form_submit" id="update" value="Update" />
              <input type="hidden" name="id" value="<?php echo $data['id'];?>" />
            </div> 
            <?php }?>
            </form>
            <div class="clear"></div>
        </div>
    </div>
    </div>
     </div><!-- end of right content-->
                 <div class="clear"></div>
     </div> <!--end of center_content-->

