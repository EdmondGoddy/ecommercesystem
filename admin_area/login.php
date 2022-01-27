<?php

session_start();

include("includes/db.php");

?>


<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="css/Inv/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
 
	<title>E-commerce System Admin Area</title>
</head>


<body>
	<div class="container">

	  	<div class="card mx-auto" style="width: 18rem;box-shadow: 0 0 25px 0 gray; margin-top: 5%;">

  		  <img class="card-img-top mx-auto" src="./admin_images/images.PNG" alt="Login Icon">
  		  <div class="card-body">

  		    <form id="form_login" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="admin_email" id="log_email" placeholder="Enter email">
			    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="admin_pass" id="log_password" placeholder="Password">
			    <small id="p_error" class="form-text text-muted"></small>
			  </div>
			  <center><button type="submit" class="btn btn-primary" name="admin_login"><i class="fa fa-lock">&nbsp;</i> Login</button></center>
  			</form>

  		  </div>
		  <div class="card-footer"><a href="#">Forgot Password?</a></div>
		</div>


		<!--<form action="" class="form-login" method="post">
			<h2 class="form-login-heading">Admin Login</h2>
			<input type="text" class="form-control" placeholder="Email Address" name="admin_email" required="">
			<input type="password" class="form-control" placeholder="Admin Password" name="admin_pass" required="">
			<button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">Login</button>
		</form>-->
	</div>


</body>
</html>


<?php

if (isset($_POST["admin_login"])) {
	# code...

	$admin_email = mysqli_real_escape_string($con, $_POST["admin_email"]);
	$admin_pass = mysqli_real_escape_string($con, $_POST["admin_pass"]);

	$get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_pass' ";
	$run_admin = mysqli_query($con, $get_admin);

	$account = mysqli_num_rows($run_admin);

	if ($account == 1) {
		# code...

		$row_session = mysqli_fetch_array($run_admin);

		$_SESSION["admin_email"] = $row_session["admin_email"];
		$_SESSION["admin_pass"] = $row_session["admin_pass"];

		echo "<script>alert('You Are Logged In')</script>";
		echo "<script>window.open('index.php?dashboard', '_self')</script>";
	}else{

		echo "<script> alert('Your Email or Password is Wrong') </script>";
	}

}


?>













