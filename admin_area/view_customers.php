
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
				<i class="fa fa-dashboard"></i> Dashboard / View Customers
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags"></i> View Customers
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No:</th>
								<th>Name:</th>
								<th>Image:</th>
								<th>Email:</th>
								<th>Country:</th>
								<th>City:</th>
								<th>Address:</th>
								<th>Contact:</th>
								<th>Delete:</th>
							</tr>
						</thead>

						<tbody>

							<?php

							$get_c = "SELECT * FROM customers ";
							$run_c = mysqli_query($con, $get_c);

							$i = 0;

							while ($row_c = mysqli_fetch_array($run_c)) {
								# code...

								$c_id = $row_c["customer_id"];
								$c_name = $row_c["first_name"]." ".$row_c["last_name"];
								$c_img = $row_c["image"];
								$c_email = $row_c["email_address"];
								$c_country = $row_c["country"];
								$c_city = $row_c["city"];
								$c_address = $row_c["address"];
								$c_contact = $row_c["contact"];
								
								$i++;							
							?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td> <?php echo $c_name; ?> </td>
								<td> <img style="width: 100px; height: 100px" src="../customer/customer_images/<?php echo $c_img; ?>" > </td>
								<td> <?php echo $c_email; ?> </td>
								<td> <?php echo $c_country; ?> </td>
								<td> <?php echo $c_city; ?> </td>
								<td> <?php echo $c_address; ?> </td>
								<td> <?php echo $c_contact; ?> </td>
								<td>
									<a href="index.php?delete_customer=<?php echo $c_id; ?>">
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