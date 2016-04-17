<?php
//for email
session_start();
ini_set("SMTP","wlink.com.np");

//for contact us
if(isset($_POST['send'])){
	
	$captcha = strtolower(trim($_POST['captcha']));
	
	if(isset($_SESSION['captcha']) && $captcha == $_SESSION['captcha']){
		//valid the captcha
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		
		
		// multiple recipients
		$to  = 'shah.dn11@gmail.com';
		
		// subject
		$subject = 'Contact Notification from website';
		
		// message
		$message = '
		<html>
		<head>
		  <title>Someone contact from website</title>
		</head>
		<body>
		  
		  <table>
			<tr>
			  <th>Name</th>
			  <td>'.$name.'</td>
			</tr>
			<tr>
			  <th>Email</th>
			  <td>'.$email.'</td>
			</tr>
			<tr>
			  <th>Telephone</th>
			  <td>'.$phone.'</td>
			</tr>
			<tr>
			  <th>Message</th>
			  <td>'.$message.'</td>
			</tr>
		  </table>
		</body>
		</html>
		';
		
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		
		$headers .= 'From: Website Contact Form <'.$email.'>' . "\r\n";
		
		
		// Mail it
		$mail = @mail('$to', '$subject', '$message', '$headers');
		if($mail)
			$success = "Thank you for contact us. We will reponse you soon.";
		else
			$error = "Contact information can't be send right now. Please try later.";	
		
		
	} else {
		//invalid the captcha
		$error = "Invalid verification code of captcha. Please retype it.";
	}
	
}


$type = "contact";
include 'includes/header.php';

?>
<div class="wrapper row3">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="homepage" class="clear"> 
      <!-- ###### -->
      <div id="content">
        <div id="top_featured" class="clear">
          <ul class="clear">
            <li><?php include 'admin/includes/message.php';?>
              <h2>Write A Comment</h2>
             <form action="" method="post">
          <p>
            <input  required="required" type="text" name="name" id="name" value="" size="22" placeholder="Your Name" />
            <label for="name"><small>Name (required)</small></label>
          </p>
          <p>
            <input  required="required" type="text" name="email" id="email" value="" size="22" pattern="[a-zA-Z]{3,}@[a-zA-Z]{3,}[.][a-zA-Z]{2,}" title="Please correct email address" placeholder="Your email"/>
            <label for="captcha"><small>Mail (required)</small></label>
          </p>
          <p>
            <input type="text" name="phone" id="phone" value="" size="22" placeholder="Your Phone"/>
            <label for="captcha"><small>Phone No.</small></label>
          </p>
          <p>
            <textarea  required="required" name="comment" id="comment" cols="100%" rows="5"></textarea>
            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
          </p>
          <p>
            <label for="captcha">Captcha</label>
            <br /><img src="captcha/captcha.php" id="captcha" />
            <a href="#" onclick="
    document.getElementById('captcha').src='captcha/captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();return false;"
    id="change-image"><br />Change This?</a><br /><br />
                <input type="text" name="captcha" id="captcha" value="" size="22" placeholder="Captcha"/>

          </p>
          <p>
            <input name="submit" type="submit" id="submit" value="Submit Form" />
            &nbsp;
            <input name="reset" type="reset" id="reset" tabindex="5" value="Reset Form" />
          </p>
        </form>
               </li>
          </ul>
        </div>
      </div>
      <!-- ###### --><!-- ###### --> 
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<?php include 'includes/footer.php';?></div>