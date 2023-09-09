<?php
ob_start();
require("../database.php");
$id = $_GET['id'];
$categories_id = $_GET['category_id'];
$sql = "Delete FROM news WHERE id= '$id';";
$sql.= "UPDATE categories cover = cover - 1 WHERE category_id = '$categories_id'";
if ($conn->multi_query($sql) == TRUE) {
    header("Location: $url/include/Dashboard Panel/posts.php");
    ob_end_flush();

} else{
echo "Unable to delete data";
}

?>