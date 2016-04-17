
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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form_row">
            <label>Name:</label>
            <input type="text" class="form_input" name="name" placeholder="Enter Full Name" id="name" value="<?php echo $name;?>" />
            </div>
                        
            <div class="form_row">
            <label>Address:</label>
            <input type="text" class="form_input" name="address" placeholder="Enter Address" id="address" value="<?php echo $address;?>" />
            </div>
             
            <div class="form_row">
            <label>Subject:</label>
            <input type="text" class="form_input" name="subject" placeholder="Enter Subject" id="subject" value="<?php echo $subject; ?>" />
            </div>
             
            <div class="form_row">
            <label>Phone:</label>
            <input type="text" class="form_input" name="phone" placeholder="Enter Phone Number" id="phone" value="<?php echo $phone;?>" />
            </div>
            
            <div class="form_row">
            <label>Email:</label>
            <input type="text" class="form_input" name="email" placeholder="Enter Email Address" id="email" value="<?php echo $email;?>" />
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

