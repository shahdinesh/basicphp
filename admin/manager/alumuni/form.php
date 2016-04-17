
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
            <div class="form_row">
            <label>Name:</label>
            <input type="text" class="form_input" name="name" placeholder="Full Name" id="name" value="<?php echo $name;?>" />
            </div>
                        
            <div class="form_row">
            <label>Batch:</label>
            <input type="text" class="form_input" name="batch" placeholder="Your Batch" id="batch" value="<?php echo $batch;?>" />
            </div>
             
            <div class="form_row">
            <label>Address:</label>
            <input type="text" class="form_input" name="address" placeholder="Your Address" id="address"  value="<?php echo $address?>"/>
            </div>
             
            <div class="form_row">
            <label>Message:</label>
            <input type="text" class="form_input" name="message" placeholder="Your Message" id="message" value="<?php echo $message;?>" />
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
            
           
		<?php if(!isset($_GET['edit'])){?>
            <div class="form_row">
            <input name="create" type="submit" class="form_submit" id="create" value="Submit" />
            </div> 
            <?php }else{?>
            <div class="form_row">
              <input name="update" type="submit" class="form_submit" id="update" value="Update" />
              <input type="hidden" name="id" value="<?php echo $data['id'];?>"  />
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

