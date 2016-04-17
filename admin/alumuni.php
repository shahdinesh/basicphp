<?php 
include "includes/session.php";
include "includes/dbconfig.php";

$type = 'alumuni';

include "includes/header.php";
   $batch="";
   $address="";
   $name="";
   $message ="";
	  $ipath = "images/alumuni/";
//create
 if(isset($_POST['create'])){
	  
	  $batch=$_POST['batch'];
	  $name=$_POST['name'];
	  $address=$_POST['address'];
	  $message=$_POST['message'];
	  $image = $_FILES['image'];

		if(!empty($image['name'])){
		  $copy = move_uploaded_file($image['tmp_name'], $ipath.$image['name']);
		  if($copy){
			  $img = $image['name'];
			  }
		  }

	  if(!empty($batch) && !empty($address)){
	  $sql = "insert into $type (name, batch, address, message, image) values ('$name', '$batch', '$address', '$message', '$img')";
	  $query=mysql_query($sql);
	  if($query){
		  $success= "$type createed successfully";
		  }
		  else{
			  $error= "$type createed unsuccessfully".mysql_error();}
	  	  }else{
	 $error = "$type not created. batch and address is empty";
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
		  
		  $batch = $data['batch'];
		  $name = $data['name'];
		  $message = $data['message'];
		  $address = $data['address'];
		  $image = $data['image'];
	  }
 }
		
		if(isset($_POST['update'])){
			$id = $_POST['id'];
			$batch = $_POST['batch'];
			$name = $_POST['name'];
			$message = $_POST['message'];
			$address = $_POST['address'];
			$image=$_FILES['image'];
			$img = $_POST['oldImage'];
			
			if(!empty($image['name'])){
		  $copy = move_uploaded_file($image['tmp_name'], $ipath.$image['name']);
		  if($copy){
			  $img = $image['name'];
			  }
		  }
		  
		  $sql = "update $type set batch = '$batch', name = '$name', message = '$message', image = '$img', address = '$address' where id = $id";
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