<?php
ob_start();
include("header.php");
include("sidebar.php");
require("../database.php");

if(isset($_REQUEST['postSubmit'])){
	$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$text = mysqli_real_escape_string($conn, $_REQUEST['text']);
	$category_id = mysqli_real_escape_string($conn, $_REQUEST['categories']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
	$file_name = $_FILES['post_image']['name'];
	$file_size = $_FILES['post_image']['size'];
	$file_temp = $_FILES['post_image']['tmp_name'];
	$image_text = strchr($file_name, ".");
	$image_ext = strtolower($image_text);

	if ($image_ext != '.jpeg' && $image_ext != '.jpg' && $image_ext != '.png')
    {
     die("Error: Only images are allowed");
    }
    if ($file_size > 200000)
    {
    die("Error: File is too long");
    }
	if(empty($file_name) == FALSE){
       $uploaded = move_uploaded_file($file_temp, 'post_images/'.$file_name);
	   $sql = "INSERT INTO news (title, category_id, text, status, image) VALUES 
	   ('$title', '$category_id', '$text', '$status', '$file_name')";
	   $insertRecords = mysqli_query($conn, $sql);
	   if($insertRecords == TRUE){
		$msg = "Records Inserted";
	}else{
		die("Failed");
	}
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
<form method="post" action="" class="form-control drop-shadow" enctype="multipart/form-data" autocomplete>
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
	  <label for="">Text</label>
	  <input type="text"
		class="form-control hover-shadow" name="text" id="" aria-describedby="helpId" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
    <div class="form-group">  
	  <label for="">Select a Category</label>
	  <select name="categories" id="">
        <option value="" disabled selected>Select One</option>
            <?php 
            $categories_box = "SELECT * from categories";
            $category_query = mysqli_query($conn ,$categories_box);

            if(mysqli_num_rows($category_query)){
                while($row = mysqli_fetch_assoc($category_query)){
                    echo "<option value=$row[id]>$row[title]</option>";
                }
            }
            ?>
        </option>
      </select>
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Upload an Image</label>
	  <input type="file" name="post_image" id="">
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
