<?php
ob_start();
include("header.php");
include("sidebar.php");


if(isset($_REQUEST['postSubmit'])){
	$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$category_id = mysqli_real_escape_string($conn, $_REQUEST['category']);
	$text = mysqli_real_escape_string($conn, $_REQUEST['text']);
	$status = mysqli_real_escape_string($conn, $_REQUEST['status']);
	
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $tmp_Name = $_FILES['image']['tmp_name'];
    $extension = strchr($imageName, '.');
    $image_extension = strtolower($extension);
	if($image_extension == '.jpg' || $image_extension == '.png' || $image_extension == '.jpeg'){
		$check_Image = "SELECT * FROM news WHERE image = '$imageName'";
		$image_Result = mysqli_query($conn, $check_Image);
		if (mysqli_num_rows($image_Result) > 0) {
			die("Image has already been uploaded");
		}else{
			move_uploaded_file($tmp_Name, 'Backend Images/'.$imageName);
		$sql = "INSERT INTO news (news_title, category_id, text, image, status) VALUES 
		('$title', '$category_id', '$text', '$imageName', '$status');";
		$sql.= "UPDATE categories SET cover = cover + 1 WHERE category_id = '$category_id'";
		//$sql.= "DELETE FROM categories cover = cover - 1 WHERE id = '$category_id'";
		$insertRecords = mysqli_multi_query($conn, $sql);
			if($insertRecords == TRUE){
				header("Location: $url/include/Dashboard Panel/posts.php");
			}else{
				die("Failed");
			}
		}
	}else{
		die("Invalid Extension");
	}
	if($imageSize > 200000){
		die("Image is very big");
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
	  <label for="">Category</label>
	  <select name="category" id="" class="form-control">
        <option value="" disabled selected>Select Here</option>
        <?php 
        $categoriesList = "SELECT * FROM categories";
        $categoriesResult = mysqli_query($conn, $categoriesList);
        if(mysqli_num_rows($categoriesResult)>0){
             while($row = mysqli_fetch_assoc($categoriesResult)){
             echo "<option value=$row[category_id]>$row[categories_title]</option>";
             }
        }
        ?>
      </select>
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Text</label>
	  <textarea class="form-control hover-shadow" name="text" id="" cols="30" rows="10"></textarea>
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
    <div class="form-group">  
	  <label for="">Upload an Image</label>
	  <input type="file"
		class="form-control hover-shadow" name="image" id="" aria-describedby="helpId" placeholder="">
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