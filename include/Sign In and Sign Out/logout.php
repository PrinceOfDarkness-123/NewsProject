<?php
require("../database.php");

session_start();

unset($_SESSION['email']);

header("Location: $url/include/Sign In and Sign Out/login_form.php");
?>