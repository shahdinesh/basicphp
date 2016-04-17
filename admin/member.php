<?php 
include "includes/session.php";
include "includes/dbconfig.php";

$type = 'member';

include "includes/header.php";
   $name="";
   $address="";
   $subject="";
   $phone ="";
   $status ="";
   $email = "";

//create
 if(isset($_POST['create'])){
	  
	  $address=$_POST['address'];
	  $name=$_POST['name'];
	  $subject=$_POST['subject'];
	  $phone=$_POST['phone'];
	  $status=$_POST['status'];
	  $email = $_POST['email'];
	  
	  if(!empty($subject) && !empty($name)){
	  $sql = "insert into $type (name, address, subject, phone, status, email) values ('$name', '$address', '$subject', '$phone', '$status', '$email')";
	  $query=mysql_query($sql);
	  if($query){
		  $success= "$type createed successfully";
		  }
		  else{
			  $error= "$type createed unsuccessfully".mysql_error();}
	  	  }else{
	 $error = "$type not created. Name and Subject is empty";
	 }
 }


//delete
if(isset($_GET['del'])){
		  $id =  $_GET['id'];
		  $sql = "delete from $type where id = $id";
		  $query = mysql_query($sql);
		 if($query){
			 $success = "$type Deleted successfully";
			 }else{
				 $error = "$type Deleted successfully".mysql_error();
				 }
		  }


//edit
 if(isset($_GET['edit'])){
	  if(isset($_GET['id'])){
	  $id = $_GET['id'];
	  $sql = "select * from $type where id = $id";
	  $query = mysql_query($sql);
	  $data = mysql_fetch_array($query);
		  
		  $address = $data['address'];
		  $name = $data['name'];
		  $status = $data['status'];
		  $phone = $data['phone'];
		  $subject = $data['subject'];
		  $email = $data['email'];

	  }
 }
		
		if(isset($_POST['update'])){
			$id = $_POST['id'];
			$address = $_POST['address'];
			$name = $_POST['name'];
			$status = $_POST['status'];
			$phone = $_POST['phone'];
		  $subject = $_POST['subject'];
		  $email = $_POST['email'];
 
		  $sql = "update $type set address = '$address', name = '$name', status = '$status', phone = '$phone', email = '$email', subject = '$subject' where id = $id";
		  $query = mysql_query($sql);
		  if($query){
			  $success = 'Data updated';
			  }else{
				  $error = 'Data not updated'.mysql_error();
				  }
			

		  }
	  
	  


//search
 if(isset($_POST['search'])){
		  
		  $searchby = $_POST['searchby'];
		  $searchkey= $_POST['searchkey'];
		  $sql = "select * from $type where $searchby like '%$searchkey%'";
		  $query = mysql_query($sql);
		  
		  }
		  
?>
<?php include"includes/message.php";?>    
                    
                 
    <?php if(isset($_GET['new'])){
		include "manager/$type/form.php";
		}
		elseif(isset($_GET['edit'])){
		include "manager/$type/form.php";
		}
		elseif(isset($_GET['search'])){
		include "manager/".$type."/search.php";
		include "manager/".$type."/datalist.php";		
		}
	else{
		include "manager/".$type."/datalist.php";
	}
	
	?>

<?php 
include "includes/footer.php";
?>