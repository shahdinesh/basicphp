<?php 
include "includes/session.php";
include "includes/dbconfig.php";

$type = 'gallery';

include "includes/header.php";
   $title="";
   $main="";
   $caption="";
   $status ="";
   $image = "";
	
	$ipath = "images/gallery/";

//create
 if(isset($_POST['create'])){

	  $main=$_POST['main'];
	  $title=$_POST['title'];
	  $caption=$_POST['caption'];
	  $status=$_POST['status'];
	  $image = $_FILES['image'];
	  
	  if(!empty($image['name'])){
		  $copy = move_uploaded_file($image['tmp_name'], $ipath.$image['name']);
		  if($copy){
			  $img = $image['name'];
			  }
		  }
	  	  
	  if(!empty($title)){
	  $sql = "insert into $type (title, main, caption, image, status) values ('$title', '$main', '$caption', '$img', '$status')";
	  $query=mysql_query($sql);
	  if($query){
		  $success= "$type createed successfully";
		  }
		  else{
			  $error= "$type createed unsuccessfully".mysql_error();}
	  	  }else{
	 $error = "$type not created. main and Title is empty";
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
		  
		  $main = $data['main'];
		  $title = $data['title'];
		  $status = $data['status'];
		  $caption = $data['caption'];
		  $image=$data['image'];
	  }
 }
		
		if(isset($_POST['update'])){
			$id = $_POST['id'];
			$main = $_POST['main'];
			$title = $_POST['title'];
			$status = $_POST['status'];
			$caption = $_POST['caption'];
			$image=$_FILES['image'];
			$img = $_POST['oldImage'];
			
			if(!empty($image['name'])){
		  $copy = move_uploaded_file($image['tmp_name'], $ipath.$image['name']);
		  if($copy){
			  $img = $image['name'];
			  }
		  }
		  
		  $sql = "update $type set main = '$main', title = '$title', status = '$status', image = '$img', caption = '$caption' where id = $id";
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