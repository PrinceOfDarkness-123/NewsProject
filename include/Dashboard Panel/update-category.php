<?php
ob_start();
include("header.php");
include("sidebar.php");

if(isset($_REQUEST['userSubmit'])){
	$category_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
	$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
	$status = mysqli_real_escape_string($conn, md5($_REQUEST['status']));
    
    $sql = "UPDATE categories SET category_id = '$category_id', categories_title = '$title', description = '$description',
	        status = '$status' WHERE category_id = '$category_id'";

    $updateRecords = mysqli_query($conn, $sql);
   
if($updateRecords == TRUE){
	header("Location: $url/include/Dashboard Panel/categoriesList.php");
}else{
	die("Failed");
}

}
?>
    <?php
		$id = $_GET['id'];
		$fetch_database = "SELECT * FROM categories WHERE category_id = '$id'";
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
		class="form-control hover-shadow" name="user_id" id="" aria-describedby="helpId" placeholder="<?php echo $row['category_id'] ?>">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Title</label>
	  <input type="text"
		class="form-control hover-shadow" name="title" id="" aria-describedby="helpId" value="<?php echo $row['categories_title'] ?>" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
	</div>
	<div class="form-group">  
	  <label for="">Description</label>
	  <input type="text"
		class="form-control hover-shadow" name="description" id="" aria-describedby="helpId" value="<?php echo $row['description'] ?>" placeholder="">
	    <!--<small id="helpId" class="form-text text-muted">Help text</small>-->
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
	<input id="" name="userSubmit" class="btn btn-primary btn-color align-middle" type="submit" value="Submit">
	</div>
	</form>
	
</div>
	
</body>
</html>

