<?php 
include "includes/session.php";
include "includes/dbconfig.php";

$type = 'user';

include "includes/header.php";
   $username="";
   $email="";
   $name="";
   $status ="";

//create
 if(isset($_POST['create'])){
	  
	  $username=$_POST['username'];
	  $name=$_POST['name'];
	  $email=$_POST['email'];
	  $password=md5($_POST['password']);
	  $status=$_POST['status'];
	  if(!empty($username) && !empty($email)){
	  $sql = "insert into $type (name, username, password, email, status) values ('$name', '$username', '$password', '$email', '$status')";
	  $query=mysql_query($sql);
	  if($query){
		  $success= "$type createed successfully";
		  }
		  else{
			  $error= "$type createed unsuccessfully".mysql_error();}
	  	  }else{
	 $error = "$type not created. Username and Email is empty";
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
		  
		  $username = $data['username'];
		  $name = $data['name'];
		  $status = $data['status'];
		  $email = $data['email'];
		  
	  }
 }
		
		if(isset($_POST['update'])){
			$id = $_POST['id'];
			$username = $_POST['username'];
			$name = $_POST['name'];
			$status = $_POST['status'];
			$email = $_POST['email'];
		  
		  $sql = "update $type set username = '$username', name = '$name', status = '$status', email = '$email' where id = $id";
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