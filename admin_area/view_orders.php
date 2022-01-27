
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>



<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Orders
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Orders
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No:</th>
								<th>Customer Email:</th>
								<th>Invoice No:</th>
								<th>Product Name:</th>
								<th>Product Qty:</th>
								<th>Product Size:</th>
								<th>Order Date:</th>
								<th>Total Amount:</th>
								<th>Status:</th>
								<th>Delete:</th>
							</tr>
						</thead>

						<tbody>

							<?php

							$get_order = "SELECT * FROM pending_orders ";
							$run_order = mysqli_query($con, $get_order);

							$i = 0;

							while ($row_orders = mysqli_fetch_array($run_order)) {
								# code...

								$order_id = $row_orders["order_id"];
								$c_id = $row_orders["customer_id"];
								$invoice_no = $row_orders["invoice_no"];
								$product_id = $row_orders["product_id"];
								$qty = $row_orders["qty"];
								$size = $row_orders["size"];
								$order_status = $row_orders["order_status"];

								$get_products = "SELECT * FROM products WHERE product_id='$product_id' ";
								$run_products = mysqli_query($con, $get_products);

								$row_products = mysqli_fetch_array($run_products);
								$product_title = $row_products["product_title"];

								$get_customer = "SELECT * FROM customers WHERE customer_id='$c_id' ";
								$run_customer = mysqli_query($con, $get_customer);

								$row_customer = mysqli_fetch_array($run_customer);
								$customer_email = $row_customer["customer_email"];

								$get_c_order = "SELECT * FROM customer_orders WHERE order_id='$order_id' ";
								$run_c_order = mysqli_query($con, $get_c_order);

								$row_c_order = mysqli_fetch_array($run_c_order);
								$order_date = $row_c_order["order_date"];
								$order_amount = $row_c_order["due_amount"];


								
								$i++;							
							?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td> <?php echo $customer_email; ?> </td>
								<td> <?php echo $invoice_no; ?> </td>
								<td> <?php echo $product_title; ?> </td>
								<td> <?php echo $qty; ?> </td>
								<td> <?php echo $size; ?> </td>
								<td> <?php echo $order_date; ?> </td>
								<td> <?php echo $order_amount; ?> </td>
								<td> 
									<?php 

									if ($order_status == "Pending") {
										# code...

										echo $order_status = "Pending";
									}else{

										echo $order_status = "Complete";
									}


									?> 

							    </td>  
								<td>
									<a href="index.php?delete_order=<?php echo $order_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
							</tr>

						    <?php  }   ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>




<?php /* }  */ ?>