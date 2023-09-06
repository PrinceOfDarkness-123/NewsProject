<?php
ob_start();
include("header.php");
include("sidebar.php");

if(isset($_REQUEST['postUpdate'])){
	$news_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
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
			$deleted = unlink('Backend Images/'.$imageName);
			move_uploaded_file($tmp_Name, 'Backend Images/'.$imageName);
		$sql1 = "UPDATE news SET id = '$news_id', category_id = '$category_id', news_title = '$title', text = '$text', image = '$imageName',
		status = '$status' WHERE id = $news_id";
		echo $sql1;
		$updateRecords = mysqli_query($conn, $sql1);
			if($updateRecords == TRUE){
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
    <?php
		$id = $_GET['id'];
		$fetch_database = "SELECT news.id, news.news_title, news.text, news.status, news.category_id, categories.categories_title,
		                   news.image FROM news LEFT JOIN categories ON news.category_id = categories.category_id WHERE news.id = $id ORDER BY 
                           news.id";
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
                       <h1 class="mb-0">Update Records</h1>
                     </div>
                    <form method="post" class="form-control drop-shadow" enctype = "multipart/form-data" autocomplete>
                       <div class="form-group">  
	  <input type="hidden"
		class="form-control hover-shadow" name="user_id" id="" aria-describedby="helpId" placeholder="<?php echo $row['id']; ?>">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div> 
     <div class="form-group">  
	  <label for="">Title</label>
	  <input type="text"
		class="form-control hover-shadow" name="title" id="" aria-describedby="helpId" value="<?php echo $row['news_title']; ?>">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
    <div class="form-group">  
	  <label for="">Text</label>
	  <textarea class="form-control hover-shadow" name="text" id="" cols="30" rows="10"><?php echo $row['text']; ?></textarea>
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
             while($row1 = mysqli_fetch_assoc($categoriesResult)){
             echo "<option value=$row1[category_id]>$row1[categories_title]</option>";
             if($row1['category_id'] == $row['category_id']){
                echo "<option value=$row[category_id] selected>$row1[categories_title]</option>";
             }
             }
             
        }
        ?>
        
      </select>
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	
    <div class="form-group">  
	  <label for="">Upload an Image</label>
	  <input type="file"
		class="form-control hover-shadow" name="image" id="" aria-describedby="helpId" placeholder="">
	    <small id="helpId" class="form-text text-muted"><?php echo $row['image'] ?></small>
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
	  </div> 
	</div>
	<?php
		 }
		}
	
	?>
	<div class="form-group">
	<input id="" name="postUpdate" class="btn btn-primary btn-color align-middle" type="submit" value="Submit">
	</div>
	</form>
	
</div>
	
</body>
</html>

