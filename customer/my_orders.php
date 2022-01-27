<center>
	<h1>My Orders</h1>
	<p class="lead">Your orders all in one place</p>
	<p class="text-muted">
		if you have any questions, feel free to <a href="../contact.php"> Contact Us</a>. Our Customer Service works <strong>24/7.</strong> 
	</p>
</center>

<hr>

<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>NO:</th>
				<th>Item Name</th>
				<th>Size</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Order Date</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$customer_session = $_SESSION["customer_email"];
			//$customer_id      = $_SESSION["ID"];

			$get_customer = "SELECT * FROM customers WHERE email_address='$customer_session'";
			$run_customer = mysqli_query($con, $get_customer) or die(mysqli_error($con));

			$row_customer = mysqli_fetch_array($run_customer);
			$customer_id = $row_customer["customer_id"];

			$get_orders = "SELECT * FROM orders_details WHERE customer_id='$customer_id'";
			$run_orders = mysqli_query($con, $get_orders);

			$i = 0;
			while($row_orders = mysqli_fetch_array($run_orders)){

				$order_id = $row_orders["order_detail_id"];
				$product_id = $row_orders["product_id"];
				$order_date = substr($row_orders["order_date"], 0,11);
				$item_name = $row_orders["item_name"];
				$size = $row_orders["size"];
				$quantity = $row_orders["quantity"];
				$price = $row_orders["price"];
				$customer_id = $row_orders["customer_id"];

				$sql = "SELECT * FROM product WHERE product_id='$product_id'";
				$get_product = mysqli_query($con, $sql) or die(mysqli_error($con));
				while ($row_products = mysqli_fetch_array($get_product)) {
					# code...
					$product_name = $row_products["product_title"];
				}


				//$due_amount = $row_orders["due_amount"];
				//$invoice_no = $row_orders["invoice_no"];
				//$qty = $row_orders["qty"];
				//$size = $row_orders["size"];
				//$order_date = substr($row_orders["order_date"], 0,11);
				//$customer_id = $row_orders["customer_id"];

				$i++;



			?>
			<tr>

				<td> <?php echo $i; ?> </td>
				<td> <?php echo $product_name; ?> </td>
				<td> <?php echo $size; ?> </td>
				<td> <?php echo $quantity; ?> </td>
				<td> <?php echo $price; ?> </td>
				<td> <?php echo $order_date; ?> </td>
			</tr>

		<?php } ?>
		</tbody>
	</table>
</div>