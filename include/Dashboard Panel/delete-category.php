<?php
ob_start();
require("../database.php");


$id = $_GET['id'];

    $sql = "Delete FROM categories WHERE category_id= '$id'";
    if ($conn->query($sql) == TRUE) {
        header("Location: $url/include/Dashboard Panel/categoriesList.php");
        ob_end_flush();
    
  } else{
    echo "Unable to delete data";
  }

?>