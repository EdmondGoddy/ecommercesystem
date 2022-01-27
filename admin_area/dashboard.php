
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>




<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol>
	</div>
</div>

<div class="row">

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_products; ?> </div>
						<div>Products</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_products">
				<div class="panel-footer">
					<span class="pull-left">
					   view Details
				</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_customers; ?> </div>
						<div>Customers</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_customers">
				<div class="panel-footer">
					<span class="pull-left">
					   view Details
				</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-orange">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tags fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_p_categories; ?> </div>
						<div style="margin-left: ; ">Product Categories</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_p_cats">
				<div class="panel-footer">
					<span class="pull-left">
					   view Details
				</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"> <?php echo $count_pending_orders; ?> </div>
						<div style="margin-left: ; ">Orders</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_orders">
				<div class="panel-footer">
					<span class="pull-left">
					   view Details
				</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> New Orders
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
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

			//$customer_id      = $_SESSION["ID"];

			$get_orders = "SELECT * FROM orders_details";
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

						<?php }  ?>

						</tbody>
					</table>
				</div>
				<div class="text-right">
					<a href="index.php?view_orders">
						View All Orders <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php /* }  */ ?>