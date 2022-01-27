 <center>
	<h1>DO You Really Want To Delete This Account?<h1>
	<form method="post" action="">	
	   <input type="submit" name="yes" value="Delete" class="btn btn-danger">
	   <input type="submit" name="no" value="Concel" class="btn btn-default">
	</form>
</center>

<?php

$c_email = $_SESSION["customer_email"];

if (isset($_POST["yes"])) {
	# code...

	$delete_customer = "DELETE FROM customers WHERE customer_email='$c_email' ";
	$run_delete_customer = mysqli_query($con, $delete_customer);

	if ($run_delete_customer) {
		# code...
		unset ($_SESSION["customer_name"]);
		unset ($_SESSION["customer_email"]);
        session_destroy();

		echo "<script>alert('Your Account Has Been Deleted, Feel Sorry About That. Good Bye')</script>";
		echo "<script>window.open('../index.php', '_self')</script>";

	}
}

if (isset($_POST["no"])) {
	# code...

	echo "<script>window.open('../customer/my_account.php?my_orders', '_self')</script>";

}




?>