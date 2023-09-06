<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$dbname = "news-portal";
$url = "http://localhost:8080/news-portal";

$conn = new mysqli($dbhost, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed");
}
?>
