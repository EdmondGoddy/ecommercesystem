<h1 class="center">Change Your Password</h1>
<form action="" method="post">
	<div class="form-group">
		<label>Old Password:</label>
		<input type="password" class="form-control" name="old_pass" required="">
	</div>
	<div class="form-group">
		<label>New Password:</label>
		<input type="password" class="form-control" name="new_pass" required="">
	</div>
	<div class="form-group">
		<label>Confirm New Password:</label>
		<input type="password" class="form-control" name="new_pass_again" required="">
	</div>
	<div class="text-center">
		<button type="submit" name="submit" class="btn btn-primary">
			<i class="fa fa-user-md"></i> Update Now
		</button>
	</div>
</form>

<?php

if (isset($_POST["submit"])) {
	# code...

	$c_email = $_SESSION["customer_email"];

	$c_old_pass = $_POST["old_pass"];
	$c_new_pass = $_POST["new_pass"];
	$c_new_pass_again = $_POST["new_pass_again"];

	$sel_c_old_pass = "SELECT * FROM customers WHERE password='$c_old_pass' /* AND customer_email='c_email' */ ";
	$run_c_old_pass = mysqli_query($con, $sel_c_old_pass);

	$check_c_old_password = mysqli_num_rows($run_c_old_pass);

	if ($check_c_old_password == 0) {
		# code...

		echo "<script>alert('Sorry, Your Current Password is Invalid. Try Again.')</script>";
		exit();
	}else{

		if ($c_new_pass != $c_new_pass_again) {
			# code...

			echo "<script>alert('Sorry, Your New Password did not Match');</script>";
			exit();
		}else{

			$update_c_pass = "UPDATE customers SET password='$c_new_pass' WHERE email_address='$c_email' ";
			$run_c_pass = mysqli_query($con, $update_c_pass);

			if ($run_c_pass) {
				# code...

				echo "<script>alert('Your Password Has Been Updated Successfully ')</script>";
				echo "<script>wimdow.open('my_account.php?my_orders', _self);</script>";
			}

		}
		
	}

}

?>