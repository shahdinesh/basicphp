<?php 
include "includes/session.php";
include "includes/dbconfig.php";

$type = 'news';

include "includes/header.php";
   $title="";
   $url="";
   $detail="";
   $status ="";
   $image = "";
   $summary = ""; 
	 
	  $ipath = "images/news/";

//create
 if(isset($_POST['create'])){

	  $url=$_POST['url'];
	  $title=$_POST['title'];
	  $detail=$_POST['detail'];
	  $status=$_POST['status'];
	  $image = $_FILES['image'];
	  $summary = $_POST['summary'];
	  
	  if(!empty($image['name'])){
		  $copy = move_uploaded_file($image['tmp_name'], $ipath.$image['name']);
		  if($copy){
			  $img = $image['name'];
			  }
		  }
	  	  
	  if(!empty($url) && !empty($title)){
	  $sql = "insert into $type (title, url, detail, image, status, summary) values ('$title', '$url', '$detail', '$img', '$status', '$summary')";
	  $query=mysql_query($sql);
	  if($query){
		  $success= "$type createed successfully";
		  }
		  else{
			  $error= "$type createed unsuccessfully".mysql_error();}
	  	  }else{
	 $error = "$type not created. URL and Title is empty";
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
		  
		  $url = $data['url'];
		  $title = $data['title'];
		  $status = $data['status'];
		  $detail = $data['detail'];
		  $summary = $data['summary'];
		  $image=$data['image'];
	  }
 }
		
		if(isset($_POST['update'])){
			$id = $_POST['id'];
			$url = $_POST['url'];
			$title = $_POST['title'];
			$status = $_POST['status'];
			$detail = $_POST['detail'];
			$summary = $_POST['summary'];
			$image=$_FILES['image'];
			$img = $_POST['oldImage'];
			
			if(!empty($image['name'])){
		  $copy = move_uploaded_file($image['tmp_name'], $ipath.$image['name']);
		  if($copy){
			  $img = $image['name'];
			  }
		  }
		  
		  $sql = "update $type set url = '$url', summary = '$summary', title = '$title', status = '$status', image = '$img', detail = '$detail' where id = $id";
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