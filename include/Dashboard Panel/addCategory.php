<?php
ob_start();
include("header.php");
include("sidebar.php");

if(isset($_REQUEST['postSubmit'])){
	$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
	
    
	$sql = "INSERT INTO categories (categories_title, description, status) VALUES 
	('$title', '$description', '$status')";
	$insertRecords = mysqli_query($conn, $sql);

	if($insertRecords == TRUE){
		header("Location: $url/include/Dashboard Panel/categoriesList.php");
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
	<link rel="stylesheet" href="css/customCSS.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
	  <label for="">Title</label>
	  <input type="text"
		class="form-control hover-shadow" name="title" id="" aria-describedby="helpId" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Description</label>
	  <input type="text"
		class="form-control hover-shadow" name="description" id="" aria-describedby="helpId" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
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
	<input id="" name="postSubmit" class="btn btn-primary btn-color align-middle" type="submit" value="Submit">
	</div>
	</form>
	
</div>
	
</body>
</html>
