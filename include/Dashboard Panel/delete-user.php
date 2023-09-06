<?php
ob_start();
require("../database.php");


$id = $_GET['id'];

    $sql = "Delete FROM user WHERE id= '$id'";
    if ($conn->query($sql) == TRUE) {
        header("Location: $url/include/Dashboard Panel/user.php");
        ob_end_flush();
    
  } else{
    echo "Unable to delete data";
  }

?>