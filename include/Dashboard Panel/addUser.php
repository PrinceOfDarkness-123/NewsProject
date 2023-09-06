<?php
ob_start();
include("header.php");
include("sidebar.php");


if(isset($_REQUEST['userSubmit'])){
	$full_name = mysqli_real_escape_string($conn, $_REQUEST['fullname']);
	$email_address = mysqli_real_escape_string($conn, $_REQUEST['email']);
	$pass = mysqli_real_escape_string($conn, md5($_REQUEST['password']));
	$conpass = mysqli_real_escape_string($conn, md5($_REQUEST['confirm_password']));
	$type = mysqli_real_escape_string($conn, $_REQUEST['type']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
    
	$sql = "INSERT INTO user (fullname, email, password, confirm_password, type, status) VALUES 
	('$full_name', '$email_address', '$pass', '$conpass','$type', '$status')";
	$insertRecords = mysqli_query($conn, $sql);

	if($insertRecords == TRUE){
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/customCSS.css">
	<style>
		
	</style>
	<script>
		
	</script>
</head>
<body class="background">
<div class="col-sm-6 mt-5 ms-5 ms-auto me-sm-auto" id="main">
<form method="post" action="" class="form-control drop-shadow" enctype = "multipart/form-data" autocomplete>
      <?php
	   if(isset($msg)){
		echo $msg;
	   } 
       ?>
	<div class="form-group">  
	  <label for="">Full Name</label>
	  <input type="text"
		class="form-control hover-shadow" name="fullname" id="" aria-describedby="helpId" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Email Address</label>
	  <input type="email"
		class="form-control hover-shadow" name="email" id="" aria-describedby="helpId" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group"> 
	<label for="">Password</label>
	<div class="input-group">
    <input type="text" name="password" class="form-control hover-shadow" placeholder="">
    <div class="input-group-btn">
      <button class="btn btn-default btn-primary" type="submit">
        <i class="fa fa-eye"></i>
      </button>
    </div>
    </div> 
	</div>
	<div class="form-group"> 
	<label for="">Confirm Password</label>
	<div class="input-group">
    <input type="text" name="confirm_password" class="form-control  hover-shadow" placeholder="">
    <div class="input-group-btn">
      <button class="btn btn-default btn-primary" type="submit">
        <i class="fa fa-eye"></i>
      </button>
    </div>
    </div> 
	</div>
	<div class="form-group">
	  <label for="">Type</label>
	  <div class="form-control hover-shadow">
	  <input type="radio" name="type" id="" value="User"> User  
	  <input type="radio" name="type" id="" value="Admin"> Admin
	  <!--<small id="fileHelpId" class="form-text text-muted">Help text</small>-->
	  </div>
	</div>
	<div class="form-group radio">
	  <label for="">Status</label>
	  <div class="form-control hover-shadow">
	  <input type="radio" name="status" id="" value="1"> Active
	  <input type="radio" name="status" id="" value="0"> InActive
	  <!--<small id="fileHelpId" class="form-text text-muted">Help text</small>-->
	  </div> 
	</div>
	<div class="form-group">
	<input id="" name="userSubmit" class="btn btn-primary btn-color align-middle" type="submit" value="Submit">
	</div>
	</form>
	
</div>
	
</body>
</html>
