<?php 
$type = "member";
include "includes/header.php";
?>
<body id="top">
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <div id="content">
      <h2>Teacher Details</h2>
      <table summary="Summary Here" cellpadding="0" cellspacing="0" style="width:1000px;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
          </tr>
        </thead>
      <?php 
	  $sql = "select * from member where status = 1";
	  $query = mysql_query($sql);
	  $count = mysql_num_rows($query);
	  
	  if($count>0){
		  while($data = mysql_fetch_array($query)){
	  ?>
        <tbody>
          <tr class="light">
            <td><?php echo $data['name'];?></td>
            <td><?php echo $data['subject'];?></td>
            <td><?php echo $data['address'];?></td>
             <td><?php echo $data['phone'];?></td>
            <td><?php echo $data['email'];?></td>
          </tr>
        </tbody>
      <?php } }?>
      </table>
    </div>
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<?php include "includes/footer.php";?>