<?php
ob_start();
include("header.php");
include("sidebar.php");
require("../database.php");

if(isset($_REQUEST['userSubmit'])){
	$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
	$full_name = mysqli_real_escape_string($conn, $_REQUEST['full_name']);
	$email_address = mysqli_real_escape_string($conn, $_REQUEST['email_address']);
	$pass = mysqli_real_escape_string($conn, md5($_REQUEST['password']));
	$conpass = mysqli_real_escape_string($conn, md5($_REQUEST['confirm_password']));
	$type = mysqli_real_escape_string($conn, $_REQUEST['type']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
    $sql = "UPDATE user SET id = '$id', fullname = '$full_name', email = '$email_address', password = '$pass', confirm_password = '$conpass',
	        type = '$type', status = '$status' WHERE id = '$id'";

$updateRecords = mysqli_query($conn, $sql);
   
if($updateRecords == TRUE){
	if($_REQUEST['type'] == 'User'){
		header("Location: $url/include/Dashboard Panel/users.php");
		ob_end_flush();
	}	
	if($_REQUEST['type'] == 'Admin'){
		header("Location: $url/include/Dashboard Panel/admin.php");
		ob_end_flush();
	}	
}else{
	die("Failed");
}
}
?>
    <?php
		$id = $_GET['id'];
		$fetch_database = "SELECT * FROM user WHERE id = '$id'";
		$results = mysqli_query($conn, $fetch_database);
		if(mysqli_num_rows($results)>0){
			 while($row = mysqli_fetch_assoc($results)){
				 
			 ?>
	
    
     
		 
	
       
	
	

   
	






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
	<link rel="stylesheet" href="css/customCSS.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="background">
<div class="col-sm-6 mt-5 ms-5 ms-auto me-sm-auto" id="main">
                    <div class="page_title_left">
                       <h1 class="mb-0">All Records</h1>
                     </div>
<form method="post" class="form-control drop-shadow" enctype = "multipart/form-data" autocomplete>
      
	<div class="form-group">  
	  <input type="text"
		class="form-control hover-shadow" name="user_id" id="" aria-describedby="helpId" placeholder="<?php echo $row['id'] ?>">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Full Name</label>
	  <input type="text"
		class="form-control hover-shadow" name="full_name" id="" aria-describedby="helpId" value="<?php echo $row['fullname'] ?>" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Email Address</label>
	  <input type="email"
		class="form-control hover-shadow" name="email_address" id="" aria-describedby="helpId" value="<?php echo $row['email'] ?>" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Password</label>
	  <input type="password"
		class="form-control hover-shadow" name="password" id="" aria-describedby="helpId" value="<?php echo $row['password'] ?>" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Confirm Password</label>
	  <input type="password"
		class="form-control hover-shadow" name="confirm_password" id="" aria-describedby="helpId" value="<?php echo $row['confirm_password'] ?>" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">
	  <label for="">Type</label>
	  <div class="form-control hover-shadow">
	  <?php
	  if($row['type'] == 'User'){
		echo "<input type='radio' name='type' id='' value='User' checked> User";
		echo "<input type='radio' name='type' id='' value='Admin' unchecked> Admin";

	  }
	  if($row['type'] == 'Admin'){
		echo "<input type='radio' name='type' id='' value='User' unchecked> User";
		echo "<input type='radio' name='type' id='' value='Admin' checked> Admin";
	  }
	  ?>
	  <!--<small id="fileHelpId" class="form-text text-muted">Help text</small>-->
	  
	  </div>
	</div>
	<div class="form-group radio">
	  <label for="">Status</label>
	  <div class="form-control hover-shadow">
	  <?php
	  if($row['status'] == '0'){
		echo "<input type='radio' name='status' id='' value='1' unchecked> Active";
		echo "<input type='radio' name='status' id='' value='0' checked> InActive";

	  }
	  if($row['status'] == '1'){
		echo "<input type='radio' name='status' id='' value='1' checked> Active";
		echo "<input type='radio' name='status' id='' value='0' unchecked> InActive";
	  }
	  ?>
	  <!--<small id="fileHelpId" class="form-text text-muted">Help text</small>-->
	  </div> 
	</div>
	<?php
		 }
		}
	
	?>
	<div class="form-group">
	<input id="" onclick="confirmation()" name="userSubmit" class="btn btn-primary btn-color align-middle" type="submit" value="Submit">
	</div>
	</form>
	
</div>
	
</body>
</html>
