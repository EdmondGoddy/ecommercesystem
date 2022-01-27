<?php
$active = "Account";
include("includes/header.php");

?>

    <div id="content">
    	<div class="container">
    		<div class="col-md-12"> 
    			<ul class="breadcrumb"> 
    				<li>
    					<a href="index.php">Home</a>
    				</li>
    				<li>
    					Register
    				</li>
    			</ul>
    		</div>
    		<div  class="col-md-3">

    			                       <!--  start of sidebar -->
<?php

include("includes/sidebar.php");

?>    		
                                       <!--  end of sidebar -->	
    		</div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Register a new account</h2>
                           
                        </center>
                        <form action="customer_register.php" method="post" enctype="multipart/form-data">


                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" required="">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" required="">
                            </div>
                            <div class="form-group">
                                <label>Your Email</label>
                                <input type="text" class="form-control" name="email_address" required="">
                            </div>
                            <div class="form-group">
                                <label>Your Password</label>
                                <input type="password" class="form-control" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label>Your Country</label>
                                <input type="text" class="form-control" name="country" required="">
                            </div>
                            <div class="form-group">
                                <label>Your City</label>
                                <input type="text" class="form-control" name="city" required="">
                            </div>
                            <div class="form-group">
                                <label>Your State</label>
                                <input type="text" class="form-control" name="state" required="">
                            </div>
                            <div class="form-group">
                                <label>Your Zipcode</label>
                                <input type="text" class="form-control" name="zipcode" required="">
                            </div>
                            <div class="form-group">
                                <label>Your Contact</label>
                                <input type="text" class="form-control" name="contact" required="">
                            </div>
                            <div class="form-group">
                                <label>Your address</label>
                                <input type="text" class="form-control" name="c_address" required="">
                            </div>

                            <div class="form-group">
                                <label>Select Your Profile Picture</label>
                                <input type="file" class="form-control form-height-custom" name="image" required="">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary">
                                  <i class="fa fa-user-md"></i> Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>                   
            </div>
        </div>
    </div>


                                         <!--  start of footer -->

<?php

include("includes/footer.php");

?>

                                         <!--  end of footer -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>

<?php

if (isset($_POST["register"])) {
	# code...

	$first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
	$email_address = mysqli_real_escape_string($con, $_POST["email_address"]);
	$password = mysqli_real_escape_string($con, $_POST["password"]);
	$country = mysqli_real_escape_string($con, $_POST["country"]);
	$city = mysqli_real_escape_string($con, $_POST["city"]);
    $state = mysqli_real_escape_string($con, $_POST["state"]);
	$contact = mysqli_real_escape_string($con, $_POST["contact"]);
	$address = mysqli_real_escape_string($con, $_POST["c_address"]);
    $zipcode = mysqli_real_escape_string($con, $_POST["zipcode"]);


	$c_image = $_FILES['image']['name'];  
	$c_image_tmp = $_FILES['image']['tmp_name']; 

	$c_ip = getRealIpUser();

	move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image"); 


    

    $insert_customer = "INSERT INTO customers (email_address, password, first_name, last_name, address, city, state, zipcode, country, contact, image, customer_ip) VALUES ('$email_address', '$password', '$first_name', '$last_name', '$address', '$city', '$state', '$zipcode', '$country', '$contact', '$c_image', '$c_ip') ";


// ERROR CODE BELOW
	//$insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) VALUES ('$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_ip')";


	$run_customer = mysqli_query($con, $insert_customer);
    
    $sess = session_id();
	$sel_cart = "SELECT * FROM cart WHERE ip_add='$c_ip' AND session_id='$sess'";
	$run_cart = mysqli_query($con, $sel_cart);
	$check_cart = mysqli_num_rows($run_cart);

	if ($check_cart > 0) {
		# code...
		///  If Registered With Item In Cart  ///
        $sel_customer = "SELECT * FROM customers WHERE email_address='$email_address'";
        $run_sel_customer = mysqli_query($con, $sel_customer);
        $row = mysqli_fetch_array($run_sel_customer);
        $_SESSION["customer_name"] = $row["first_name"].' '.$row["last_name"];
        $_SESSION["customer_email"] = $row["email_address"];
        $_SESSION["ID"]             =  $row["customer_id"];

		//$_SESSION["customer_email"] = $c_mail;   /* customer_email in $_SESSION["customer_email"] is the column name */

		echo "<script>alert('You Have Been Registered Successfullly.')</script>";
		echo "<script>window.open('cart.php', '_self')</script>";

	}else{
		///  If Registered Without Item In Cart  ///


        $sel_customer = "SELECT * FROM customers WHERE email_address='$email_address'";
        $run_sel_customer = mysqli_query($con, $sel_customer) or die(mysqli_error($con));
        $row = mysqli_fetch_array($run_sel_customer);
        $_SESSION["customer_name"] = $row["customer_name"];
        $_SESSION["customer_email"] = $row["customer_email"];
        $_SESSION["ID"]             =  $row["customer_id"];

		//$_SESSION["customer_email"] = $c_mail;

		echo "<script>alert('You Have Been Registered Successfullly.')</script>";
		echo "<script>window.open('index.php', '_self')</script>";
	}

	



}


?>