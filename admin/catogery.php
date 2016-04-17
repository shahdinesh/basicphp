<?php 
include "includes/session.php";
include "includes/dbconfig.php";

$type = 'catogery';

include "includes/header.php";
   $name="";
   $url="";
   $seotitle="";
   $seodesc ="";
   $status ="";

//create
 if(isset($_POST['create'])){
	  
	  $url=$_POST['url'];
	  $name=$_POST['name'];
	  $seotitle=$_POST['seotitle'];
	  $seodesc=$_POST['seodesc'];
	  $status=$_POST['status'];
	  if(!empty($url) && !empty($name)){
	  $sql = "insert into $type (name, url, seotitle, seodesc, status) values ('$name', '$url', '$seotitle', '$seodesc', '$status')";
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
		  $name = $data['name'];
		  $status = $data['status'];
		  $seodesc = $data['seodesc'];
		  $seotitle = $data['seotitle'];
	  }
 }
		
		if(isset($_POST['update'])){
			$id = $_POST['id'];
			$url = $_POST['url'];
			$name = $_POST['name'];
			$status = $_POST['status'];
			$seodesc = $_POST['seodesc'];
		  $seotitle = $_POST['seotitle'];

		  
		  $sql = "update $type set url = '$url', name = '$name', status = '$status', seodesc = '$seodesc', seotitle = '$seotitle' where id = $id";
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