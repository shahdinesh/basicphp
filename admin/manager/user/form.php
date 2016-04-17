
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
            <input type="text" class="form_input" name="name" placeholder="Full Name" id="name" value="<?php echo $name;?>" />
            </div>
                        
            <div class="form_row">
            <label>Username:</label>
            <input type="text" class="form_input" name="username" placeholder="Choose Username" id="username" value="<?php echo $username;?>" />
            </div>
             
		<?php if(!isset($_GET['edit'])){?>
            <div class="form_row">
            <label>Password:</label>
            <input type="password" class="form_input" name="password" placeholder="Your Password" id="password" />
            </div>
            <?php }?>
             
            <div class="form_row">
            <label>Email:</label>
            <input type="text" class="form_input" name="email" placeholder="Your Email" id="email" value="<?php echo $email;?>" />
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

