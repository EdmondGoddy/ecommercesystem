<div class="box">

	<?php

	$session_email = $_SESSION["customer_email"];

	$select_customer = "SELECT * FROM customers WHERE email_address='$session_email'";
	$run_customer = mysqli_query($con, $select_customer);

	$row_customer = mysqli_fetch_array($run_customer);
	$customer_id = $row_customer["customer_id"];

	?>

	<h1 class="text-center">Payment Option For You</h1>
	<marquee> <h5 class="text-center" style="color: red;"><strong>Take note:</strong> Just Mobile Money is Available.</h5></marquee>
	<p class="lead text-center">
		<!-- <a class="" href="order.php?c_id=<?php echo $customer_id ?>">Offline Payment</a> -->

		<a class="" href="#">Card</a>
	</p>
	<p class="lead text-center">
		<!-- <a class="" href="order.php?c_id=<?php echo $customer_id ?>">Offline Payment</a> -->

		<a class="" href="checkout_details.php">Mobile Money</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">
				Paypal Payment
				<img class="img-responsive" src="images/Paypal.png" alt="paypal logo">
			</a>
		</p>
	</center>
</div>