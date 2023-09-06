<?php
require("../database.php");


  if(isset($_REQUEST['getLogin'])){
	$email = mysqli_real_escape_string($conn, $_REQUEST['email_address']);
	$password = mysqli_real_escape_string($conn, md5($_REQUEST['password']));;
	
	$sql = "SELECT email, password, type, status FROM user WHERE email = '$email' AND password = '$password'";
	$query = mysqli_query($conn, $sql);
	session_start();
	$_SESSION['email'] = $email;
	if(mysqli_num_rows($query) == 1){
		header("Location: $url/include/Dashboard%20Panel/dashboard.php");
	}else{
		echo "Looks like you have not created your account yet";
	}
  
	
  }

  

?>

<?php
session_start();
if(isset($_SESSION['email'])){
    header("Location: $url/include/Dashboard Panel/dashboard.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
    <style>
		.form-control:hover{
			background-color: rgba(141, 68, 139, .2);
		}
		.form-control:focus{
			border: 1px solid rgba(141, 68, 139, .4);
			transition: .3s;
		}
	</style>
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Welcome to the News Login Page</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Have an account?</h3>
						<form action="" method="post" class="login-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="email_address" placeholder="Email Address" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="text" class="form-control rounded-left" name="password" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="getLogin" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

