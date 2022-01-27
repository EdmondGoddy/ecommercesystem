<div class="box">
	<div class="box-header">
		<center>
			<h1>Login</h1>
			<p class="lead">Alreader Have An Acount With Us...?</p>
			<p class="text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		    </p>
		</center>
	</div>
	<form method="post" action="checkout.php">
		
        <div class="form-group">
            <label>Your Email</label>
            <input name="c_email" type="text" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="c_pass" type="password" class="form-control" required="">
        </div>
        <div class="text-center">
        	<button name="login" value="Login" class="btn btn-primary">
        		<i class="fa fa-sign-in"></i> Login
        	</button>
        </div>
	</form>
	<center>
		<a href="customer_register.php">
			<h3>Don't have an account...? register here</h3>
		</a>
	</center>
</div>


<?php

if (isset($_POST["login"])) {
	# code...

	$customer_email = mysqli_real_escape_string($con, $_POST["c_email"]);
	$customer_pass = mysqli_real_escape_string($con, $_POST["c_pass"]);


	$select_customer = "SELECT * FROM customers WHERE email_address='$customer_email' AND password='$customer_pass' /*AND customer_id='$customer_id' */";
	$run_customer = mysqli_query($con, $select_customer) or die(mysqli_erro($con));

	$get_ip = getRealIpUser();
	$sess = session_id();

	$check_customer = mysqli_num_rows($run_customer);

	$select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip' AND session_id='$sess' ";
	$run_cart = mysqli_query($con, $select_cart);
	$check_cart = mysqli_num_rows($run_cart);


	if ($check_customer == 0) {
		# code...

		echo "<script>alert('Your Email Or Password Is Wrong')</script>";
		exit();
	}

	if ($check_customer == 1 AND $check_cart == 0) {
		# code...

		
	    /////////  FOR SESSION   /////////

	     $row = mysqli_fetch_array($run_customer);
         $_SESSION["customer_name"]  = $row["first_name"]." ".$row["last_name"];
         $_SESSION["customer_email"] = $row["email_address"];
         $_SESSION["ID"]             = $row["customer_id"];
     
	    /////////  FOR SESSION   /////////

		echo "<script>alert('You Are Logged In')</script>";
		echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";
		
	}else{

		
	    /////////  FOR SESSION   /////////

	     $row = mysqli_fetch_array($run_customer);
         $_SESSION["customer_name"]  = $row["first_name"]." ".$row["last_name"];
         $_SESSION["customer_email"] = $row["email_address"];
         $_SESSION["ID"]             = $row["customer_id"];
     
	    /////////  FOR SESSION   /////////

		echo "<script>alert('You Are Logged In')</script>";
		echo "<script>window.open('checkout.php', '_self')</script>";
	}




}



?>