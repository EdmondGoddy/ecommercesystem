<?php

$customer_session = $_SESSION["customer_email"];

$get_customer = "SELECT * FROM customers WHERE email_address='$customer_session'";
$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer["customer_id"];
$customer_firstname = $row_customer["first_name"];
$customer_lastname = $row_customer["last_name"];
$customer_email = $row_customer["email_address"];
$customer_country = $row_customer["country"];
$customer_city = $row_customer["city"];
$customer_contact = $row_customer["contact"];
$customer_address = $row_customer["address"];
$customer_zipcode = $row_customer["zipcode"];
$customer_image = $row_customer["image"];


?>

<h1 align="center">Edit Your Account</h1>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Customer Firstname:</label>
		<input type="text" class="form-control" value="<?php echo $customer_firstname; ?>" name="c_name" required="">
	</div>
	<div class="form-group">
		<label>Customer Lastname:</label>
		<input type="text" class="form-control" value="<?php echo $customer_lastname; ?>" name="c_name" required="">
	</div>
	<div class="form-group">
		<label>Customer Email:</label>
		<input type="text" class="form-control" value="<?php echo $customer_email; ?>" name="c_email" required="">
	</div>
	<div class="form-group">
		<label>Customer Country:</label>
		<input type="text" class="form-control" value="<?php echo $customer_country; ?>" name="c_country" required="">
	</div>
	<div class="form-group">
		<label>Customer City:</label>
		<input type="text" class="form-control" value="<?php echo $customer_city; ?>" name="c_city" required="">
	</div>
	<div class="form-group">
		<label>Customer Contact:</label>
		<input type="text" class="form-control" value="<?php echo $customer_contact; ?>" name="c_contact" required="">
	</div>
	<div class="form-group">
		<label>Customer Address:</label>
		<input type="text" class="form-control" value="<?php echo $customer_address; ?>" name="c_address" required="">
	</div>
	<div class="form-group">
		<label>Customer Zipcode:</label>
		<input type="text" class="form-control" value="<?php echo $customer_zipcode; ?>" name="c_address" required="">
	</div>
	<div class="form-group">
		<label>Customer Image:</label>
		<input type="file" class="form-control form-height-custom" name="c_image" required="">
		<center>
			<img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Customer Image" style="width: 50%;height: 50%;">
		</center>	
	</div>
	<div class="text-center">
		<button type="submit" name="update" class="btn btn-primary">
			<i class="fa fa-user-md"></i> Update Now
		</button>
	</div>
</form>

<?php

if (isset($_POST["update"])) {
	# code...

	$update_id = $customer_id;
	$c_name = $_POST["c_name"];
	$c_email = $_POST["c_email"];
	$c_country = $_POST["c_country"];
	$c_city = $_POST["c_city"];
	$c_address = $_POST["c_address"];
	$c_contact = $_POST["c_contact"];

	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];

	move_uploaded_file($c_image_tmp, "customer_images/$c_image");

	$update_customer = "UPDATE customers SET customer_name='$c_name', customer_email='$c_email', customer_country='$c_country', customer_city='$c_city', customer_address='$c_address', customer_contact='$c_contact', customer_image='$c_image' WHERE customer_id='$update_id'

	/* `customer_name`='$c_name',`customer_email`='$c_email',`customer_country`='$c_country',`customer_city`='$c_city',`customer_contact`='$c_contact',`customer_address`='$c_address',`customer_image`='$c_image', 
	 WHERE `customer_id`='$update_id'*/ ";
	$run_customer = mysqli_query($con, $update_customer) or die(mysqli_query($con));

	if ($run_customer) {
		# code...

		echo "<script>alert('Your Account Has Been Edited, Please Relogin');</script>";
		echo "<script>window.open('logout.php', '_self');</script>";
	}

}

?>